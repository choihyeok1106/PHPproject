<?php
/**
 * Author: hyeokchoi
 * Date: 21/12/2018 5:34 PM
 * File: ToolCache.php
 */

namespace App\Cache;

use App\Services\ToolService;

class ToolCache
{
    public static function getLibrary($category,$search,$limit){
        $key        = Cache::key(':items');
        $libraries = Cache::get($key);
        if(!$libraries){
            $service = ToolService::getLibrary($category,$search,$limit);
            return Cache::set($key,$service->response());
        }
        return $libraries;
    }

    public static function getCategory(){
        $key        = Cache::key(':items');
        $categories = Cache::get($key);
        if(!$categories){
            $service = ToolService::getCategories();
            return Cache::set($key,$service->response());
        }
    }
}