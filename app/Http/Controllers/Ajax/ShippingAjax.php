<?php
/**
 * Author: R.j
 * Date: 2019-01-14 20:08
 * File: ShippingAjax.php
 */

namespace App\Http\Controllers\Ajax;


class ShippingAjax extends AjaxController {

    public function methods(){
        return $this->ok($_POST);
    }

}