<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class OpenAIClient
{
    private Client $http;

    public function __construct()
    {
        $this->http = new Client([
            'base_uri' => rtrim(config('services.openai.base_url'), '/') . '/',
            'timeout'  => 30,
            'headers'  => [
                'Authorization' => 'Bearer ' . config('services.openai.key'),
                'Content-Type'  => 'application/json',
            ],
        ]);
    }

   public function chat(string $message, string $model = 'gpt-4.1-mini'): string
{
    try {
        $res = $this->http->post('responses', [
            'json' => [
                'model' => $model,
                'input' => $message,
            ],
        ]);

        $data = json_decode((string) $res->getBody(), true);

        if (isset($data['output']) && is_array($data['output'])) {
            $texts = [];
            foreach ($data['output'] as $item) {
                if (isset($item['content']) && is_array($item['content'])) {
                    foreach ($item['content'] as $block) {
                        if (($block['type'] ?? '') === 'output_text' && isset($block['text'])) {
                            $texts[] = $block['text'];
                        }
                    }
                }
            }
            if (!empty($texts)) {
                return trim(implode("\n", $texts));
            }
        }

        // fallback
        return 'No response';
    } catch (RequestException $e) {
        $body = $e->hasResponse() ? (string) $e->getResponse()->getBody() : $e->getMessage();
        throw new \RuntimeException('OpenAI error: ' . $body, $e->getCode(), $e);
    }
}


}
