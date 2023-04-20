<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function permission()
    {

        $permissions = Permission::all();

            $response = ['result' => 'success', 'data' => $permissions];

        return response()->json($response);


    }
}
