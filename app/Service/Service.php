<?php
/**
 * Created by PhpStorm.
 * User: hyeokchoi
 * Date: 2018. 8. 16.
 * Time: PM 3:11
 */

namespace App\Service;

use App\Repositories\Repository;
use App\Supports\RestClient;

class Service extends RestClient
{
    public $repository;

    public function __construct()
    {
        $this->repository = new Repository();
    }
}