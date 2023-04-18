<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function modification_product()
    {
         return $this->hasmany(Modification::class, 'modification_id');
    }

    public $fillable = [
        'name',
        'category_id',
        'price',
        'old_price',
        'content',
    ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function modifications()
    {
        return $this->belongsToMany(Modification::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function stored_products()
    {
        return $this->hasMany(Stored::class);
    }
}
