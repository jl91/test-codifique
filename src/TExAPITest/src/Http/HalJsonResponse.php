<?php

namespace TExAPITest\Http;


use Zend\Diactoros\Response\JsonResponse;

final class HalJsonResponse extends JsonResponse
{
    public function __construct($data, $status = 200, $headers = [], $encodingOptions = self::DEFAULT_JSON_FLAGS)
    {

        $headers = array_merge($headers, [
            'Content-Type' => 'application/hal+json'
        ]);

        $data = $this->serializeData($data);

        parent::__construct($data, $status, $headers, $encodingOptions);
    }

    private function serializeData($data)
    {
        return $data;
    }

}