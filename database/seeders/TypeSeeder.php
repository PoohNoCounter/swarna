<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'id' => Str::uuid(),
                'category_id' => $this->category('Kategori 1'),
                'name' => 'Tipe 1.1',
                'desc' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. ',
                'img' => "logo.png",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'category_id' => $this->category('Kategori 1'),
                'name' => 'Tipe 1.2',
                'desc' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. ',
                'img' => "logo.png",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'category_id' => $this->category('Kategori 1'),
                'name' => 'Tipe 1.3',
                'desc' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. ',
                'img' => "logo.png",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'category_id' => $this->category('Kategori 2'),
                'name' => 'Tipe 2.1',
                'desc' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. ',
                'img' => "logo.png",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'category_id' => $this->category('Kategori 2'),
                'name' => 'Tipe 2.2',
                'desc' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. ',
                'img' => "logo.png",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'category_id' => $this->category('Kategori 3'),
                'name' => 'Tipe 3',
                'desc' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. ',
                'img' => "logo.png",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'category_id' => $this->category('Kategori 4'),
                'name' => 'Tipe 4',
                'desc' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. ',
                'img' => "logo.png",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

        ];
        type::query()->insert($types);
    }

    private function category(string $name): string
    {
        $category = Category::where('name', $name)->first();
        if (!$category) {
            $category = Category::create([
                'id' => Str::uuid(),
                'name' => $name,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
        return $category->id;
    }
}
