<?php

namespace TExAPITest\Http;

use Hateoas\HateoasBuilder;
use Zend\Diactoros\Response;
use Zend\Diactoros\Stream;
use Hateoas\Representation\PaginatedRepresentation;
use Hateoas\Representation\CollectionRepresentation;


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
        $hateoas = HateoasBuilder::create()
            ->build();

        $paginatedCollection = $this->getPaginatedCollection($data);

        $json = $hateoas->serialize($paginatedCollection, 'json');

        $body = new Stream('php://temp', 'wb+');
        $body->write($json);
        $body->rewind();

        return $body;
    }

    private function getPaginatedCollection($data)
    {
        return new PaginatedRepresentation(
            new CollectionRepresentation(
                $data
            ),
            'user_list', // route
            array(), // route parameters
            1,       // page number
            10,      // limit
            1,       // total pages
            'page',  // page route parameter name, optional, defaults to 'page'
            'limit', // limit route parameter name, optional, defaults to 'limit'
            false,   // generate relative URIs, optional, defaults to `false`
            count($data)       // total collection size, optional, defaults to `null`
        );

    }

}