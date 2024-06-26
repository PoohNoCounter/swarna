<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $schedules = [
            [
                'id' => Str::uuid(),
                'name' => 'Lorem',
                'desc' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. ',
                'img' => "logo.png",
                'datetime' => Carbon::now(),
                'location' => 'Lorem ipsum dolor',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Lorem',
                'desc' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. ',
                'img' => "logo.png",
                'datetime' => Carbon::now(),
                'location' => 'Lorem ipsum dolor',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Lorem',
                'desc' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. ',
                'img' => "logo.png",
                'datetime' => Carbon::now(),
                'location' => 'Lorem ipsum dolor',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Lorem',
                'desc' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. ',
                'img' => "logo.png",
                'datetime' => Carbon::now(),
                'location' => 'Lorem ipsum dolor',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

        ];
        Schedule::query()->insert($schedules);
    }
}
