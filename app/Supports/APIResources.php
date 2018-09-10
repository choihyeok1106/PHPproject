<?php
/**
 * Created by PhpStorm.
 * User: yoonpooh
 * Date: 2018. 6. 19.
 * Time: PM 5:54
 */

namespace App\Supports;


class APIResources
{
    const BASE_URL = 'https://dev-core.puremeka.com/v1';

    // METHOD
    const GET = 'GET';
    const POST = 'POST';
    const PUT = 'PUT';
    const PATCH = 'PATCH';
    const DELETE = 'DELETE';

    // Items
    const GET_ITEM_CATEGORIES = '/items/categories';
    const GET_ITEMS = '/items';
    const GET_ITEM = '/items/{0}';
    const GET_ITEMS_LEGENDS = '/items/legends';
    const GET_TEST = "/test";
    const GET_TRANSLATES = "/items/{0}/translate";
    const GET_COUNTRIES = "/items/{0}/countries";
    const GET_PRICES = "/items/{0}/prices";
    const GET_PACKAGES = "/items/{0}/packages";

    // Reps
    const GET_REPS_UPLINES = "/reps/{0}/uplines";
    const GET_REP = "/reps/{0}";


    /**
     * @param $url
     * @param $replaces
     * @return null|string|string[]
     */
    public static function format($url, $replaces)
    {
        if (is_array($replaces)) {
            for ($i = 0; $i < count($replaces); $i++) {
                $url = preg_replace('/\{' . $i . '\}/', $replaces[$i], $url);
            }
        } else {
            if (is_string($replaces)) {
                    $url = preg_replace('/\{0\}/', $replaces, $url);
            }
        }

        return $url;
    }
}