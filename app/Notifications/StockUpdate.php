<?php

namespace App\Notifications;

use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class StockUpdate extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $url;
    protected $product;
    public function __construct($url,$product)
    {
        $this->product = $product;
        $this->url = $url;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database', 'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        try{
        return (new MailMessage)
                    ->line('Stock Update')
                    ->line('Product In Stock: <br>'.$this->product.'<br> URL: <br> <a href="'.$this->url.'">Check Product<a>');
        }catch(Exception $e)
        {
            
        }
    
                }

    public function toDatabase($notifiable)
    {
        return [
            'message' => 'Product In Stock: <br>'.$this->product.'<br><a href="'.$this->url.'" target="_blank">Check Product<a>',
        ];
    }

  
    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
             'message' => 'Product In Stock: <br> <span>'.$this->product.'</span><br><br><span > <a href="'.$this->url.'" target="_blank">Check Product Here<a></span>',
            'count' => $notifiable->unreadNotifications->count(),
           
        ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */


    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
