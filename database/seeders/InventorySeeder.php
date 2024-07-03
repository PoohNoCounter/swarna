<?php

namespace Database\Seeders;

use App\Models\Inventory;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $inventories = [
            [
                'id' => Str::uuid(),
                'name' => 'Barang 1',
                'type_id' => $this->type('Tipe 1.1'),
                'desc' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. ',
                'img' => "logo.png",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Barang 2',
                'type_id' => $this->type('Tipe 2.1'),
                'desc' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. ',
                'img' => "logo.png",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

        ];
        Inventory::query()->insert($inventories);
    }

    private function type(string $name): string
    {
        $type = Type::where('name', $name)->first();
        if (!$type) {
            $type = Type::create([
                'id' => Str::uuid(),
                'name' => $name,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
        return $type->id;
    }
}
