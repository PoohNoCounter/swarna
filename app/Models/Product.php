<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'product';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['id', 'name', 'type_id', 'desc', 'img', 'quantity', 'price', 'created_at', 'updated_at'];

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }
}
