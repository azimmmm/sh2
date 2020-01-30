<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Product extends Model
{
    public function brand()
    {
        return $this->belongsTo(Brand::class);

   }

    public function category()
    {
return $this->belongsTo(Category::class) ;
   }
    public function user()
    {
return $this->belongsTo(User::class) ;
   }

    public function photo()
    {return $this->belongsTo(Photo::class);

   }

    public function orders()
    {
        return $this->belongsToMany(Order::class);

   }
}
