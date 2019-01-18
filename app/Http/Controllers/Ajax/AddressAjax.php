<?php
/**
 * Author: R.j
 * Date: 2019-01-14 17:34
 * File: AddressAjax.php
 */

namespace App\Http\Controllers\Ajax;


use App\Cache\AddressCache;
use App\Constants\AddressType;
use App\Repositories\Collections\AddressCollection;

class AddressAjax extends AjaxController {

    public function index() {
        $type    = $this->int('type');
        $data    = AddressCache::addresses(0);
        $collect = AddressCollection::new($data);
        return $this->ok($collect->items($type));
    }

    public function default() {
        $type    = $this->int('type', 1, 1, 2);
        $data    = AddressCache::addresses(0);
        $collect = AddressCollection::new($data);
        return $this->ok($collect->default($type));
    }

}