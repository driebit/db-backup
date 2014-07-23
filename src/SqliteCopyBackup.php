<?php

namespace Driebit\DbBackup;

use Driebit\DbBackup\Exception\BackupException;

class SqliteCopyBackup implements BackupInterface
{
    private $path;

    public function __construct($path = null)
    {
        $this->path = $path;
    }

    public function backup($database, $file, array $params = null)
    {
        $this->copy($this->getFile($database), $file);
    }

    public function restore($database, $file, array $params = null)
    {
        $this->copy($file, $this->getFile($database));
    }

    private function getFile($database)
    {
        if ($this->path) {
            return sprintf('%s/%s', $this->path, $database);
        }

        return $database;
    }

    private function copy($source, $destination)
    {
        if (false === copy($source, $destination)) {
            throw new BackupException($source, $destination);
        }
    }
}
