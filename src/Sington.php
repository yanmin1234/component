<?php
/**
 * Created by PhpStorm.
 * User: ym
 * Date: 2020/5/13
 * Time: 下午3:56
 */

namespace Ymt\Component;


trait Sington
{
    private static $instance;

    static function getInstance(...$args)
    {
        if(!isset(self::$instance)){
            self::$instance = new static(...$args);
        }
        return self::$instance;
    }
}