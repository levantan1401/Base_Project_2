<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\DB ;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->insert([
            'name' => 'Dũng',
            'email' => 'dung@gmail.com',
            'password' => bcrypt('123456'),
            'chucvu'   =>'nhân viên'
        ]);
        DB::table('admin')->insert([
            'name' => 'Tấn',
            'email' => 'tan@gmail.com',
            'password' => bcrypt('123456'),
            'chucvu'   =>'Quản lý'
        ]);
        DB::table('admin')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'chucvu'   =>'admin'
        ]);
    }
}
