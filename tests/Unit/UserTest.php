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
        $users = factory(\App\User::class, 1)->make();

        Log::info('TEST: User Create == '.$users); 

        $professions = factory(\App\Profession::class, 1)->make();
        
        Log::info('TEST: User Create == '.$professions); 
        

        
        $this->assertTrue(true);

        //$this->seeInDatabase('users', ['email' => 'ssally@example.com']); 

    }
}
