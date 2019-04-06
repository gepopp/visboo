<?php
/**
 * Created by PhpStorm.
 * User: gerha
 * Date: 05.04.2019
 * Time: 20:37
 */
namespace App\Mails;




class VerificationTransactional
{




    public function toMail($notifiable)
    {
        dd($this->verificationUrl());

    }


    protected function verificationUrl($notifiable)
    {
        return URL::temporarySignedRoute(
            'verification.verify',
            Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
            ['id' => $notifiable->getKey()]
        );
    }
}