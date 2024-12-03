<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $courses = [];
        for ($i = 1; $i <= 50; $i++) { //  50 courses
            $courseName = "Course $i: " . fake()->sentence(5);
            $courses[] = [
                'icon' => "course{$i}_icon.png",
                'course_name' => $courseName,
                'description' => fake()->paragraph(),
                'course_slug' => Str::slug($courseName),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('courses')->insert($courses);
    }
}
