<?php


namespace App\Service;

use App\Mail\MemberAdded;
use Illuminate\Support\Facades\Mail;

class MemberService
{
    static public function sendMail(string $email, string $message = '') {
        if ($message == '') {
            $message = 'Пользователь успешно добавлен. Поздравляем! Отослано используя очереди.';
        }
        Mail::to($email)->queue(new MemberAdded($message));
    }

}