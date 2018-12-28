<?php
/**
 * Created by PhpStorm.
 * User: hook0
 * Date: 2018-11-07
 * Time: 14:50
 */

namespace App\Supports;


use App\Models\HomeInterface;
use App\Models\HomeWidget;
use App\Repositories\Passport;
use App\Repositories\Rank;
use App\Repositories\Rep;
use App\Services\AuthenticateService;

class UserPrefs {

    const FIELD = '__USER__';

    /**
     * @param array $rep
     */
    public static function setRep(array $rep) {
        if (is_array($rep)) {
            foreach ($rep as $k => $v) {
                self::set($k, $v);
            }
        }
    }

    /**
     * @param string $key
     * @param mixed  $val
     */
    public static function set(string $key, $val) {
        $_SESSION[self::FIELD][$key] = $val;
    }

    /**
     * clear user session
     */
    public static function clear() {
        if (isset($_SESSION[self::FIELD])) {
            unset($_SESSION[self::FIELD]);
            session_unset();
        }
    }

    /**
     * @return bool
     */
    public static function isLogin() {
        return isset($_SESSION[self::FIELD]);
    }

    /**
     * @param string $key
     * @param mixed  $deft
     * @return mixed
     */
    public static function get(string $key = '', $deft = null) {
        if (trim($key)) {
            return isset($_SESSION[self::FIELD][$key]) ? $_SESSION[self::FIELD][$key] : $deft;
        } else {
            return isset($_SESSION[self::FIELD]) ? $_SESSION[self::FIELD] : $deft;
        }
    }

    /**
     * @return int
     */
    public static function getID() {
        return self::get('id');
    }

    /**
     * @return string
     */
    public static function getNumber() {
        return self::get('number');
    }

    /**
     * @return string
     */
    public static function getCountry() {
        return self::get('country');
    }

    /**
     * @return string
     */
    public static function country() {
        return strtolower(self::get('country'));
    }

    /**
     * @param Passport $pass
     */
    public static function setPassport(Passport $pass) {
        self::set('passport', $pass->getAttrs());
    }

    /**
     * @return Passport
     */
    public static function getPassport() {
        return (new Passport())->transfer(self::get('passport'));
    }

    /**
     * @return int
     */
    public static function level() {
        if (self::get('cancelled')) {
            return Rank::IBO;
        }
        return self::get('lifetime_rank_id');
    }

    /**
     * @return array
     */
    public static function pass() {
        $pass = Passport::make(self::get('passport'));
        if ($pass->expired()) {
            $svc = AuthenticateService::refresh($pass->passport, $pass->number);
            if ($svc->succeed()) {
                /** @var Passport $pass */
                $pass = $svc->result(Passport::class);
                if ($pass) {
                    UserPrefs::setPassport($pass);
                }
            }
        }
        $data = [
            'X-Passport'          => $pass->passport,
            'X-Passport-Identity' => $pass->number,
            'X-Passport-Country'  => $pass->country
        ];
        return $data;
    }

    /**
     * @return HomeInterface[]
     */
    public static function getInterfaces() {
        /** @var HomeInterface[] $interfaces */
        $interfaces = HomeInterface::where('user_id', UserPrefs::getID())->orderBy('sorting', 'asc')->get();
        if (!count($interfaces)) {
            /** @var HomeWidget[] $widgets */
            $widgets = HomeWidget::where('active', 1)->orderBy('sorting', 'asc')->get();
            foreach ($widgets as $k => $widget) {
                $interface            = new HomeInterface();
                $interface->user_id   = UserPrefs::getID();
                $interface->widget_id = $widget->id;
                $interface->enable    = 1;
                $interface->sorting   = $k;
                $interface->save();
                $interfaces[] = $interface;
            }
        }
        return $interfaces;
    }

}