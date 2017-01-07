<?php
return [
    'layout'       => 'ui::layouts.plain_centered',
    'services'     => [],
    'captcha'      => false,
    'registration' => [
        'enable' => true,
        'status' => 'ACTIVE'
    ],
    'activation'   => [
        'enable'        => true,
        'status_before' => 'PENDING',
        'status_after'  => 'ACTIVE',
    ],
    'router'       => [
        'middleware' => ['web'],
        'prefix'     => 'auth',
    ],
    'redirect'    => [
        'after_login' => 'admin/dashboard',
    ],
];
