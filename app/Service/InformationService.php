<?php
/**
 * Created by PhpStorm.
 * User: hyeokchoi
 * Date: 2018. 9. 13.
 * Time: PM 12:16
 */

namespace App\Services;

use App\Service\Service;
use App\Supports\APIResources;
use Illuminate\Support\Facades\Cache;

class InformationService extends Service
{
    /**
     * @return array|mixed
     */
    public function getLocales()
    {
        $cache_key = 'locales_' . __METHOD__;
        $cached = Cache::get($cache_key);

        if ($cached == null) {
            $this->url = APIResources::GET_LOCALES;
            $result = $this->get();
            $countries = $this->repository->convert($result->response['items'], 'Locale');
            Cache::put($cache_key, $countries, 1440);
        } else
            $countries = $cached;

        return $countries;
    }

    /**
     * @return array|mixed
     */
    public function getCountries()
    {
        $cache_key = 'countries_' . __METHOD__;
        $cached = Cache::get($cache_key);

        if ($cached == null) {
            $this->url = APIResources::GET_COUNTRIES;
            $result = $this->get();
            $countries = $this->repository->convert($result->response['items'], 'Country');
            Cache::put($cache_key, $countries, 1440);
        } else
            $countries = $cached;

        return $countries;
    }

    /**
     * @return array|mixed
     */
    public function getCurrencies()
    {
        $cache_key = 'currencies_' . __METHOD__;
        $cached = Cache::get($cache_key);

        if ($cached == null) {
            $this->url = APIResources::GET_CURRENCIES;
            $result = $this->get();
            $currencies = $this->repository->convert($result->response['items'], 'Currency');
            Cache::put($cache_key, $currencies, 1440);
        } else
            $currencies = $cached;

        return $currencies;
    }

    /**
     * @return array|mixed
     */
    public function getRepTypes()
    {
        $cache_key = 'rep_types_' . __METHOD__;
        $cached = Cache::get($cache_key);

        if ($cached == null) {
            $this->url = APIResources::GET_REP_TYPES;
            $result = $this->get();
            $rep_types = $this->repository->convert($result->response['items'], 'RepType');
            Cache::put($cache_key, $rep_types, 1440);
        } else
            $rep_types = $cached;

        return $rep_types;
    }

    /**
     * @return array|mixed
     */
    public function getRanks()
    {
        $cache_key = 'ranks_' . __METHOD__;
        $cached = Cache::get($cache_key);

        if ($cached == null) {
            $this->url = APIResources::GET_REP_RANKS;
            $result = $this->get();
            $ranks = $this->repository->convert($result->response['items'], 'Rank');
            Cache::put($cache_key, $ranks, 1440);
        } else
            $ranks = $cached;

        return $ranks;
    }

    public function getWarehouses()
    {
        $cache_key = 'warehouses_' . __METHOD__;
        $cached = Cache::get($cache_key);

        if ($cached == null) {
            $this->url = APIResources::GET_WAREHOUSES;
            $result = $this->get();
            $warehouses = $this->repository->convert($result->response['items'], 'Warehouse');
            Cache::put($cache_key, $warehouses, 1440);
        } else
            $warehouses = $cached;
        return $warehouses;
    }

    public function getMarkets()
    {
        $cache_key = 'warehouses_' . __METHOD__;
        $cached = Cache::get($cache_key);

        if ($cached == null) {
            $this->url = APIResources::GET_MARKETS;
            $result = $this->get();
            $markets = $this->repository->convert($result->response['items'], 'Market');
            Cache::put($cache_key, $markets, 1440);
        } else
            $markets = $cached;
        return $markets;
    }

}