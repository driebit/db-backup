<?php

namespace Driebit\DbBackup\Tests;

use Driebit\DbBackup\SqliteCopyBackup;

class SqliteCopyBackupTest extends \PHPUnit_Framework_TestCase
{
    public function testBackup()
    {
        touch('/tmp/driebit-db-backup-original');
        $backupFile = '/tmp/driebit-db-backup-backup.db';

        $sqlite = new SqliteCopyBackup('/tmp');
        $sqlite->backup('driebit-db-backup-original', $backupFile);

        $this->assertTrue(file_exists($backupFile));
        unlink($backupFile);
    }

    public function testRestore()
    {
        touch('/tmp/driebit-db-backup-backup.db');
        $originalFile = 'driebit-db-backup-original';

        $sqlite = new SqliteCopyBackup('/tmp');
        $sqlite->restore($originalFile, '/tmp/driebit-db-backup-backup.db');

        $this->assertTrue(file_exists('/tmp/' . $originalFile));
        unlink('/tmp/' . $originalFile);
    }
}
