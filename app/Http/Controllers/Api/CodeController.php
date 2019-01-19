<?php

namespace App\Http\Controllers\Api;

use \App\Code;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\RestControllerTrait as RESTTrait;

class CodeController extends Controller
{
    use RESTTrait;

    public function index()
    {
        return $this->successResponse(Code::available()->get());
    }

    public function store(Request $request)
    {
        $code = new Code($request->all());

        $code->uid = Str::uuid();
        $code->user_uid = auth()->user()->uid;

        if ($code->save())
        {
            return $this->createdResponse();
        }

        return $this->errorResponse('El recurso no se puedo agregar.');
    }

    public function promotedUsers(Code $code)
    {
        if ($code) {
            $users = \DB::table('promotions')
                ->select('users.*')
                ->join('users', 'users.uid', '=', 'promotions.user_uid')
                ->where('promotions.code_uid', $code->uid)
                ->paginate(env('PAGINATE', 6));

            return response($users);
        }

        return $this->notFoundResponse();
    }

    public function destroy(Code $code)
    {
        if ($code)
        {
            if ($code->user_uid == auth()->user()->uid)
            {
                if ($code->delete())
                {
                    return $this->deletedResponse();
                }

                return $this->errorResponse('No se pudo eliminar el registro');
            }
        }

        return $this->notFoundResponse();
    }
}
