<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Show all the users list
     */
    public function index()
    {
        try {
            return $this->dataResponse(User::latest()->get());
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), $e->getCode());
        }
    }

    /**
     * User login
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:191',
            'password' => 'required|min:6|max:255'
        ]);

        if ($validator->fails())
            return $this->errorResponse($validator->errors()->first());

        try {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return $this->dataResponse([
                    'access_token' => Auth::user()->createToken(Auth::user()->name)->accessToken
                ]);
            }
            return $this->errorResponse('Incorrect username or password');
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), $e->getCode());
        }
    }

    /**
     * User logout
     */
    public function logout(Request $request)
    {
        try {
            $request->user()->token()->revoke();
            return $this->successResponse('User sign out successfully');
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), $e->getCode());
        }
    }
}
