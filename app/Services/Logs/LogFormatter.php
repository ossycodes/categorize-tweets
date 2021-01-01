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
<<<<<<< HEAD
     * 
     * @param array $record
=======
     * Convert a log message into an MariaDB Log entity
>>>>>>> 92d9305f1e14810e4177fc3bc7a5db94fd16f492
     * @return array
     */
    protected function getDocument(array $record)
    {
        $extra = $record['extra'];
        $extra['log_message'] = $record['message'];

        return $extra;
    }
}
