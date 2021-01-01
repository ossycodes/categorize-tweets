<?php

namespace App\Services\Logs;

use Monolog\Formatter\NormalizerFormatter;

class LogFormatter extends NormalizerFormatter
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * {@inheritdoc}
     */
    public function format(array $record)
    {
        $record = parent::format($record);

        return $this->getDocument($record);
    }

    /**
     * 
     * @param array $record
     * @return array
     */
    protected function getDocument(array $record)
    {
        $extra = $record['extra'];
        $extra['log_message'] = $record['message'];

        return $extra;
    }
}
