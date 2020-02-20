<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeGroup extends Model
{
    protected $table = 'attributesgroup';

    public function attributesValue()
    {
        return $this->hasMany(AttributeValue::class,'attributegroup_id');

    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'attributegroup_category','attributegroup_id','category_id');
    }
}