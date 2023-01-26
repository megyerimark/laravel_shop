<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Support\Facades\Validator as Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AuthController extends BaseController
{

    public function signUp(Request $request)

    {
        $input = $request->all();
        $validator = Validator::make($input, [
            "name" => "required",
            "email" => "required",
            "password" => "required",
            "confirm_password" => "required|same:password",


        ]);
        if ($validator->fails()) {
            return $this->sendError("Hibás adatok", $validator->errors());
        }
        $input["password"] = bcrypt($input['password']);
        $user = User::create($input);

        return $this->sendResponse($user, "Sikeres regisztráció");
    }

    public function signIn(Request $request)
    {

        if (Auth::attempt(["email" => $request->email, "password" => $request->password])) {
            $authUser = Auth::user();
            $success["token"] = $authUser->createToken("MyAuthApp")->plainTextToken;
            $success["name"] = $authUser->name;
            return $this->sendResponse($success, "Hello". $authUser->name);
        } else {
            return $this->sendError("Unathorized" . ["error" => "sikertelen"]);
        }
    }

    public function logout(Request $request){
        auth("sanctum")->user()->currentAccessToken()->delete();

        return response()->json("Sikeres kijelentkezés");
    }
}
