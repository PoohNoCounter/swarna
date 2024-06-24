<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'booking';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['id', 'token', 'product_id', 'user_id', 'location', 'rental_date', 'return_date', 'status', 'total', 'created_at', 'updated_at'];

    public function Product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
