<?php

namespace QuarkCMS\Quark\Component\Form\Fields;

use QuarkCMS\Quark\Component\Form\Fields\Item;

class DatetimeRange extends Item
{
    /**
     * 组件类型
     *
     * @var string
     */
    public $component = 'datetimeRangeField';

    /**
     * 默认值
     *
     * @var string
     */
    public $defaultValue = [null,null];
}
