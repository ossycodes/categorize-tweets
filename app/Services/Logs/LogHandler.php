<?php

namespace App\Services\Logs;

use App\Models\Log;
use Monolog\Logger;
use App\Events\Logs\LogMonologEvent;
use Monolog\Formatter\FormatterInterface;
use Monolog\Handler\AbstractProcessingHandler;

class LogHandler extends AbstractProcessingHandler
{
    public function __construct($level = Logger::DEBUG)
    {
        parent::__construct($level);
    }

    protected function write(array $record) :void
    {
        $whatsappMessage = "Hey dear you have a new log message, details are: IP: *ip*,  log message: log_message, user:id *user_id*";
        foreach ($record['formatted'] as $key => $value) {
            $whatsappMessage = str_replace($key, $value, $whatsappMessage);
        }

        dd($whatsappMessage);

        // Queue implementation
        // event(new LogMonologEvent($record));
    }

    /**
     * {@inheritDoc}
     */
    protected function getDefaultFormatter(): FormatterInterface
    {
        return new LogFormatter();
    }
}
