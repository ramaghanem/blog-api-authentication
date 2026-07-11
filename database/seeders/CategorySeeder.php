<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    //    Category::factory(5)->create();

    $categories = [
    'Technology',
    'Programming',
    'Laravel',
    'PHP',
];

foreach ($categories as $category) {
    Category::create([
        'name' => $category,
    ]);
}
    }
}
