<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UsersInserts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'type'=>'admin',
            'name' => 'Administrador',
            'surname'=> 'Administrador',
            'nickname'=>'testing',
            'email' => 'testing@gmail.com',
            'profile'=>'user.jpg',
            'password' => Hash::make('testingAdmin'),
            'passwordCheck'=>'testingAdmin',
            'rental_price'=> 0,
            'state'=> 'activo'
        ]);
        DB::table('users')->insert([
            'type'=>'inquilino',
            'name' => 'Farid',
            'surname'=> 'Gamboa Matarrita',
            'nickname'=>'yukio1996',
            'email' => 'iamfarid1996@gmail.com',
            'profile'=>'user.jpg',
            'password' => Hash::make('12345678'),
            'passwordCheck'=>'12345678',
            'rental_price'=> 150000,
            'state'=> 'activo'
        ]);
        DB::table('users')->insert([
            'type'=>'inquilino',
            'name' => 'Pedro',
            'surname'=> 'Perez Potra',
            'nickname'=>'inquilino',
            'email' => 'testingInquilino@gmail.com',
            'profile'=>'user.jpg',
            'password' => Hash::make('12345678'),
            'passwordCheck'=>'12345678',
            'rental_price'=> 150000,
            'state'=> 'activo'
        ]);
    }
}
