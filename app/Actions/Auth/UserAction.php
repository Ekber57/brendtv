<?php 
namespace App\Actions;

use App\Models\User;

class UserAction {
    public function showUsers() {
        $users = User::all();
        return view("users",["users" => $users]);
    }

  

}




?>