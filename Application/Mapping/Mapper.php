<?php

class Mapper
{

    public static function map($base, $dto)
    {

        $array_base = (array) $dto;

        foreach ($array_base as $key => $value) {
            try {
                $key = trim(str_replace(get_class($base), "", $key));
                $key_method = ucfirst($key);

                $dto->{"$key"} = $base->{"get{$key_method}"}();
            } catch (\Throwable $th) {
            }
        }

        return $dto;
    }

    public static function mapArray($array, $base)
    {
        if(!is_array($array))
            return false;

        foreach ($array as $key => $value) {
            try {
                $key_method = ucfirst($key);
                $base->{"set$key"}($value);
            } catch (\Throwable $th) {
            }
        }

        return $base;
    }
}