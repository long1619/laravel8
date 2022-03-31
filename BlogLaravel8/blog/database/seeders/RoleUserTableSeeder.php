<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::findOrFail(1)->roles()->sync(1);
        // User::findOrFail(2)->roles()->sync(2);
        User::find(1)->role()->attach(1);
        User::find(2)->role()->attach(2);
    }
}