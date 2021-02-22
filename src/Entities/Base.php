<?php

namespace Ralphowino\HelpCrunch\Entities;


use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;

class Base
{

    protected PendingRequest $client;

    public function __construct(PendingRequest $client)
    {
        $this->client = $client;
    }

    public function handleErrors(Response $response)
    {
        $response->throw();
    }
}
