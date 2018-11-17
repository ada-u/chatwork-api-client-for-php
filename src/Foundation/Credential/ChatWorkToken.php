<?php

namespace ChatWork\Api\Client\Foundation\Credential;

/**
 * @package ChatWork\Api\Client\Foundation\Credential
 */
final class ChatWorkToken implements Credential
{

    /**
     * @var string
     */
    private $value;

    /**
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }


    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }
}
