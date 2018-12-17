<?php
/**
 * Created by PhpStorm.
 * User: hyeokchoi
 * Date: 14/12/2018
 * Time: 3:39 PM
 */

namespace App\Services;


use App\Supports\UserPrefs;

class FaqService extends Service
{
    public static function getFaq()
    {
       return Service::make(UserPrefs::pass())->get("/v1/vbo/faqs");
    }
}