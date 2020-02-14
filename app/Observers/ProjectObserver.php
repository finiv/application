<?php

namespace App\Observers;

use Illuminate\Support\Facades\Mail;
use App\Mail\NewProjectNotification;

class ProjectObserver
{
    public function created()
    {
        $email = 'finiv.1993@gmail.com';

        Mail::to($email)->send(new NewProjectNotification());
    }
}
