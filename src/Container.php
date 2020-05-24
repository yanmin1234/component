<?php
/**
 * Created by PhpStorm.
 * User: ym
 * Date: 2020/5/13
 * Time: 下午12:41
 */

namespace Ymt\Component;


class Container
{
    use Sington;

    private $container = [];
    private $allowKeys = null;

    function __construct(array $allowKeys = null)
    {
        $this->allowKeys = $allowKeys;
    }

    function add($key,$item)
    {
        if(is_array($this->allowKeys) && !in_array($key,$this->allowKeys)){
            return false;
        }
        $this->container[$key][] = $item;
        return $this;
    }

    function set($key,$item)
    {
        if(is_array($this->allowKeys) && !in_array($key,$this->allowKeys)){
            return false;
        }
        $this->container[$key] = [$item];
        return $this;
    }

    function delete($key,$key2 = false)
    {
        if($key2 !== false){
            if(isset($this->container[$key][$key2])){
                unset($this->container[$key][$key2]);
            }
        }else{
            if(isset($this->container[$key])){
                unset($this->container[$key]);
            }
        }
    
        return $this;
    }

    function get($key):?array
    {
        if(isset($this->container[$key])){
            return $this->container[$key];
        }else{
            return null;
        }
    }

    function all():array
    {
        return $this->container;
    }

    function clear()
    {
        $this->container = [];
    }
}