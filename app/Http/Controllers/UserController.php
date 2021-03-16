<?php

namespace App\Http\Controllers;

use App\User;
use http\Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;


class UserController extends Controller
{

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        $user = JWTAuth::user();

        return response()->json(compact('token', 'user'))->withCookie(
            'token',
            $token,
            config('jwt.ttl'),
            '/',
            null,
            config('app.env') !== 'local',
            true,
            false,
            config('app.env') !== 'local' ? 'None' : 'Lax'
        );
    }


    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'province' => 'required|string|max:100',
            'canton' => 'required|string|max:100',
            'sector' => 'required|string|max:100',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }
        $user = User::create([
            'image' => $request->get('image'),
            'name' => $request->get('name'),
            'lastname' => $request->get('lastname'),
            'phone' => $request->get('phone'),
            'province' => $request->get('province'),
            'canton' => $request->get('canton'),
            'sector' => $request->get('sector'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);
        $token = JWTAuth::fromUser($user);
        return response()->json(compact('user', 'token'), 201)->withCookie(
            'token',
            $token,
            config('jwt.ttl'),
            '/',
            null,
            config('app.env') !== 'local',
            true,
            false,
            config('app.env') !== 'local' ? 'None' : 'Lax'
        );
    }

    public function getAuthenticatedUser()
    {
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['token_expired'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['token_invalid'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['token_absent'], $e->getStatusCode());
        }
        return response()->json(compact('user'));
    }

    public function logout()
    {
        try {
            JWTAuth::invalidate(JWTAuth::getToken());
//            Cookie::queue(Cookie::forget('token'));
//            $cookie = Cookie::forget('token');
//            $cookie->withSameSite('None');
            return response()->json([
                'status' => 'success',
                'message' => 'User successfully logged out.'
            ], 200)->withCookie(
                'token',
                null,
                config('jwt.ttl'),
                '/',
                null,
                config('app.env') !== 'local',
                true,
                false,
                config('app.env') !== 'local' ? 'None' : 'Lax'
            );
        } catch (JWTException $e) {
            //something when wrong whilst attempting to encode the token
            return response()->json(['message' => 'No se pudo cerrar la sesión.'], 200);
        }
    }
}
