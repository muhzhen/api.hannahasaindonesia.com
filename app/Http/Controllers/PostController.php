<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PostController extends Controller
{
    //
    public function index()
    {
        // Ambil semua posting dan tambahkan URL gambar
        $posts = Post::where('is_published', true)->latest()->paginate(5);

        return PostResource::collection($posts);
    }

    public function show($slug)
    {
        // Cari data berdasarkan slug
        $post = Post::where('slug', $slug)->first();

        // Jika tidak ada data, kembalikan response 404
        if (!$post) {
            return response()->json(['statusCode' => 404, 'message' => 'Post not found'], 404);
        }

        // Format tanggal
        $formattedDate = Carbon::parse($post->tanggal)
        ->locale('id')  // Set locale ke bahasa Indonesia
        ->translatedFormat('j F Y');

        // Data untuk dikembalikan dalam format JSON
        $response = [
            'statusCode' => 200,
            'message' => 'success',
            'data' => [
                'id' => $post->id,
                'reading_time' => $post->reading_time, // Sesuaikan jika perlu
                'thumbnail' => $post->thumbnail,
                'title' => $post->title,
                'content' => $post->content,
                'slug' => $post->slug,
                'category_id' => $post->category_id,
                'is_published' => $post->is_published,
                'tanggal' => $formattedDate, // Tanggal yang diformat
            ]
        ];

        // Kembalikan data dalam format JSON
        return response()->json($response, 200);
    }

    public function search(Request $request)
    {
          $query = $request->input('q');

        if (!$query) {
            return response()->json(['error' => 'Search query is required'], 400);
        }

        // Simple search in 'title' or 'content'
        $results = Post::where('title', 'LIKE', "%{$query}%")
            ->orWhere('content', 'LIKE', "%{$query}%")
            ->get();

        return response()->json([
            'statusCode' => 200,
            'message' => 'success',
            'data' => $results
            // Tambahkan informasi pagination jika ada
        ]);
    }
}
