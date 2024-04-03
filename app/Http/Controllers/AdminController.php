<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        try {
            $token = Auth::guard('admin')->attempt(array('username' => $request->get('username'), 'password'=> $request->get('password')));
            if ($token) {
                return response()->json([
                    'msg' => 'login success'
                ],200)->header('token',$token);
            } else {
                return response()->json([
                    'msg' => 'login fail'
                ],422);
            }
        } catch (\Exception $e) {
            return response()->json(['err'=>$e]);
        }
    }

}
