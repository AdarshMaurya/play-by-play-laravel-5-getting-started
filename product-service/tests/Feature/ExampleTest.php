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
      $product = factory(\App\Product::class)->make(['name' => 'bbbeeetsss']);

      //$this->post(route('products.store'), $product->toArray(), $this->jsonHeaders)->assertSuccessful();
      $this->post(route('products.store'), $product->toArray());
      //->assertSuccessful();
      $this->assertDatabaseHas('products',['name'=> $product->name]);
    }

    public function testProductDescriptionCreation(){
      $product = factory(\App\Product::class)->create(['name' => 'bbbbeetsss']);
      $descriptions = factory(\App\Description::class)->make();
      //$this->post(route('products.store'), $product->toArray(), $this->jsonHeaders)->assertSuccessful();
      $this->post(route('products.descriptions.store',['products' =>$product->id]), $descriptions->toArray())->assertSuccessful();
      $this->assertDatabaseHas('descriptions',['body'=> $descriptions->body]);
    }

    public function testProductUpdate(){
      $product = factory(\App\Product::class)->create(['name' => 'beetss']);
      $product->name ='feetss';
      //$this->post(route('products.store'), $product->toArray(), $this->jsonHeaders)->assertSuccessful();
      $this->put(route('products.update', ['products'=> $product->id]) ,$product->toArray());
      //->assertSuccessful();
      $this->assertDatabaseHas('products',['name'=> $product->name]);
    }

    public function testProductCreationFailsWhenNameNotProvided(){
      $product = factory(\App\Product::class)->make(['name' => '']);
      //$this->post(route('products.store'), $product->toArray(), $this->jsonHeaders)->assertSuccessful();
      $this->post(route('products.descriptions.store'), $product>toArray())
      ->assertJson(['name'=>['The name is required']])
      ->assertStatus(422);
    }

    //public function testProductCreationFailsWhenNameNotProvided(){
      public function testProductCreationFailsWhenNameNotUnique(){
      $name ='feets';
      $product1 = factory(\App\Product::class)->create(['name' => $name]);
      $product2 = factory(\App\Product::class)->make(['name' => $name]);
      //$this->post(route('products.store'), $product->toArray(), $this->jsonHeaders)->assertSuccessful();
      $this->post(route('products.descriptions.store'),$product2->toArray())
      ->assertJson(['name'=>['The name is already being taken.']])
      ->assertStatus(422);
    }

    public function testProductDescriptionCreationFailsWhenBodyNotProvided(){
      $product = factory(\App\Product::class)->create(['name' => 'beets']);
      $descriptions = factory(\App\Description::class)->make(['body'=>'']);
      //$this->post(route('products.store'), $product->toArray(), $this->jsonHeaders)->assertSuccessful();
      $this->post(route('products.descriptions.store',['products' =>$product->id]), $descriptions->toArray())
      ->assertJson(['body'=>['The body is required.']])
      ->assertDatabaseHas('descriptions',['body'=> $descriptions->body])->assertStatus(422);
    }

    public function testProductCreationFailsWhenNameUpToQuality(){
      $product = factory(\App\Product::class)->make(['name' => 'notquality']);

      //$this->post(route('products.store'), $product->toArray(), $this->jsonHeaders)->assertSuccessful();
      $this->post(route('products.store'), $product->toArray())
      //->assertSuccessful();
      ->assertJson(['name'=>['The product name provided does not match our standard of excellence.']])
      ->assertStatus(422);;
    }

}
