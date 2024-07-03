<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bookings = [
            [
                'id' => Str::uuid(),
                'token' => '1234567890',
                'product_id' => $this->Product('Produk 1.1.1'),
                'user_id' => $this->User('Administrator'),
                'location' => 'Jakarta',
                'status' => 'Menunggu Konfirmasi',
                'total' => 50000,
                'quantity' => 20,
                'rental_date' => Carbon::now(),
                'return_date' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'token' => '1234567890',
                'product_id' => $this->Product('Produk 1.1.1'),
                'user_id' => $this->User('Administrator'),
                'location' => 'Jakarta',
                'status' => 'Menunggu Konfirmasi',
                'total' => 50000,
                'quantity' => 20,
                'rental_date' => Carbon::now(),
                'return_date' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'token' => '1234567890',
                'product_id' => $this->Product('Produk 1.1.1'),
                'user_id' => $this->User('Administrator'),
                'location' => 'Jakarta',
                'status' => 'Menunggu Konfirmasi',
                'total' => 50000,
                'quantity' => 20,
                'rental_date' => Carbon::now(),
                'return_date' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'token' => '1234567890',
                'product_id' => $this->Product('Produk 1.1.1'),
                'user_id' => $this->User('Administrator'),
                'location' => 'Jakarta',
                'status' => 'Menunggu Konfirmasi',
                'total' => 50000,
                'quantity' => 20,
                'rental_date' => Carbon::now(),
                'return_date' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];
        Booking::query()->insert($bookings);
    }

    private function Product(string $name): string
    {
        $product = Product::where('name', $name)->first();
        if (!$product) {
            $product = Product::create([
                'id' => Str::uuid(),
                'token' => '1234567890',
                'name' => $name,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
        return $product->id;
    }

    private function User(string $name): string
    {
        $User = User::where('name', $name)->first();
        if (!$User) {
            $User = User::create([
                'id' => Str::uuid(),
                'token' => '1234567890',
                'name' => $name,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
        return $User->id;
    }
}
