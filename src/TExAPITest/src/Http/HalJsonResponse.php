<?php

namespace TExAPITest\Http;

use Hateoas\HateoasBuilder;
use Zend\Diactoros\Response;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Diactoros\Stream;


final class HalJsonResponse extends Response
{
    public function __construct($data, $status = 200, $headers = [])
    {
        $headers = array_merge($headers, [
            'content-type' => 'application/hal+json'
        ]);

        $body = $this->parseBody($data);
        parent::__construct($body, $status, $headers);
    }

    public function parseBody(array $data = [])
    {
        $hateoas = HateoasBuilder::create()->build();
        $json =  $hateoas->serialize($data, 'json');

        $body = new Stream('php://temp', 'wb+');
        $body->write($json);
        $body->rewind();

        return $body;
    }

}