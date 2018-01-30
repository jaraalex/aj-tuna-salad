<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class ApiUser extends Eloquent
{
    protected $collection = 'users_collection';
}
