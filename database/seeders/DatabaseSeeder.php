<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $admin = new Admin();
        $admin->name='Admin';
        $admin->email='mustakinali@gmail.com';
        $admin->password= bcrypt(123456);
        $admin->save();

    }
}
