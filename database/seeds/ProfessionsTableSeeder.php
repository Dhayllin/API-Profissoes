<?php

use Illuminate\Database\Seeder;

class ProfessionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date("Y-m-d H:i:s");
        DB::table('professions')->insert([
            [
                'id'            =>1,
                'name'          =>'Advogado',    
                'description'   =>'A as sdf asdf ',    
                "created_at"    => $now,
                "updated_at"    => $now,
            ],
            [
                'id'            =>2,  
                'name'          =>'Agricultor digital ',    
                'description'   =>'A as sdf asdf ',                           
                "created_at"    => $now,
                "updated_at"    => $now,
            ],
            [
                'id'            =>3,
                'name'          =>'Tutor de curiosidade ',    
                'description'   =>'A as sdf asdf ',      
                "created_at"    => $now,
                "updated_at"    => $now,
            ],
            [
                'id'            =>4,  
                'name'          =>'Minerador espacial',    
                'description'   =>'A as sdf asdf ',                           
                "created_at"    => $now,
                "updated_at"    => $now,
            ],
        ]);
    }
}
