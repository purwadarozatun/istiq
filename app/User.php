<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Laravolt\Epicentrum\Models\User as BaseUser;

class User extends BaseUser
{
    use Notifiable;
}
