<?php

namespace App\Helpers;

class CustomIdGenerator
{
    public function generate()
    {

        $second = rand(1000, 9999);
        $third = rand(1000, 9999);
        return "CC-{$second}-{$third}";
    }
}
