<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'raymart',
                'username'=>'asthrea18',
                'email' => 'raymart.calinao@gmail.com',
                'password' => Hash::make('password'),
                'role'=>3,
                'assign'=>null,
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'counter1',
                'username'=>'counter1',
                'email' => 'counter1@gmail.com',
                'password' => Hash::make('password'),
                'role'=>1,
                'assign'=>'c1',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'counter2',
                'username'=>'counter2',
                'email' => 'counter2@gmail.com',
                'password' => Hash::make('password'),
                'role'=>1,
                'assign'=>'c2',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'counter3',
                'username'=>'counter3',
                'email' => 'counter3@gmail.com',
                'password' => Hash::make('password'),
                'role'=>1,
                'assign'=>'c3',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'counter4',
                'username'=>'counter4',
                'email' => 'counter4@gmail.com',
                'password' => Hash::make('password'),
                'role'=>1,
                'assign'=>'c4',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
        ]);
    }
}
