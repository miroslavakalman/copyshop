<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class CreateAdminUser extends Migration
{
    public function up()
    {
        User::create([
            'name' => 'Admin',
            'surname' => 'User',
            'patronymic' => '',
            'login' => 'admin2',
            'email' => 'admin@example.com',
            'password' => Hash::make('a'), 
            'is_admin' => true,
        ]);
    }

    public function down()
    {
        User::where('email', 'admin@example.com')->delete();
    }
}
