<?php

namespace QuarkCMS\Quark\Component\Descriptions\Fields;

use QuarkCMS\Quark\Component\Descriptions\Fields\Item;
use Exception;

class Text extends Item
{
    /**
     * 初始化Input组件
     *
     * @param  string  $dataIndex
     * @param  string  $label
     * @return void
     */ 
    public function __construct($dataIndex,$label = '')
    {
        $this->type = 'text';
        $this->dataIndex = $dataIndex;
    }

    /**
     * 组件json序列化
     *
     * @return array
     */
    public function jsonSerialize()
    {
        return array_merge([
            'type' => $this->type
        ], parent::jsonSerialize());
    }
}
