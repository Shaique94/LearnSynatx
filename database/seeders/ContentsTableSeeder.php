<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class ContentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $chapters = DB::table('chapters')->get();
        $contents = [];

        foreach ($chapters as $chapter) {
            for ($i = 1; $i <= 5; $i++) { // Generate 5 contents per chapter
                $contentTitle = fake()->sentence(5);

                // Generate a longer description of approximately 600 words
                $description = $this->generateLongParagraph(600);

                $contents[] = [
                    'chapter_id' => $chapter->id,
                    'content' => $contentTitle,
                    'description' => $description,
                    'content_slug' => Str::slug($contentTitle),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        DB::table('contents')->insert($contents);
    }

    /**
     * Generate a paragraph with approximately the given word count.
     *
     * @param int $wordCount
     * @return string
     */
    private function generateLongParagraph(int $wordCount): string
    {
        $text = '';
        $currentWordCount = 0;

        while ($currentWordCount < $wordCount) {
            $sentence = fake()->sentence(rand(12, 20)); // Generate a sentence with 12-20 words
            $text .= $sentence . ' ';
            $currentWordCount += str_word_count($sentence);
        }

        return trim($text);
    }
}
