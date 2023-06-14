<?php

namespace Core;

use Predis\Client;

class Queue
{
    private static ?Client $client = null; // Make the property nullable

    protected static string $queueKey = 'queue';

    public static function getClient(): Client
    {
        if (self::$client === null) {
            self::$client = new Client();
        }

        return self::$client;
    }

    public static function enqueue($job): void
    {
        self::getClient()->rpush(
            self::$queueKey, (array)serialize($job)
        );
    }

    public static function dequeue()
    {
        $job = self::getClient()->lpop(self::$queueKey);

        if ($job !== null) {
            return unserialize($job);
        }

        return null;
    }

    public static function process(): void
    {
        while ($job = self::dequeue()) {
            if ($job !== null) {
                $job->run();
            }
        }
    }
}
