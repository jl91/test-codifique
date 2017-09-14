<?php

namespace TExAPITest\Http;

use Hateoas\HateoasBuilder;
use Zend\Diactoros\Response;


final class HalJsonResponse extends Response
{
    public function __construct($data, $status = 200, $headers = [])
    {
        $headers = array_merge($headers, [
            'Content-Type' => 'application/hal+json'
        ]);

        $body = $this->parseBody($data);
        parent::__construct($body, $status, $headers);
    }

    public function parseBody(array $data = [])
    {
        $hateoas = HateoasBuilder::create()->build();
        return $hateoas->serialize($data, 'json');
    }

}