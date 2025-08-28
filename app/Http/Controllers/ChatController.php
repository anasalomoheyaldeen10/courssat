<?php

namespace App\Http\Controllers;
use App\Services\OpenAIClient;
use Illuminate\Http\Request;

class ChatController extends Controller
{
     private $ai;

    public function __construct(OpenAIClient $ai)
    {
        $this->ai = $ai;
    }

    public function chat(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:5000',
            'model'   => 'nullable|string',
        ]);

        $reply = $this->ai->chat(
            $validated['message'],
            $validated['model'] ?? 'gpt-4.1-mini'
        );

        return response()->json([
            'message' => $validated['message'],
            'reply'   => $reply,
        ]);
    }
}
