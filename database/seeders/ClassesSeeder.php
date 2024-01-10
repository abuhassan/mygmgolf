<?php

namespace Database\Seeders;

use App\Models\Classes;
use App\Models\Student;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Classes::factory()
            ->count(10)
            ->sequence(fn ($sequence) => [
                'name' => 'Class ' . $sequence->index + 1
            ])
            ->has(
                Category::factory()
                ->count(3)
                ->state(
                    new Sequence(
                        ['name' => 'Category Beginer'],
                        ['name' => 'Category Intermediate'],
                        ['name' => 'Category Advanced'],
                    )
                )
                ->has(
                    Student::factory()
                    ->count(5)
                    ->state(
                        function (array $attributes, Category $category) {
                            return [
                                'class_id' => $category->class_id,

                            ];
                        }
                    )
                    )
                )

            ->create();
    }
}
