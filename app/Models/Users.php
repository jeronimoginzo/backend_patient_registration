<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Roles;
use Exception;

class Users extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = [
        'name',
        'email',
        'cellphone',
        'file_url'
    ];

    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'cellphone' => 'string',
        'file_url' => 'string',
    ];

    public static function RegisterPatient(array $patientArray)
    {
        try {
            $user = new Users();
            $user->name = $patientArray['name'];
            $user->email = $patientArray['email'];
            $user->cellphone = $patientArray['cellphone'];
            $user->file_url = $patientArray['file_url'];
            $user->role = Roles::PATIENT;
            $user->email_confirmation_sent = 0;
            $user->email_sent_on = null;

            $user->save();
            return  $user;
        } catch (Exception $e) {
            \Log::error('Error on job: ' . $e->getMessage());
            \Log::error($e->getTraceAsString());
            return null;;
        }
    }
}
