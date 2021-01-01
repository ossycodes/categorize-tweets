<?php

namespace App\Services\Logs;

class LogProcessor
{
    public function __invoke(array $record)
    {
        $record['extra'] = [
            'user_id' => auth()->user() ? auth()->user()->id : 'no user',
            'ip' => request()->server('REMOTE_ADDR'),
        ];

        return $record;
    }
}
