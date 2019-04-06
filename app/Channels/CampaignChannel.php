<?php
/**
 * Created by PhpStorm.
 * User: gerha
 * Date: 06.04.2019
 * Time: 07:59
 */

namespace App\Channels;

use CS_REST_Transactional_SmartEmail;
use Illuminate\Notifications\Notification;


class CampaignChannel
{

    protected $email_id;


    /**
     * Send the given notification.
     *
     * @param  mixed $notifiable
     * @param  \Illuminate\Notifications\Notification $notification
     * @return void
     */
    public function send($notifiable, Notification $notification)
    {

        $sender = new CS_REST_Transactional_SmartEmail($notification->email_id, ['api_key' => config('services.campaign_monitor.key')]);
        $message = $notification->toCampaign($notifiable);

        $consent_to_track = 'yes'; # Valid: 'yes', 'no', 'unchanged'

        $result = $sender->send($message, $consent_to_track);

        if( ! $result->was_successful()){
            throw new \Exception("Verification Mail could not be sent. $result->Message");
        }

    }
}