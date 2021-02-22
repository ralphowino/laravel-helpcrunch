<?php

namespace Ralphowino\HelpCrunch\Tests;

use Illuminate\Support\Str;

class HelpCrunchCustomerTest extends TestCase
{
    public function customerFactory()
    {
        return [
            'userId' => Str::random(8),
            'email' => 'john@doe.com',
        ];
    }

    /**
     * @test
     * @group current
     */
    public function can_create_a_customer()
    {
        $customer = $this->customerFactory();
        $response = $this->helpCrunch->customer()->create($customer);
        $this->assertEquals($response['userId'], $customer['userId']);
        $this->assertEquals($response['email'], $customer['email']);
    }

    /**
     * @test
     * @group current
     */
    public function throws_error_when_same_user_id_used()
    {
        $customer = $this->customerFactory();
        $this->helpCrunch->customer()->create($customer);
        $response = $this->helpCrunch->customer()->create($customer);
        $this->assertEquals($response['userId'], $customer['userId']);
        $this->assertEquals($response['email'], $customer['email']);
    }


}
