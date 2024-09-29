<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Post::create([
            'reading_time' => '10 menit',
            'thumbnail' => 'path/to/thumbnail2.jpg',
            'title' => 'Judul Postingan Kedua',
            'content' => 'Ini adalah konten dari postingan kedua.',
            'slug' => 'judul-postingan-kedua',
            'tanggal' => Carbon::now(), // Tanggal sekarang
            'category_id' => 1, // Pastikan category_id ini valid
            'is_published' => false,
        ]);
    }
}
