<?php

namespace ChatWork\Api\Client\Endpoint\Rooms\RequestBody;

use ChatWork\Api\Client\Foundation\Request\RequestBody;

/**
 * @package ChatWork\Api\Client\Endpoint\Rooms\RequestBody
 */
final class CreateRoomRequestBody implements RequestBody
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
     * @var bool
     */
    private $link;

    /**
     * @var string
     */
    private $linkCode;

    /**
     * @var bool
     */
    private $linkNeedAcceptance;

    /**
     * @var int[]
     */
    private $membersAdminIds;

    /**
     * @var int[]
     */
    private $membersMemberIds;

    /**
     * @var int[]
     */
    private $membersReadonlyIds;

    /**
     * @param string $name
     * @param string $description
     * @param int[] $membersAdminIds
     * @param int[] $membersMemberIds
     * @param int[] $membersReadonlyIds
     * @param string $iconPreset
     * @param bool $link
     * @param string $linkCode
     * @param bool $linkNeedAcceptance
     */
    public function __construct(string $name,
                                string $description = '',
                                array $membersAdminIds = [],
                                array $membersMemberIds = [],
                                array $membersReadonlyIds = [],
                                string $iconPreset = 'group',
                                bool $link = true,
                                string $linkCode = '',
                                bool $linkNeedAcceptance = true)
    {
        assert(mb_strlen($name) > 0);
        assert(count($membersAdminIds) > 0);
        $this->name = $name;
        $this->description = $description;
        $this->membersAdminIds = $membersAdminIds;
        $this->membersMemberIds = $membersMemberIds;
        $this->membersReadonlyIds = $membersReadonlyIds;
        $this->iconPreset = $iconPreset;
        $this->link = $link;
        $this->linkCode = $linkCode;
        $this->linkNeedAcceptance = $linkNeedAcceptance;
    }

    /**
     * @return array
     */
    public function normalize(): array
    {
        $params = [
            'name'                 => $this->name,
            'description'          => $this->description,
            'icon_preset'          => $this->iconPreset,
            'link'                 => $this->link,
            'link_need_acceptance' => $this->linkNeedAcceptance,
            'members_admin_ids'    => implode(',', $this->membersAdminIds),
            'members_member_ids'   => implode(',', $this->membersMemberIds),
            'members_readonly_ids' => implode(',', $this->membersReadonlyIds)
        ];

        if ($this->linkCode !== '') {
            return array_merge($params, [
                'link_code' => $this->linkCode,
            ]);
        }

        return $params;
    }
}
