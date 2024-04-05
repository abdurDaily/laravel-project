<?php

namespace Database\Seeders;

use App\Models\Backend\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $categorys = [
             [
                'category_name' => 'category one',
                'category_slug' => 'category-one',
             ],
             [
                'category_name' => 'category two',
                'category_slug' => 'category-two',
             ],
        ];
        


        foreach($categorys as  $category ) {
            Category::create($category);
        }
    }
}
