<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const ARCHIVE_ADMIN_ROLE_ID = '1';
    const HALL_ADMIN_ROLE_ID = '2';
    const USER_ROLE_ID = '3';

    protected $table = 'roles';
}
