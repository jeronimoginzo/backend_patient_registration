<?php

namespace App\Jobs;

use App\Models\Users;
use Illuminate\Bus\Dispatchable;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendConfirmationEmail implements ShouldQueue
{
    use Dispatchable, Queueable, InteractsWithQueue, SerializesModels;

    protected $user;

    public function __construct(Users $user)
    {
        $this->user = $user;
    }


    public function handle()
    {
        \Log::info('Iniciando el envío del correo para el usuario: ' . $this->user->email);

        try {
            Mail::to($this->user->email)->send(new \App\Mail\ConfirmRegistration($this->user));
            \Log::info('Correo enviado exitosamente a: ' . $this->user->email);

            $this->user->email_confirmation_sent = 1;
            $this->user->email_sent_on = now();
            $this->user->save();

            \Log::info('Usuario actualizado con éxito: ' . $this->user->email);
        } catch (\Exception $e) {
            \Log::error('Error en el job: ' . $e->getMessage());
            \Log::error($e->getTraceAsString());
            throw $e;
        }
    }
}
