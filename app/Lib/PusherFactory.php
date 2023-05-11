<?php

namespace App\Lib;


use Pusher\Pusher;

class PusherFactory
{
    public static function make()
    {
        return new Pusher(
            "b3a5bb43805312147287", // public key
            "b3a5bb43805312147287", // Secret
            "1594941", // App_id
            array(
                'cluster' => "eu", // Cluster
                'encrypted' => true,
            )
        );
    }
}
