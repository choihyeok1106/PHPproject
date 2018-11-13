<?php
/**
 * Created by PhpStorm.
 * User: hook0
 * Date: 2018-11-09
 * Time: 14:31
 */

namespace App\Constants;


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
        self::ACTIVITY,
        self::COMMUNITY,
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

}