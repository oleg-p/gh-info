<?php

declare(strict_types=1);

namespace GhInfo\Infrastructure\Http;

use Exception;
use GhInfo\Infrastructure\Request;
use GhInfo\Infrastructure\Result;
use GhInfo\Infrastructure\Result\Failed;
use GhInfo\Infrastructure\Result\Successful;
use GhInfo\Infrastructure\Transport;
use yii\httpclient\Client;

class YiiTransport implements Transport
{
    /**
     * @var Client
     */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function response(Request $request): Result
    {
        try {
            $response = $this->client->createRequest()
                ->setMethod($request->method())
                ->setUrl($request->url())
                ->setHeaders($request->headers())
                ->send();
        } catch (Exception $exception) {
            return new Failed([$exception]);
        }

        if (!$response->isOk) {
            return new Failed([$response->content]);
        }

        return new Successful([$response->getContent()]);
    }
}