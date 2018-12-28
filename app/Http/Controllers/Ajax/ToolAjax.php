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

class ToolAjax extends Controller
{
    use Ajax;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function libraries(Request $request)
    {
        if ($request->ajax()) {
            $getLibrary = ToolCache::getLibrary();
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

    public function sortLibraries($data)
    {
        $tmp = [];
        foreach ($data as $key => $value) {
            if($key == 'data'){
                foreach($value as $v){
                    $tmp[$v['category']][] = $v;
                }
            }
        }
        return $tmp;
    }
}