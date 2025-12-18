<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FoodSuggestion;

class FoodSuggestionSeeder extends Seeder
{
    public function run(): void
    {
        $foods=[

            /*** بروتين ***/
            // لحوم
            [
                'food_name' => 'صدور دجاج',
                'type' => 'protein',
                'calories_per_gram' => 1.65,
                'protein_per_100g' => 31,
                'carbs_per_100g' => 0,
                'fat_per_100g' => 3.6,
            ],
            [
                'food_name' => 'لحم بقري قليل الدهن',
                'type' => 'protein',
                'calories_per_gram' => 2.5,
                'protein_per_100g' => 26,
                'carbs_per_100g' => 0,
                'fat_per_100g' => 15,
            ],

            // أسماك
            [
                'food_name' => 'تونة',
                'type' => 'protein',
                'calories_per_gram' => 1.2,
                'protein_per_100g' => 23,
                'carbs_per_100g' => 0,
                'fat_per_100g' => 1,
            ],
            [
                'food_name' => 'سلمون',
                'type' => 'protein',
                'calories_per_gram' => 2.08,
                'protein_per_100g' => 20,
                'carbs_per_100g' => 0,
                'fat_per_100g' => 13,
            ],

            // ألبان
            [
                'food_name' => 'لبنة قليلة الدسم',
                'type' => 'protein',
                'calories_per_gram' => 1.7,
                'protein_per_100g' => 10,
                'carbs_per_100g' => 4,
                'fat_per_100g' => 5,
            ],
            [
                'food_name' => 'جبن قريش',
                'type' => 'protein',
                'calories_per_gram' => 0.85,
                'protein_per_100g' => 11,
                'carbs_per_100g' => 3.4,
                'fat_per_100g' => 4.3,
            ],

            // بقوليات (دمجناها مع البروتين)
            [
                'food_name' => 'عدس',
                'type' => 'protein',
                'calories_per_gram' => 1.16,
                'protein_per_100g' => 9,
                'carbs_per_100g' => 20,
                'fat_per_100g' => 0.4,
            ],
            [
                'food_name' => 'حمص',
                'type' => 'protein',
                'calories_per_gram' => 1.64,
                'protein_per_100g' => 19,
                'carbs_per_100g' => 61,
                'fat_per_100g' => 6,
            ],
            [
                'food_name' => 'فول',
                'type' => 'protein',
                'calories_per_gram' => 1.1,
                'protein_per_100g' => 7,
                'carbs_per_100g' => 19,
                'fat_per_100g' => 0.5,
            ],
            [
                'food_name' => 'فاصوليا حمراء',
                'type' => 'protein',
                'calories_per_gram' => 1.27,
                'protein_per_100g' => 8.7,
                'carbs_per_100g' => 22,
                'fat_per_100g' => 0.5,
            ],
            [
                'food_name' => 'بازيلا',
                'type' => 'protein',
                'calories_per_gram' => 0.81,
                'protein_per_100g' => 5,
                'carbs_per_100g' => 14,
                'fat_per_100g' => 0.4,
            ],

            // منتجات معالجة
            [
                'food_name' => 'مرتديلا دجاج',
                'type' => 'protein',
                'calories_per_gram' => 2.2,
                'protein_per_100g' => 16,
                'carbs_per_100g' => 4,
                'fat_per_100g' => 14,
            ],
            [
                'food_name' => 'مرتديلا بقري',
                'type' => 'protein',
                'calories_per_gram' => 2.5,
                'protein_per_100g' => 18,
                'carbs_per_100g' => 3,
                'fat_per_100g' => 18,
            ],

            /*** كاربوهيدرات ***/
            [
                'food_name' => 'أرز أبيض',
                'type' => 'carbs',
                'calories_per_gram' => 1.3,
                'protein_per_100g' => 2.7,
                'carbs_per_100g' => 28,
                'fat_per_100g' => 0.3,
            ],
            [
                'food_name' => 'مكرونة',
                'type' => 'carbs',
                'calories_per_gram' => 1.3,
                'protein_per_100g' => 5,
                'carbs_per_100g' => 25,
                'fat_per_100g' => 1,
            ],
            [
                'food_name' => 'بطاطس',
                'type' => 'carbs',
                'calories_per_gram' => 0.77,
                'protein_per_100g' => 2,
                'carbs_per_100g' => 17,
                'fat_per_100g' => 0.1,
            ],
            [
                'food_name' => 'شوفان',
                'type' => 'carbs',
                'calories_per_gram' => 3.8,
                'protein_per_100g' => 17,
                'carbs_per_100g' => 66,
                'fat_per_100g' => 7,
            ],

            /*** دهون صحية ***/
            [
                'food_name' => 'أفوكادو',
                'type' => 'fat',
                'calories_per_gram' => 1.6,
                'protein_per_100g' => 2,
                'carbs_per_100g' => 9,
                'fat_per_100g' => 15,
            ],
            [
                'food_name' => 'زيت زيتون',
                'type' => 'fat',
                'calories_per_gram' => 9,
                'protein_per_100g' => 0,
                'carbs_per_100g' => 0,
                'fat_per_100g' => 100,
            ],
            [
                'food_name' => 'لوز',
                'type' => 'fat',
                'calories_per_gram' => 5.8,
                'protein_per_100g' => 21,
                'carbs_per_100g' => 22,
                'fat_per_100g' => 50,
            ],
            [
                'food_name' => 'جوز',
                'type' => 'fat',
                'calories_per_gram' => 6.6,
                'protein_per_100g' => 15,
                'carbs_per_100g' => 14,
                'fat_per_100g' => 65,
            ],

        ];


        foreach ($foods as $food) {
            FoodSuggestion::create([
                'food_name' => $food['food_name'],
                'type' => $food['type'],
                'calories_per_gram' => $food['calories_per_gram'],
                'protein_per_100g' => $food['protein_per_100g'],
                'carbs_per_100g' => $food['carbs_per_100g'],
                'fat_per_100g' => $food['fat_per_100g'],
            ]);
        }
    }
}
