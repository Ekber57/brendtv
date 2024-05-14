<?php
namespace App\Services;

use App\Models\User;
use App\DTOS\UserDTO;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class UserService {
    public function addUser(UserDTO $userDTO) {
        $user = User::create([
            'name' => $userDTO->name,
            'username' => $userDTO->username,
            'email' => $userDTO->email,
            'password' => Hash::make($userDTO->password),
            'phone' => $userDTO->phone,
            'balance' => $userDTO->balance,
        ]);
            return $user;
    }
    public function decreaseParentBalance(User $user,$amount) {
        $user = User::find($user->id);
        $user->balance = $user->balance - $amount;
        $user->save();
    }

    public function getUsersById(array $ids) {
  
        return User::whereIn("id",$ids)->paginate(2);
    }
}


?>