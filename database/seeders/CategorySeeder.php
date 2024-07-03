<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'id' => Str::uuid(),
                'name' => 'Kategori 1',
                'desc' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. ',
                'img' => "logo.png",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Kategori 2',
                'desc' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. ',
                'img' => "logo.png",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Kategori 3',
                'desc' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. ',
                'img' => "logo.png",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Kategori 4',
                'desc' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. ',
                'img' => "logo.png",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Kategori 5',
                'desc' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. ',
                'img' => "logo.png",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Kategori 6',
                'desc' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. ',
                'img' => "logo.png",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Kategori 7',
                'desc' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. ',
                'img' => "logo.png",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Kategori 8',
                'desc' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. ',
                'img' => "logo.png",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Kategori 9',
                'desc' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. ',
                'img' => "logo.png",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Kategori 10',
                'desc' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. ',
                'img' => "logo.png",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Kategori 11',
                'desc' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. ',
                'img' => "logo.png",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Kategori 12',
                'desc' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. ',
                'img' => "logo.png",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

        ];
        Category::query()->insert($categories);
    }
}
