<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;

class ChatController extends Controller
{
    public function chat(Request $request) {
        // dd($request);
        $result = OpenAI::completions()->create([
            'max_token' => 200,
            'model' => 'gpt-3.5-turbo-instruct',
            'prompt' => $request->message
        ]);

        $response = array_reduce(
            $result->toArray()['choices'],
            fn(string $result, array $choice)=> $result . $choice['text'], ""
        );

        return $response;
    }
}
