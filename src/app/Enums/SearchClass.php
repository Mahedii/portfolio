<?php

namespace App\Enums;

enum SearchClass : string
{
    case SearchFirst = "F";
    case SerchEconomy = "Y";
    case SearchBusiness = "C";
    case SearchPremiumEconomy = "W";

    /**
     * Search set Class
     *
     * @return string
     */
    public function getSeatClass(): string
    {
        return match ($this) {
            self::SerchEconomy => "ECO",
            self::SearchPremiumEconomy => "PRE",
            self::SearchBusiness => "BUS",
            self::SearchFirst => "FIR"
        };
    }
}
