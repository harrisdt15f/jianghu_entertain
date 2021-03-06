<?php

namespace App\ModelFilters\Notice;

use EloquentFilter\ModelFilter;

/**
 * Class NoticeLoginFilter
 * @package App\ModelFilters\Notice
 */
class NoticeLoginFilter extends ModelFilter
{

    /**
     * Related Models that have ModelFilters as well as the method on the ModelFilter
     * As [relationMethod => [input_key1, input_key2]].
     *
     * @var mixed[]
     */
    public $relations = [];

    /**
     * 按平台搜索.
     *
     * @param integer $platform_id 所属平台的id.
     * @return NoticeLoginFilter
     */
    public function platform(int $platform_id): NoticeLoginFilter
    {
        return $this->where('platform_id', $platform_id);
    }

    /**
     * 按标题搜索.
     *
     * @param string $title 标题.
     * @return NoticeLoginFilter
     */
    public function title(string $title): NoticeLoginFilter
    {
        return $this->where('title', $title);
    }

    /**
     * 按设备查找.
     *
     * @param integer $device 设备.
     * @return NoticeLoginFilter
     */
    public function device(int $device): NoticeLoginFilter
    {
        return $this->where('device', $device);
    }
}
