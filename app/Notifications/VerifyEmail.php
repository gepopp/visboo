<?php
/**
 * Created by PhpStorm.
 * User: gerha
 * Date: 06.04.2019
 * Time: 08:01
 */

namespace App\Notifications;

use App\Channels\CampaignChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;

class VerifyEmail extends Notification
{
    use Queueable;

    public $email_id = '49c6fcd3-12ec-423b-8fe2-e2219100460d';


    /**
     * Get the notification channels.
     *
     * @param  mixed  $notifiable
     * @return array|string
     */
    public function via($notifiable)
    {
        return [CampaignChannel::class];
    }

    /**
     * Get the voice representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return VoiceMessage
     */
    public function toCampaign($notifiable)
    {
        return [
          'To' => $notifiable->name . '<' . $notifiable->email . '>',
          'Data' =>[
              'name' => $notifiable->name,
              'link' => $this->VerifyLink($notifiable)
          ]
        ];
    }

    public function VerifyLink($notifiable){

        return URL::temporarySignedRoute(
            'verification.verify',
            Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
            ['id' => $notifiable->getKey()]
        );
    }


}