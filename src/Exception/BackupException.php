<?php

namespace Driebit\DbBackup\Exception;

class BackupException extends \RuntimeException
{
    public function __construct($source, $destination, \Exception $previous = null)
    {
        parent::__construct(
            sprintf('Error when trying to back up %s to %s', $source, $destination),
            null,
            $previous
        );
    }
}
