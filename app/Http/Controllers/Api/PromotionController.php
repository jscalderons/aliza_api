<?php

namespace App\Http\Controllers\Api;

use \App\Promotion;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\RestControllerTrait as RESTTrait;

class PromotionController extends Controller
{
    use RESTTrait;

    public function index()
    {
        $promotions = Promotion::available(auth()->user())
                                ->paginate(env('PAGINATE', 6));

        return response($promotions);
    }

    public function store(Request $request)
    {
        $promotion = new Promotion($request->all());

        $promotion->uid = Str::uuid();
        $promotion->user_uid = auth()->user()->uid;

        if ($promotion->save())
        {
            return $this->createdResponse();
        }

        return $this->errorResponse('El recurso no se puedo agregar.');
    }

    public function destroy(Promotion $promotion)
    {
        if ($promotion->delete())
        {
            return $this->deletedResponse();
        }

        return $this->errorResponse('No se pudo eliminar el registro');
    }

    public function attachCoupons(Promotion $promotion)
    {
        if ($promotion->redeemed < $promotion->quantity)
        {
            $coupons = auth()->user()->coupons();
            if (!$coupons->find($promotion->uid)) {
                $coupons->attach($promotion->uid);
                $promotion->redeemed = $promotion->redeemed + 1;
                $promotion->update();
            }

            return $this->createdResponse();
        }

        return $this->errorResponse('Promoción llena, Ya no hay cupones.');
    }

    public function getUsers(Promotion $promotion)
    {
        $users = $promotion->coupons()
                        ->whereNull('validated_at')
                        ->paginate(env('PAGINATE', 6));

        return response($users);
    }



    /**
     * Canjea la promoción
     *
     *
     */
    public function redeemCoupon($promotion_uid, $user_uid)
    {
        $coupon = \App\Coupon::where([
                ['promotion_uid', $promotion_uid],
                ['user_uid', $user_uid]
            ])->first();

        if ($coupon) {
            $coupon->validated_at = now();
            $coupon->deleted_at = now();

            if ($coupon->update()) {
                return $this->successResponse();
            }

            return $this->errorResponse();
        }

        return $this->notFoundResponse();
    }
}
