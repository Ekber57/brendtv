<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class Permissions extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(
            ['name' => 'create reseller'],

        );
        Permission::create(
            ['name' => 'create subreseller'],

        );
        Permission::create(
            ['name' => 'show all subresellers']
        );
        Permission::create(
            ['name' => 'create line']
        );

        $admin = User::create([
            "username" => "admin",
            "name" => "admin",
            "email" => "admin@brentv.mail",
            "password" =>  Hash::make("brendtv12345"),
            "balance" => 1000000,
            "phone" => "055 000 00 00"
        ]);
        $admin->givePermissionTo("create reseller");
        $admin->givePermissionTo("create subreseller");
        $admin->givePermissionTo("create line");
    }
}
