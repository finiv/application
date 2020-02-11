<?php

namespace App\Enum;

use Illuminate\Support\Collection;

class Enum
{
    /**
     * @return Collection
     */
    public static function list()
    {
        try{
            $reflection = new \ReflectionClass(static::class);
        }catch(\Exception $exception){
            $reflection = null;
        }
        return collect($reflection->getConstants());
    }

    /**
     * @return Collection
     */
    public static function values()
    {
        return self::list()->values();
    }

    /**
     * @return Collection
     */
    public static function keys()
    {
        return self::list()->keys();
    }

    /**
     * @param $key
     * @return bool
     */
    public static function exist($key)
    {
        return self::list()->contains($key);
    }

    /**
     * @param $value
     * @return string
     */
    public static function getKey($value)
    {
        return strtolower((string) self::list()->search($value));
    }

    /**
     * @param $key
     * @return mixed
     */
    public static function getValue($key)
    {
        return self::list()->get(strtoupper($key));
    }

    /**
     * @param string $separator
     * @return string
     */
    public static function toString(string $separator = ',')
    {
        return implode($separator, self::values()->toArray());
    }
}
