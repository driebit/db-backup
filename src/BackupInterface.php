<?php

namespace Driebit\DbBackup;

/**
 * A database backup
 */
interface BackupInterface
{
    public function backup($database, $file, array $params);
    public function restore($database, $file, array $params);
}
