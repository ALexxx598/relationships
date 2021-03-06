<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $hidden = ['pivot'];

    protected $fillable = [
        'product_id',
        'cashProduct',
    ];

    public function products()
    {
        return $this->belongsTo(Products::class, 'product_id', 'product_id');
    }
}
