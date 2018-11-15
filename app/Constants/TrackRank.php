<?php
/**
 * Created by PhpStorm.
 * User: hook0
 * Date: 2018-11-12
 * Time: 18:39
 */

namespace App\Constants;

/**
 * @property mixed id
 * @property mixed name
 * @property mixed abbreviation
 * @property mixed ltv
 * @property mixed stv
 */
class TrackRank {

    const IBO   = 100;
    const BRNZ  = 110;
    const SILV  = 120;
    const GOLD  = 130;
    const PLAT  = 140;
    const SAP   = 150;
    const RUBY  = 160;
    const EMER  = 170;
    const DMD   = 180;
    const BDMD  = 190;
    const PRES  = 200;
    const CHRM  = 210;
    const AMB   = 220;
    const CRDMD = 230;

    /**
     * @return TrackRank[]
     */
    public static function ranks() {
        $ranks = [];

        $rank               = new TrackRank();
        $rank->id           = self::IBO;
        $rank->name         = 'IBO';
        $rank->abbreviation = 'IBO';
        $rank->ltv          = 0;
        $rank->stv          = 0;
        $ranks[]            = $rank;

        $rank               = new TrackRank();
        $rank->id           = self::BRNZ;
        $rank->name         = 'Bronze Director';
        $rank->abbreviation = 'BRNZ';
        $rank->ltv          = 500;
        $rank->stv          = 0;
        $ranks[]            = $rank;

        $rank               = new TrackRank();
        $rank->id           = self::SILV;
        $rank->name         = 'Silver Director';
        $rank->abbreviation = 'SILV';
        $rank->ltv          = 1500;
        $rank->stv          = 2000;
        $ranks[]            = $rank;

        $rank               = new TrackRank();
        $rank->id           = self::GOLD;
        $rank->name         = 'Gold Director';
        $rank->abbreviation = 'GOLD';
        $rank->ltv          = 3000;
        $rank->stv          = 4000;
        $ranks[]            = $rank;

        $rank               = new TrackRank();
        $rank->id           = self::PLAT;
        $rank->name         = 'Platinum Director';
        $rank->abbreviation = 'PLAT';
        $rank->ltv          = 5000;
        $rank->stv          = 7000;
        $ranks[]            = $rank;

        $rank               = new TrackRank();
        $rank->id           = self::SAP;
        $rank->name         = 'Sapphire Executive';
        $rank->abbreviation = 'SAP';
        $rank->ltv          = 7500;
        $rank->stv          = 10500;
        $ranks[]            = $rank;

        $rank               = new TrackRank();
        $rank->id           = self::RUBY;
        $rank->name         = 'Ruby Executive';
        $rank->abbreviation = 'RUBY';
        $rank->ltv          = 10000;
        $rank->stv          = 15000;
        $ranks[]            = $rank;

        $rank               = new TrackRank();
        $rank->id           = self::EMER;
        $rank->name         = 'Emerald Executive';
        $rank->abbreviation = 'EMER';
        $rank->ltv          = 15000;
        $rank->stv          = 20000;
        $ranks[]            = $rank;

        $rank               = new TrackRank();
        $rank->id           = self::DMD;
        $rank->name         = 'Diamond';
        $rank->abbreviation = 'DMD';
        $rank->ltv          = 20000;
        $rank->stv          = 35000;
        $ranks[]            = $rank;

        $rank               = new TrackRank();
        $rank->id           = self::BDMD;
        $rank->name         = 'Blue Diamond';
        $rank->abbreviation = 'BDMD';
        $rank->ltv          = 30000;
        $rank->stv          = 50000;
        $ranks[]            = $rank;

        $rank               = new TrackRank();
        $rank->id           = self::PRES;
        $rank->name         = 'Presidential';
        $rank->abbreviation = 'PRES';
        $rank->ltv          = 30000;
        $rank->stv          = 75000;
        $ranks[]            = $rank;

        $rank               = new TrackRank();
        $rank->id           = self::CHRM;
        $rank->name         = 'Chairman';
        $rank->abbreviation = 'CHRM';
        $rank->ltv          = 30000;
        $rank->stv          = 150000;
        $ranks[]            = $rank;

        $rank               = new TrackRank();
        $rank->id           = self::AMB;
        $rank->name         = 'Ambassador';
        $rank->abbreviation = 'AMB';
        $rank->ltv          = 30000;
        $rank->stv          = 300000;
        $ranks[]            = $rank;

        $rank               = new TrackRank();
        $rank->id           = self::CRDMD;
        $rank->name         = 'Crown Diamond';
        $rank->abbreviation = 'CRDMD';
        $rank->ltv          = 30000;
        $rank->stv          = 500000;
        $ranks[]            = $rank;

        return $ranks;
    }

}