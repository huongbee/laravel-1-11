<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $table='products';

  public function type_products(){
    ///return $this->belongsTo('App\TypeProducts','id','id_type');
    return $this->belongsTo('App\TypeProducts','id_type','id');
  }

  public function bill_detail(){
    return $this->hasMany('App\BillDetail','id_product','id');
  }
}
