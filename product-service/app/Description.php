<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    public function producy(){
      $this->belongsTo(Product::class);
    }
}
