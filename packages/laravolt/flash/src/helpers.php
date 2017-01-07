<?php

if (!function_exists('flash')) {
    function flash()
    {
        $args = func_get_args();

        if (count($args) > 0 && is_string($args[0])) {
            return app()->make('laravolt.flash')->message($args[0]);
        }

        return app()->make('laravolt.flash');
    }
}
