<?php

use Illuminate\Database\Seeder;

use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //users テーブルの初期化
        User::truncate();
        factory(User::class, 50)->create();
    }
}
