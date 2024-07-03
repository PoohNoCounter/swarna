<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'id' => Str::uuid(),
                'name' => 'Produk 1.1.1',
                'type_id' => $this->type('Tipe 1.1'),
                'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci dolorum, quae voluptatem ab voluptatibus omnis fugiat sed accusamus totam dignissimos officiis delectus assumenda rem expedita illo eveniet nemo exercitationem, animi optio aut odio tempora ex ut nisi.',
                'price' => 10000,
                'img' => "logo.png",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Produk 1.1.2',
                'type_id' => $this->type('Tipe 1.1'),
                'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci dolorum, quae voluptatem ab voluptatibus omnis fugiat sed accusamus totam dignissimos officiis delectus assumenda rem expedita illo eveniet nemo exercitationem, animi optio aut odio tempora ex ut nisi.',
                'price' => 10000,
                'img' => "logo.png",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Produk 1.1.3',
                'type_id' => $this->type('Tipe 1.1'),
                'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci dolorum, quae voluptatem ab voluptatibus omnis fugiat sed accusamus totam dignissimos officiis delectus assumenda rem expedita illo eveniet nemo exercitationem, animi optio aut odio tempora ex ut nisi.',
                'price' => 10000,
                'img' => "logo.png",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Produk 1.2.1',
                'type_id' => $this->type('Tipe 1.2'),
                'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci dolorum, quae voluptatem ab voluptatibus omnis fugiat sed accusamus totam dignissimos officiis delectus assumenda rem expedita illo eveniet nemo exercitationem, animi optio aut odio tempora ex ut nisi.',
                'price' => 10000,
                'img' => "logo.png",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Produk 1.2.2',
                'type_id' => $this->type('Tipe 1.2'),
                'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci dolorum, quae voluptatem ab voluptatibus omnis fugiat sed accusamus totam dignissimos officiis delectus assumenda rem expedita illo eveniet nemo exercitationem, animi optio aut odio tempora ex ut nisi.',
                'price' => 10000,
                'img' => "logo.png",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Produk 1.2.3',
                'type_id' => $this->type('Tipe 1.2'),
                'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci dolorum, quae voluptatem ab voluptatibus omnis fugiat sed accusamus totam dignissimos officiis delectus assumenda rem expedita illo eveniet nemo exercitationem, animi optio aut odio tempora ex ut nisi.',
                'price' => 10000,
                'img' => "logo.png",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Produk 2.1.1',
                'type_id' => $this->type('Tipe 2.1'),
                'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci dolorum, quae voluptatem ab voluptatibus omnis fugiat sed accusamus totam dignissimos officiis delectus assumenda rem expedita illo eveniet nemo exercitationem, animi optio aut odio tempora ex ut nisi.',
                'price' => 10000,
                'img' => "logo.png",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Produk 2.1.2',
                'type_id' => $this->type('Tipe 2.1'),
                'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci dolorum, quae voluptatem ab voluptatibus omnis fugiat sed accusamus totam dignissimos officiis delectus assumenda rem expedita illo eveniet nemo exercitationem, animi optio aut odio tempora ex ut nisi.',
                'price' => 10000,
                'img' => "logo.png",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

        ];
        Product::query()->insert($products);
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
