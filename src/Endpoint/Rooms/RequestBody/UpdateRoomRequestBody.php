<?php

namespace ChatWork\Api\Client\Endpoint\Rooms\RequestBody;

use ChatWork\Api\Client\Foundation\Request\RequestBody;

/**
 * @package ChatWork\Api\Client\Endpoint\Rooms\RequestBody
 */
final class UpdateRoomRequestBody implements RequestBody
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $iconPreset;

    /**
     * @param string $name
     * @param string $description
     * @param string $iconPreset
     */
    public function __construct(string $name, string $description, string $iconPreset)
    {
        $this->name = $name;
        $this->description = $description;
        $this->iconPreset = $iconPreset;
    }

    /**
     * @return array
     */
    public function normalize(): array
    {
        return [
            'name'        => $this->name,
            'description' => $this->description,
            'icon_preset' => $this->iconPreset
        ];
    }
}
