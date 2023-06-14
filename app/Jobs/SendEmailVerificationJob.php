<?php

namespace App\Jobs;

class SendEmailVerificationJob
{
    public function run()
    {
        sleep(3);

        echo "Executed job <br>";
    }
}