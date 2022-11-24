<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            'name' => 'Test',
        ]);
        DB::table('tags')->insert([
            'name' => 'Dal vivo',
        ]);
        DB::table('tags')->insert([
            'name' => 'Appena uscito',
        ]);
        DB::table('tags')->insert([
            'name' => 'Per bambini',
        ]);
        DB::table('tags')->insert([
            'name' => 'Tutta la famiglia',
        ]);
    }
}
