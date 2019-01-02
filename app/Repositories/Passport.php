<?php
/**
 * Author: R.j
 * Date: 2018-12-12 09:50
 * File: Passport.php
 */

namespace App\Repositories;


/**
 * @property mixed id
 * @property mixed type
 * @property mixed number
 * @property mixed country
 * @property mixed passport
 * @property mixed issued_at
 * @property mixed expires_at
 */
class Passport extends RepositoryAbstract {

    /**
     * @return bool
     */
    public function expired() {
        return time() > strtotime($this->expires_at);
    }

}