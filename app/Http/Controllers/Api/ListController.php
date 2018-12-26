<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListController extends Controller
{
    public function getAllProcess() {
        $processes = \App\Process::all();

        return response($processes);
    }
}
