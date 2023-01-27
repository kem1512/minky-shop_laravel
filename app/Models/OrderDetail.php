<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = 'order_details';
    protected $primarykey = 'id';
    protected $guarded = [];

    public function order(){
        return $this->belongTo(Order:class, 'order_id', 'id');
    }

    public function product(){
        return $this->belongTo(Product:class, 'product_id', 'id');
    }
}
