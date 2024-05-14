<?php

namespace App\Actions\Auth;

use App\Models\User;
use App\DTOS\UserDTO;
use App\Services\UserService;
use App\Http\Requests\SignInRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use App\Actions\Auth\iptv\LineRegisterTRAIT;

class AuthAction
{
    use LineRegisterTRAIT;
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function addUser(RegisterRequest $request)
    {
        $userDTO = new UserDTO();
        $userDTO->name = $request->name;
        $userDTO->email = $request->mail;
        $userDTO->phone = $request->phone;
        $userDTO->username = $request->username;
        $userDTO->password = $request->password;
        $userDTO->balance = 0;

  
        $user = $this->userService->addUser($userDTO);
        $this->addToLines($user);

        if (!Auth::check()) {
            Auth::attempt([
                'email' => $userDTO->email,
                'password' => $userDTO->password,
            ]);
        }
    }

    public function signIn(SignInRequest $request)
    {
        $credentials = ['phone' => $request->username, 'password' => $request->password];

        if ( Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect("/dashboard");
        }
       else  if ( Auth::attempt( ['email' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect("/dashboard");
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }


}
