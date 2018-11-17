<?php

namespace ChatWork\Api\Client\Foundation\Request;

/**
 * @package ChatWork\Api\Client\Foundation\Request
 */
interface RequestBody
{

    /**
     * @return array
     */
    public function normalize(): array;
}
