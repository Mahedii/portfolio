<?php

namespace App\Services\WorkHistory;

use GuzzleHttp\Client;

class WorkHistoryService
{
    protected $client;
    protected $apiKey;

    public function __construct($apiKey)
    {
        $this->client = new Client([
            'base_uri' => 'https://api.openai.com/v1/',
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $apiKey,
            ],
        ]);
    }

    public function sendMessage($message)
    {
        $response = $this->client->post('engines/davinci/completions', [
            'json' => [
                'prompt' => $message,
                'temperature' => 0.5,
                'max_tokens' => 110,
                'top_p' => 1,
                'frequency_penalty' => 0,
                'presence_penalty' => 0,
            ],
        ]);

        $responseData = json_decode($response->getBody(), true);
        // dd($responseData);
        $message = $responseData['choices'][0]['text'];

        return $message;
    }
}
