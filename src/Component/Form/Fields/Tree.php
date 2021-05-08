<?php

namespace QuarkCMS\Quark\Component\Form\Fields;

use QuarkCMS\Quark\Component\Form\Fields\Item;
use Exception;

class Tree extends Item
{
    /**
     * 配置树形组件数据
     *
     * @var string
     */
    public  $treeData;
    
    /**
     * 初始化Tree组件
     *
     * @param  string  $name
     * @param  string  $label
     * @return void
     */
    public function __construct($name,$label = '') {
        $this->type = 'tree';
        $this->name = $name;

        if(empty($label) || !count($label)) {
            $this->label = $name;
        } else {
            $this->label = $label[0];
        }
    }

    /**
     * 设置树形组件数据
     *
     * @param  array $treeData
     * @return $this
     */
    public function data($treeData)
    {
        $this->treeData = $treeData;
        return $this;
    }

    /**
     * 组件json序列化
     *
     * @return array
     */
    public function jsonSerialize()
    {
        return array_merge([
            'treeData' => $this->treeData
        ], parent::jsonSerialize());
    }
}
