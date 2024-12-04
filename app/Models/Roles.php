<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    const ADMIN = 1;
    const PATIENT = 2;


    public static function getRoleName(int $roleId): string
    {
        switch ($roleId) {
            case self::ADMIN:
                return 'Administrator';
            case self::PATIENT:
                return 'Patient';
            default:
        }
    }
}
