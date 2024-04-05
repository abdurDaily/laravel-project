<?php

namespace Database\Seeders;

use App\Models\Backend\SubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subCategorys = [
             [
                'category_id' => 1,
                'sub_category' => 'sub-category-1',
                'sub_category_slug' => 'sub-category-1',
             ],
             [
                'category_id' => 2,
                'sub_category' => 'sub-category-2',
                'sub_category_slug' => 'sub-category-2',
             ],
        ];

        foreach($subCategorys as $subCategory){
            SubCategory::create($subCategory);
        }
    }
}
