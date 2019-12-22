<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WhatsappController extends Controller
{

	 public function via($notifiable)
    {
        return [ChatAPIChannel::class];
    }

    public function index($notifiable)
    {
        return ChatAPIMessage::create()
            ->to(601162528520) // your user phone
            ->file(public_path('img'),'pic1.jpg')
            ->content('Your invoice has been paid');
    }
}
