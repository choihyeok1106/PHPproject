<?php

namespace App\Repositories;

class Rep implements IRepository
{
    /**
     * @param $unit array
     * @return mixed
     */
    public function transfer($unit)
    {
        // TODO: Implement transfer() method.
        foreach ($unit as $key => $value) {
            switch ($key) {
                case 'rep_type':
                    $rep_type = new RepType();
                    $rep_type->transfer($value);
                    $this->rep_type = $rep_type;
                    break;
                case 'country':
                    $country = new Country();
                    $country->transfer($value);
                    $this->country = $country;
                    break;
                case 'market':
                    $market = new Market();
                    $market->transfer($value);
                    $this->market = $market;
                    break;
                case 'default_locale':
                    $locale = new Locale();
                    $locale->transfer($value);
                    $this->default_locale = $locale;
                    break;
                case 'phones':
                    $phones = new Phones();
                    $phones->transfer($value);
                    $this->phones = $phones;
                    break;
                case 'ranks':
                    $this->ranks = new Rank();
                    foreach ($value as $_key => $_value) {
                        $rank = new Rank();
                        $rank->transfer($_value);
                        $this->ranks->$_key = $rank;
                    }
                    break;
                default:
                    $this->$key = $value;
                    break;
            }
        }
        return $this;
    }

    public function full_name()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}