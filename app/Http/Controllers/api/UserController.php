<?php

namespace App\Http\Controllers\api;

use App\User;
use Illuminate\Http\Request;
use Response;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return Response::json([
            'result' => 'OK',
            'user_list' => $users,
            'message' => 'Success',
            'response_code' => 200
        ], 200);
    }

    public function create(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $address = $request->address;
        $password = $request->password;

        if(empty($name)) {
            return Response::json([
                'result' => 'Validation failed',
                'message' => 'Name required',
                'response_code' => 406
            ], 406);
        } else if(empty($email)) {
            return Response::json([
                'result' => 'Validation failed',
                'message' => 'E-mail required',
                'response_code' => 406
            ], 406);
        } else if(empty($password)) {
            return Response::json([
                'result' => 'Validation failed',
                'message' => 'Password required',
                'response_code' => 406
            ], 406);
        } else {
            $user = new User;
            $user->name = $name;
            $user->email = $email;
            $user->address = empty($address) ? '' : $address;
            $user->password = $password;
            $user->save();

            return Response::json([
                'result' => 'OK',
                'message' => 'User data inserted',
                'response_code' => 200
            ], 200);
        }
    }

    public function update(Request $request, $id)
    {
        $name = $request->name;
        $email = $request->email;
        $address = $request->address;
        $password = $request->password;

        $user = User::find($id);

        if(empty($user)) {
            return Response::json([
                'result' => 'Not found',
                'message' => 'User not found',
                'response_code' => 404
            ], 404);
        } else if(empty($name)) {
            return Response::json([
                'result' => 'Validation failed',
                'message' => 'Name required',
                'response_code' => 406
            ], 406);
        } else if(empty($email)) {
            return Response::json([
                'result' => 'Validation failed',
                'message' => 'E-mail required',
                'response_code' => 406
            ], 406);
        } else if(empty($password)) {
            return Response::json([
                'result' => 'Validation failed',
                'message' => 'Password required',
                'response_code' => 406
            ], 406);
        } else {
            $user->name = $name;
            $user->email = $email;
            $user->address = empty($address) ? '' : $address;
            $user->password = $password;
            $user->save();

            return Response::json([
                'result' => 'OK',
                'message' => 'User data updated',
                'response_code' => 200
            ], 200);
        }
    }

    public function delete($id)
    {
        $user = User::find($id);

        if(empty($user)) {
            return Response::json([
                'result' => 'Not found',
                'message' => 'User not found',
                'response_code' => 404
            ], 404);
        } else {
            $user->delete();

            return Response::json([
                'result' => 'OK',
                'message' => 'Student data deleted',
                'response_code' => 200
            ], 200);
        }
    }
}
