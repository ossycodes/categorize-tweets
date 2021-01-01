<?php

namespace App\Services\Logs;

use App\Events\Logs\LogMonologEvent;
use Monolog\Formatter\FormatterInterface;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Logger;
use Twilio\Rest\Client;

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

        $recipient = "+2349023802591";
        $twilio_whatsapp_number = getenv('TWILIO_WHATSAPP_NUMBER');
        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");

        $client = new Client($account_sid, $auth_token);
        $client->messages->create($recipient, ['from' => $twilio_whatsapp_number, 'body' => $whatsappMessage]);

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
