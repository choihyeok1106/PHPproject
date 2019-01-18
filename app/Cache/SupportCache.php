<?php
/**
 * Created by PhpStorm.
 * User: hyeokchoi
 * Date: 17/12/2018
 * Time: 10:23 AM
 */

namespace App\Cache;


use App\Services\FaqService;
use App\Services\SupportService;
use App\Supports\UserPrefs;

class SupportCache
{
    public static function getFaq(){
        $key = Cache::key('item:');
        $faqs = Cache::get($key);
        if(!$faqs){
            $service = SupportService::getFaq();
            return Cache::set($key,$service->response());
        }
        return $faqs;
    }

    public static function getCompany(){
        $key = Cache::key('items:');
        $faqs = Cache::get($key);
        if(!$faqs){
            $service = SupportService::getCompany();
            return Cache::set($key,$service->response());
        }
        return $faqs;
    }
}