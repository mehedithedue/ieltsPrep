<?php

use App\Model\Part;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PartTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Part::truncate();

        Part::insert([
            ['name' => 'Reading','created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Writing','created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Listening','created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Speaking','created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
