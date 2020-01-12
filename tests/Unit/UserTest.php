<?php

namespace Tests\Unit;

use Tests\TestCase;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Log;
use Illuminate\Console\Command;

use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    // Dá roolback na persistência de dados no banco.
    use DatabaseTransactions;

    /**
     * A basic unit test example.
     *
     * @return voidProfissão
     */

    public function testCreateUser()
    {
        // Create three App\User instances...
        $users = factory(\App\User::class,3)->create();
    
        Log::info('TEST: User Create == '.$users); 
        echo 'TEST: Profession Create SUCCESS';
        echo "\n";
      
        $this->assertTrue(true);
    }

    public function testCreateProfessions(){

        // Create three App\Profession instances...
        $prefessions = factory(\App\Profession::class,6)->create();
            
        Log::info('TEST: Profession Create == '.$prefessions); 
        echo 'TEST: Profession Create SUCCESS';
        echo "\n";
        
        $this->assertTrue(true);
    }
}
