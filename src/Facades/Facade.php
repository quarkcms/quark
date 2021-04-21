<?php

namespace QuarkCMS\Quark\Facades;

use RuntimeException;

class Facade
{
    /**
     * 注册组件类
     *
     * @var array
     */
    protected static $registerComponents = [
        'page' => \QuarkCMS\Quark\Component\Layout\Page::class,
        'pageContainer' => \QuarkCMS\Quark\Component\Layout\PageContainer::class,
        'layout' => \QuarkCMS\Quark\Component\Layout\Layout::class,
        'row' => \QuarkCMS\Quark\Component\Grid\Row::class,
        'col' => \QuarkCMS\Quark\Component\Grid\Col::class,
        'card' => \QuarkCMS\Quark\Component\Card\Card::class,
        'statistic' => \QuarkCMS\Quark\Component\Statistic\Statistic::class,
        'statisticCard' => \QuarkCMS\Quark\Component\Statistic\StatisticCard::class,
        'login' => \QuarkCMS\Quark\Component\Login\Login::class,
    ];

    /**
     * 组件实例树
     *
     * @var array
     */
    protected static $componentInstance;

    /**
     * 设置组件实例
     *
     * @param  object|string  $name
     * @return mixed
     */
    public static function setComponentInstance($className)
    {
        if(!class_exists(static::$registerComponents[$className])) {
            throw new \RuntimeException("Class { $className } does not exist.");
        }

        return static::$componentInstance[$className] = new static::$registerComponents[$className]();
    }

    /**
     * 获取组件实例
     *
     * @return mixed
     */
    public static function getComponentInstance()
    {
        $className = static::getFacadeClass();

        if(isset(static::$componentInstance[$className])) {
            $instance = static::$componentInstance[$className];
        } else {
            $instance = static::setComponentInstance($className);
        }

        return $instance;
    }

    /**
     * Handle dynamic, static calls to the object.
     *
     * @param  string  $method
     * @param  array  $args
     * @return mixed
     *
     * @throws \RuntimeException
     */
    public static function __callStatic($method, $args)
    {
        $instance = static::getComponentInstance();

        if (! $instance) {
            throw new RuntimeException('A facade root has not been set.');
        }

        return $instance->$method(...$args);
    }
}
