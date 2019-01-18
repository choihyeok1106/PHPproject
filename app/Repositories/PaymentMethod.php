<?php
/**
 * Author: R.j
 * Date: 2019-01-17 12:12
 * File: PaymentMethod.php
 */

namespace App\Repositories;


/**
 * @property null name
 * @property null explanation
 * @property null processor
 */
class PaymentMethod extends RepositoryAbstract {

    /**
     * @return PaymentMethod
     */
    public function transform() {
        $this->id          = $this->get('id');
        $this->name        = $this->get('name');
        $this->explanation = $this->get('explanation');
        $this->processor   = $this->get('processor');
        return $this;
    }

    public function js() {
        if (isdev()) {
            $js = "/js/payments/{$this->processor}.js";
        } else {
            $js = "/js/payments/{$this->processor}.min.js";
        }
        $file = public_path(str_replace('/', DIRECTORY_SEPARATOR, $js));
        if (file_exists($file)) {
            return '<script src="' . js($js) . '" type="text/javascript"></script>';
        }
        return "";
    }

}