<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class ApiToken extends Eloquent
{
    protected $collection = 'api_tokens';
}
