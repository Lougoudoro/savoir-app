<?php

namespace App\Helpers;

class UtilsHelper
{
    public static function uriOf(string $name): string
    {
        return sprintf('%s/ontology#%s', url('/'), $name);
    }
}
