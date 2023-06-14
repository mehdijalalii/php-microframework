<?php

namespace App\Controllers;

use Core\Queue;
use App\Jobs\SendEmailVerificationJob;

class RegisterController
{
    public function __invoke()
    {
        // SendEmailVerificationJob is simple without email param and without send email only for test queue and jobs

        Queue::enqueue(
            new SendEmailVerificationJob()
        );

        echo "user registered";
    }
}