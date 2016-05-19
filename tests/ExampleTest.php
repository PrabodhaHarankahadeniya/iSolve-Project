<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
   /* public function testBasicExample()
    {
        $this->visit('/PaddyStock')
             ->see('Laravel 5');
    }*/
    public function test()
    {
        $this->visit('/addPaddytoStock')->click('/addPaddytoStock')->seePageIs('/');
    }
}
