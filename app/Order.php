<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";

    public function book() {
        return $this->hasOne('App\Book', 'id', 'book_id');
    }
}
