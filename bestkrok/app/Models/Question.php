<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable=['question','answer','category_id'];
    public function category()
    {
        return $this->hasOne('App\Models\Category','id','category_id');
    }
}
