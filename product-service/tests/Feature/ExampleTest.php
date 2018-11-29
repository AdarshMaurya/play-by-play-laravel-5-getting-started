<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{

  use DatabaseTransactions;


      protected $jsonHeaders = ['Content-Type' => 'application/json', 'Accept' => 'application/json'];
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
// https://stackoverflow.com/questions/42645066/acceptance-test-method-visit-undefined
    public function testBasicExample()
    {
       // $this->visit('/')
       //      ->see('Laravel 5');
       $this->get('/')
            ->assertViewIs('welcome');
    }


    public function testProductsList()
    {
        $this->get(route('products'))
             ->assertOk();

      $this->get(route('products.index'))
           ->assertOk();
    }

    public function testProductFactoryList()
    {
      $products = factory(\App\Product::class,3)->create();

      $this->get(route('products.index'))
           ->assertOk();

      array_map(function($product){
        $this -> assertJson($product);
      }, $products->all());
    }

    public function testProudctDescriptions(){
        $products = factory(\App\Product::class)->create();
        $products->descriptions()->saveMany(factory(\App\Description::class,3)->make());

        $this->get(route('products.descriptions.index',['products'=>$products->id]))
             ->assertOk();

             array_map(function($descriptions){
               $this -> assertJson($descriptions);
             }, $products->descriptions->all());
    }
    //https://laracasts.com/discuss/channels/testing/badmethodcallexception-method-assertdatabasehas-does-not-exist?page=0#reply-392817
    public function testProductCreation(){
      $product = factory(\App\Product::class)->make(['name' => 'bbbeetsss']);

      //$this->post(route('products.store'), $product->toArray(), $this->jsonHeaders)->assertSuccessful();
      $this->post(route('products.store'), $product->toArray())->assertSuccessful();
      $this->assertDatabaseHas('products',['name'=> $product->name]);
    }

    public function testProductDescriptionCreation(){
      $product = factory(\App\Product::class)->create(['name' => 'bbbeetsss']);
      $descriptions = factory(\App\Description::class)->make();
      //$this->post(route('products.store'), $product->toArray(), $this->jsonHeaders)->assertSuccessful();
      $this->post(route('products.descriptions.store',['products' =>$product->id]), $descriptions->toArray())->assertSuccessful();
      $this->assertDatabaseHas('descriptions',['body'=> $descriptions->body]);
    }
}
