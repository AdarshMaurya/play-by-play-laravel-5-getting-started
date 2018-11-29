<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
  use DatabaseTransactions;
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

    public function testProductFactoryList()
    {
      $products = factory(\App\Product::class,3)->create();

      $this->get(route('api.products.index'))
           ->assertResponseOk();

      array_map(function($product){
        $this -> seeJson($product->jsonSerialize());
      }, $products->all());
    }

    public function testProuctDescriptions(){
        $products = factory(\App\Product::class,3)->create();
        $products->descriptions()->saveMany(factory(\App\Description::class,3)->make());

        $this->get(route('api.products.descriptions.index',['products'=>id]))
             ->assertResponseOk();

             array_map(function($descriptions){
               $this -> seeJson($descriptions->jsonSerialize());
             }, $products->descriptions->all());
    }
}
