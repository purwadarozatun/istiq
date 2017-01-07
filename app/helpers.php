<?php

if (!function_exists('avatar')) {
    function avatar($subject)
    {
        return Laravolt\Avatar\Facade::create($subject)->toBase64();
    }
}
