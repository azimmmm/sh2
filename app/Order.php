<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function products()
    {
        return $this->belongsToMany(Product::class);

    }

    public function users()
    {
        return $this->hasMany(User::class);

    }

    public function payment()
    {
        return $this->hasOne(Payment::class);

    }
}
