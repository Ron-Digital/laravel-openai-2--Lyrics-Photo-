<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Orhanerday\OpenAi\OpenAi;

class AiController extends Controller
{
    public function index()
    {
        return view('ai.index');
    }

    public function result(Request $request)
    {
        $topic = $request->topic;
        $style = $request->style;
        $language = $request->language;

        //$tone = $request->tone;

        $open_ai = new OpenAi(env('OPEN_AI_API_KEY'));

        $prompt = "You are the Lyrics Writer, Can you write a song lyric about " . $topic . " in " . $style . " style in " . $language . " ?";

        $openAiOutput = $open_ai->completion([
            'model' => 'text-davinci-002',
            'prompt' => $prompt,
            'temperature' => 0.9,
            'max_tokens' => 500,
            'frequency_penalty' => 0,
            'presence_penalty' => 0.6,
        ]);

        $output = json_decode($openAiOutput, true);
        $outputText = $output["choices"][0]["text"];

        ////////////////////////////////////

        $imagePrompt = $style . " music album cover about " . $topic;

        $openAiImageOutput = $open_ai->image([
            "prompt" => $imagePrompt,
            "n" => 1,
            "size" => "512x512",
            "response_format" => "url",
        ]);

        $outputImage = json_decode($openAiImageOutput, true);
        $image_url = $outputImage["data"][0]["url"];

        ///////////////////////////
        return view('ai.index', ['result' => $outputText, 'image' => $image_url]);
    }
}
//'result' => $outputText,
