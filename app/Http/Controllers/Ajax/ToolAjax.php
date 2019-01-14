<?php
/**
 * Author: hyeokchoi
 * Date: 21/12/2018 5:11 PM
 * File: ToolAjax.php
 */

namespace App\Http\Controllers\Ajax;


use App\Cache\ToolCache;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ToolAjax extends AjaxController
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function libraries(Request $request)
    {
        if ($request->ajax()) {
            $search = $request->search;
            if ($search == "") {
                $search = "";
            }
            $getLibrary = ToolCache::getLibrary($request->category, $search, $request->limit);
            $libraries = $this->sortLibraries($getLibrary);
            return $this->ok($libraries);
        }
        return $this->badRequest();
    }

    public function categories(Request $request)
    {
        if ($request->ajax()) {
            $categories = ToolCache::getCategory();
            return $this->ok($categories);
        }
        return $this->badRequest();
    }

    public function sortLibraries($arr)
    {

        $data = [];
        $meta = [];
        foreach ($arr as $key => $value) {
            if ($key == 'data') {
                foreach ($value as $v) {
                    $data[$v['category']][] = $v;
                }
            } else if ($key == 'meta') {
                foreach ($value as $v){
                    $meta['pagination']=$v;
                }
            }
        }
        $result = array('data' => $data,
            'meta' => $meta);
        return $result;
    }
}