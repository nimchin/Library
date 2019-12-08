<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const ARCHIVE_ADMIN_ROLE_ID = 2;
    const HALL_ADMIN_ROLE_ID = 1;
    const USER_ROLE_ID = 3;

    protected $table = 'roles';

    /**
     * @param $id
     * @return array|\Illuminate\Contracts\Translation\Translator|null|string
     */
    public static function getRoleById($id) {
        switch($id) {
            case 1:
                return __('app.roles.archive_admin');
            case 2:
                return __('app.roles.hall_admin');
            case 3:
                return __('app.roles.user');
            default:
                return false;
        }
    }
}
