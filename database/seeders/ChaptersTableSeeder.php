<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class ChaptersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $courses = DB::table('courses')->get();
        $chapters = [];
        foreach ($courses as $course) {
            for ($i = 1; $i <= 10; $i++) { // Generate 10 chapters per course
                $chapters[] = [
                    'course_id' => $course->id,
                    'title' => "Chapter $i: " . fake()->sentence(4),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        DB::table('chapters')->insert($chapters);
    }
}
