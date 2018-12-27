<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\RestControllerTrait;

class ListController extends Controller
{
    use RestControllerTrait;

    public function getAllProcesses() {
        $data = \App\Process::all();

        return $this->successResponse($data);
    }

    public function getAllCategories() {
        $data = \App\Category::all();

        return $this->successResponse($data);
    }
}
