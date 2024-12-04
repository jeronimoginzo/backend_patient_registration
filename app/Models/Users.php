<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Roles;
use Illuminate\Foundation\Auth\User;

class Users extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = [
        'name',
        'email',
        'cellphone',
        'file_url'
    ];

    public static function RegisterPatient(array $patientArray)
    {
        try {
            $user = new Users();
            $user->fill([
                'name' => $patientArray['name'],
                'email' => $patientArray['email'],
                'cellphone' => $patientArray['cellphone'],
                'file_url' => $patientArray['file_url'],
            ]);
            $user->role = Roles::PATIENT;
            $user->email_confirmation_sent = 0;
            $user->email_sent_on = null;

            $user->save();
            return  $user;
        } catch (Exception $e) {
            return null;;
        }
    }
}
