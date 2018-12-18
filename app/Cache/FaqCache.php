<?php
/**
 * Created by PhpStorm.
 * User: hyeokchoi
 * Date: 17/12/2018
 * Time: 10:23 AM
 */

namespace App\Cache;


use App\Services\FaqService;
use App\Supports\UserPrefs;

class FaqCache
{
    public static function getFaq(){
        $key = UserPrefs::getCountryLow().":faqs";
        $faqs = Cache::get($key);
        if(!$faqs){
            $service = FaqService::getFaq();
            if($service->succeed()){
                $faqs = $service->result();
                Cache::set($key,$faqs);
            }
        }
        return $faqs;
    }
}