<?php

namespace Ralphowino\HelpCrunch;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use Ralphowino\HelpCrunch\Entities\Customer;

class HelpCrunch
{
    protected PendingRequest $client;

    public function __construct()
    {
        $token = config('services.helpcrunch.key');
        if (! $token) {
            throw new \Exception('Helpcrunch key missing. Please set in config service.helpcrunch.key');
        }
        $this->client = Http::baseUrl('https://api.helpcrunch.com/v1/')->withToken($token);
    }

    public function customer()
    {
        return new Customer($this->client);
    }
}
