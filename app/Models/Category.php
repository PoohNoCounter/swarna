<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'category';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['id', 'name', 'desc', 'img', 'created_at', 'updated_at'];

    public function types()
    {
        return $this->hasMany(Type::class, 'category_id', 'id');
    }
}
