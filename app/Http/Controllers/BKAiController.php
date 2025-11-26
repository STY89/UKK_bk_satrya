<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BKAiController extends Controller
{
    public function index()
    {
        $role = auth()->user()->role ?? 'siswa';
        return view('bk-ai.index', compact('role'));
    }

    public function chat(Request $request)
    {
        $message = $request->input('message');

        // Call GROQ API
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('GROQ_API_KEY'),
        ])->post('https://api.groq.com/openai/v1/chat/completions', [
            'model' => 'llama-3.3-70b-versatile',
            'messages' => [
                ['role' => 'user', 'content' => $message],
            ],
            'max_tokens' => 500,
        ]);

        // Error handling
        if ($response->failed()) {
            return response()->json([
                'reply' => 'Groq Error: ' . $response->body()
            ]);
        }

        $reply = $response->json()['choices'][0]['message']['content'] ?? 'Maaf, ada kesalahan.';

        return response()->json(['reply' => $reply]);
    }
}
