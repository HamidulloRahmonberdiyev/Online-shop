<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $totalPrice = 0;

    protected $fillable = [
        'user_id',
        'product_id',
        'modification_id',
        'quantity',
        'status',
    ]; 

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function modification()
    {
        return $this->belongsTo(Modification::class);
    }
}
