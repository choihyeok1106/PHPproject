<?php
/**
 * Created by PhpStorm.
 * User: hook0
 * Date: 2018-11-09
 * Time: 14:31
 */

namespace App\Constants;

/**
 * @property mixed id
 * @property mixed name
 * @property mixed checked
 */
class HomeWidget {

    const BANNER    = 'banner';
    const SUMMARY   = 'summary';
    const NEWS      = 'news';
    const ALERT     = 'alert';
    const TRACKER   = 'tracker';
    const CALENDAR  = 'calendar';
    const ACTIVITY  = 'activity';
    const COMMUNITY = 'community';

    public static $list = [
        self::BANNER,
        self::SUMMARY,
        self::NEWS,
        self::ALERT,
        self::TRACKER,
        self::CALENDAR,
        //        self::ACTIVITY,
        //        self::COMMUNITY,
    ];

    public static $names = [
        self::BANNER    => 'Banner',
        self::SUMMARY   => 'Business Summary',
        self::NEWS      => 'News feed',
        self::ALERT     => 'Team Smart Alerts',
        self::TRACKER   => 'Rank Tracker',
        self::CALENDAR  => 'Calendar',
        self::ACTIVITY  => 'Activities',
        self::COMMUNITY => 'PURE Community',
    ];

    /**
     * @param string $widget
     * @return string
     */
    public static function getName($widget) {
        return array_key_exists($widget, self::$names) ? self::$names[$widget] : ucfirst($widget);
    }

    /**
     * @param string $widget
     * @return bool
     */
    public static function show($widget) {
        return $widget && in_array($widget, self::$list);
    }

}