<?php
/**
 * Created by PhpStorm.
 * User: hook0
 * Date: 2018-11-22
 * Time: 14:59
 */

namespace App\Demos;


use App\Repositories\Content;

class HomeData {

    public static function getNews() {
        $news = [];
        for ($i = 0; $i < 5; $i++) {
            $c = new Content();

            $c->id         = $i;
            $c->title      = "Sales Support Holiday Hours {$i}";
            $c->image      = 'https://gplivepurecomsite.files.wordpress.com/2018/07/bahamas_whattopack_7_27_18.jpg';
            $c->created_at = date('Y-m-d H:i');
            $c->text       =
                "PURE family, just a reminder with the holiday coming up we have specific holiday hours. We wish you a great Labor Day weekend!";

            $news[] = $c;
        }
        return $news;
    }

}