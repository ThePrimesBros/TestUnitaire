<?php

namespace App\Entity;

use App\Entity\User;

class EmailSenderService
{
    public function __construct($EmailSenderService)
    {
        $this->EmailSenderService = $EmailSenderService;
    }

    public function SendMessage($mail)
    {
        $to      = `$mail`;
        $subject = 'le sujet';
        $message = '2 Items left !';
        $headers = 'From: sendMessage@example.com' . "\r\n" .
        'Reply-To: UserEmail@example.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
   
        mail($to, $subject, $message, $headers);
    }
}
