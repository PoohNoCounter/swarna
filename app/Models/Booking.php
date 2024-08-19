<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Artisan;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'booking';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['id', 'token', 'product_id', 'user_id', 'location', 'rental_date', 'return_date', 'status', 'quantity', 'total', 'command', 'command_return'];

    protected $dates = ['rental_date', 'return_date'];

    public static function boot()
    {
        parent::boot();

        static::created(function ($task) {
            Artisan::queue('send:booking-notifications')->delay($task->created_at);
            Artisan::queue('send:deadline-notifications')->delay($task->return_date);
        });
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
