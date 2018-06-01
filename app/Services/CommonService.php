<?php

namespace App\Services;

class CommonService
{
    public static function formatShortDate($date)
    {
        return date('Y-m-d', strtotime($date));
    }

    public static function formatLongDate($date)
    {
        return date('Y-m-d H:i:s', strtotime($date));
    }

    public static function formatInteger($number)
    {
        return number_format($number, 0, ',', '.');
    }

    public static function correctSearchKeyword($keyword)
    {
        $keyword = str_replace(' ', '%', $keyword);
        return "%$keyword%";
    }

    public static function queryStringUrl($path = null, $qs = array(), $secure = null)
    {
        $url = app('url')->to($path, $secure);
        if (count($qs)){

            foreach($qs as $key => $value){
                $qs[$key] = sprintf('%s=%s',$key, urlencode($value));
            }
            $url = sprintf('%s?%s', $url, implode('&', $qs));
        }
        return $url;
    }

    public static function formatBirthday($date)
    {
        return date('d-m-Y', strtotime($date));
    }

    public static function getYear($date)
    {
        return date('Y',strtotime($date));
    }


    public static function roundScore($value){
        return number_format($value,1,'.', '');
    }
}