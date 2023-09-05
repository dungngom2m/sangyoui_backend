<?php

namespace App\Helpers;

class CommonHelper
{
    static function  formatDatetime($strDatetime)
    {
        return str_replace('T', ' ', str_replace('.000000Z', '', $strDatetime));
    }

    static function  formatDate($strDatetime)
    {
        return str_replace(' 00:00:00', '', CommonHelper::formatDatetime($strDatetime));
    }
}
