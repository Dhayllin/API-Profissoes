<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date("Y-m-d H:i:s");
        DB::table('users')->insert([
            [
                'id'            =>1,
                'name'          => 'Dhayllin Jesus',
                'email'         => 'dhayllin@hotmail.com',
                'password'      => '$2y$10$JHW.331J5XLTQY1atdU0FeRgoW1ILzEA4gOCKZgREQ/z1tOwTJWX.',  
                'remember_token'=> str_random(10),
                "created_at"    => $now,
                "updated_at"    => $now,
            ],
            [
                'id'            =>2,
                'name'          => 'Nayra Lopes',
                'email'         => 'nayra.clt@gmail.com',                                
                'password'      => '$2y$10$yFd/ZaPI3EqUpGQgs39W5.KDB.1jOUieHTSYo6ycofIdoW36dsOJe',                
                'remember_token'=> str_random(10),              
                "created_at"    => $now,
                "updated_at"    => $now,
            ],
        ]);
    }
}
