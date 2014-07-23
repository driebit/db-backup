<?php

namespace Driebit\DbBackup\Tests;

use Driebit\DbBackup\MysqlDumpBackup;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\ProcessBuilder;

class MysqlDumpBackupTest extends \PHPUnit_Framework_TestCase
{
    public function testBackup()
    {
        $mysql = new MysqlDumpBackupMock();
        $mysql->backup('db', 'file', array('host' => '127.0.0.1'));

        $this->assertEquals('mysqldump db file -h 127.0.0.1', $mysql->command);
    }
}

class MysqlDumpBackupMock extends MysqlDumpBackup
{
    public $command;

    protected function runCommand($command, array $arguments)
    {
        $this->command = sprintf('%s %s', $command, implode(' ', $arguments));
    }
}
