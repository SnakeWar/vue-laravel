<?php

/**
 *
 *  General functions
 *
 */

use Carbon\Carbon;

Carbon::setLocale('pt_BR');

class Helper
{

    public function convertDateToSite($data)
    {
        return (Carbon::createFromFormat('d/m/Y H:i:s', $data)->format('Y-m-d H:i:s'));
    }

    public function convertdata_tosite($data, $time = TRUE)
    {
//        return (Carbon::parse($data)->format('d/m/Y' . ($time ? ' H:i:s' : '')));
        return (Carbon::parse($data)->format('d/m/Y' . ($time ? ' H:i:s' : '')));
    }
    public function convertDateToSite2($data, $time = false)
    {
//        return (Carbon::parse($data)->format('d/m/Y' . ($time ? ' H:i:s' : '')));
        return (Carbon::parse($data)->format('Y/m/d' . ($time ? ' H:i:s' : '')));
    }

}
