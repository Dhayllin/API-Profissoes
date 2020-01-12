<?php

namespace Tests\Unit;

use Tests\TestCase;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Log;
use Illuminate\Console\Command;

use App\User;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function testCreateUser()
    {
        // Create three App\User instances...
        $users = factory(\App\User::class,3)->create();
    
        Log::info('TEST: User Create == '.$users); 
      
        $this->assertTrue(true);
    }

    public function testCreateProfessions(){

        // Create three App\Profession instances...
        $prefessions = factory(\App\Profession::class,6)->create();
            
        Log::info('TEST: Profession Create == '.$prefessions); 

        $this->assertTrue(true);
    }
}
