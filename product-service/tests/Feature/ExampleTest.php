<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testBasicExample()
    {
       $this->visit('/')
            ->see('Laravel 5');
    }

    // public function testProductList()
    // {
    //   $this->get(route('products'))
    //        ->assert(ResponseOk());
    // }

    public function testProductList()
    {
      $this->get(route('api.products.index'))
           ->assert(ResponseOk());
    }
}
