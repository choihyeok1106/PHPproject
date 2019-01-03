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
use App\Services\AuthenticateService;
use Mockery\Generator\StringManipulation\Pass\Pass;

class UserPrefs {

    const USER = '__USER__';
    const PASS = '__PASS__';

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
        $_SESSION[self::USER][$key] = $val;
    }

    /**
     * clear user session
     */
    public static function clear() {
        if (isset($_SESSION[self::USER])) {
            unset($_SESSION[self::USER]);
        }
        if (isset($_SESSION[self::PASS])) {
            unset($_SESSION[self::PASS]);
        }
        session_unset();
    }

    /**
     * @return bool
     */
    public static function login() {
        return isset($_SESSION[self::USER]);
    }

    /**
     * @param string $key
     * @param mixed  $deft
     * @return mixed
     */
    public static function get(string $key = '', $deft = null) {
        if (trim($key)) {
            return isset($_SESSION[self::USER][$key]) ? $_SESSION[self::USER][$key] : $deft;
        } else {
            return isset($_SESSION[self::USER]) ? $_SESSION[self::USER] : $deft;
        }
    }

    /**
     * @param string $key
     * @param int    $deft
     * @return int
     */
    public static function int(string $key, $deft = 0) {
        $val = self::get($key);
        return is_numeric($val) ? intval($val) : $deft;
    }

    /**
     * @return int
     */
    public static function id() {
        return self::get('id');
    }

    /**
     * @return string
     */
    public static function number() {
        return self::get('number');
    }

    /**
     * @return string
     */
    public static function country() {
        return self::get('country');
    }

    /**
     * @param Passport $pass
     */
    public static function setPassport(Passport $pass) {
        $_SESSION[self::PASS] = $pass->vars();
    }

    /**
     * @return Passport
     */
    public static function getPassport() {
        return isset($_SESSION[self::PASS]) ? Passport::Item($_SESSION[self::PASS], false) : null;
    }

    /**
     * @return int
     */
    public static function level() {
        if (self::get('cancelled')) {
            return Rank::IBO;
        }
        $lifetime_rank = self::int('lifetime_rank_id');
        $force_rank_id = self::int('force_rank_id');
        return $force_rank_id > $lifetime_rank ? $force_rank_id : $lifetime_rank;
    }

    /**
     * @return array
     */
    public static function pass() {
        $pass = self::getPassport();
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
    public static function homeInterfaces() {
        /** @var HomeInterface[] $interfaces */
        $interfaces = HomeInterface::where('user_id', UserPrefs::id())->orderBy('sorting', 'asc')->get();
        if (!count($interfaces)) {
            /** @var HomeWidget[] $widgets */
            $widgets = HomeWidget::where('active', 1)->orderBy('sorting', 'asc')->get();
            foreach ($widgets as $k => $widget) {
                $interface            = new HomeInterface();
                $interface->user_id   = UserPrefs::id();
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