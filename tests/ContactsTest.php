<?php

namespace ChatWork\Api\Client\Tests;

use ChatWork\Api\Client\Contacts;
use ChatWork\Api\Client\Foundation\Credential\ChatWorkToken;
use PHPUnit\Framework\TestCase;

class ContactsTest extends TestCase
{

    /**
     * @test
     */
    public function getContacts()
    {
        $me = new Contacts(new ChatWorkToken(getenv('CHATWORK_TOKEN')));
        $response = $me->getContacts();


        $this->assertTrue(
            in_array($response->getStatusCode(), [200, 204], true),
            'chatwork api responds with 204 status code if you dont have any contacts'
        );    }
}
