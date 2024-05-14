<?php

namespace App\Http\Controllers\auth;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Actions\Auth\AuthAction;
use App\Actions\IpTv\ResellerAction;
use App\DTOS\IpTv\UserDTO;
use App\externalAPIs\ipTv\GroupsAPI;
use App\externalAPIs\IpTv\UserAPi;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SignInRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class AuthController
{
    public function register(RegisterRequest $request, AuthAction $authAction)
    {
        $authAction->addUser($request);
        return redirect("/dashboard");
    }
    public function login(SignInRequest $request, AuthAction $authAction)
    {
        $authAction->signIn($request);
        return redirect("/dashboard");
    }
    
    public function logout()
    {
        Auth::logout(); // Log the user out

        return redirect('/signin'); // Redirect to the home page or any other desired location
    }

    public function editUser(User $user,GroupsAPI $groupsAPI)
    {
        return view("auth.edit_user", [
            'groups' => $groupsAPI->getGroups(),
            'user' => $user

    ]);
    }
    public function storeUser(User $user, Request $request,UserAPi $userAPi,ResellerAction $resellerAction)
    {

        DB::beginTransaction();
        try {

            $userDTO = new UserDTO();
            $userDTO->username = $request->username;
            $userDTO->password = $request->password;
            $userDTO->credits = $request->balance;
            $userDTO->id = $request->user_id;
            $userAPi->editUser($userDTO);
            $user = User::find($request->user_id);
            $user->email = $request->mail;
            $user->email = $request->mail;
            $user->username  = $request->username;
            $user->name = $request->name;
            if(!empty($request->password)) {
                $user->password = Hash::make($request->password);
            }
            if (Auth::user()->hasPermissionTo("create reseller")) {
                $user->balance = $request->balance;
            }
            $user->save();
            if(isset($request->group_id)) {
                $resellerAction->editGroup($user);
            }
   
            Db::commit();
        } catch (Exception $e) {
            DB::rollback();
            //throw $th;
            throw $e;
        }

        return redirect()->away($request->getSchemeAndHttpHost() . "/system/user/edit/" . $request->user_id)->with('data', "melumatlar yenilendi");
    }
}
