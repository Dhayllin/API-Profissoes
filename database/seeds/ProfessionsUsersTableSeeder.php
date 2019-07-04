<?php

use Illuminate\Database\Seeder;

class ProfessionsUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date("Y-m-d H:i:s");
        DB::table('profession_user')->insert([
            [
                'id'            =>1,
                "user_id"       =>1,   
                "profession_id" =>1,   
                "created_at"    => $now,
                "updated_at"    => $now,
            ],
            [
                'id'            =>2,  
                "user_id"       =>2,   
                "profession_id" =>2,                          
                "created_at"    => $now,
                "updated_at"    => $now,
            ],
            [
                'id'            =>3,  
                "user_id"       =>1,   
                "profession_id" =>3,                          
                "created_at"    => $now,
                "updated_at"    => $now,
            ],
            [
                'id'            =>4,  
                "user_id"       =>2,   
                "profession_id" =>4,                          
                "created_at"    => $now,
                "updated_at"    => $now,
            ],
            [
                'id'            =>5,  
                "user_id"       =>2,   
                "profession_id" =>1,                          
                "created_at"    => $now,
                "updated_at"    => $now,
            ],
        ]);
    }
}
