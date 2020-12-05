<?php


namespace App\Services;


class Responser
{
    public static function success($message = null)
    {
        return [
            'data'  =>  !is_null($message) ? $message : '',
            'message'   =>  'درخواست شما انجام شد'
        ];
    }

    public static function error($message = null)
    {
        return [
            'data'  =>  !is_null($message) ? $message : '',
            'message'   =>  'درخواست شما به شکست مواجه شد'
        ];
    }
}
