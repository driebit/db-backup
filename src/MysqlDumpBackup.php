<?php

namespace Driebit\DbBackup;

class MysqlDumpBackup extends AbstractCommandBackup
{
    private $mysqlDumpBinary = 'mysqldump';
    private $mysqlBinary = 'mysql';

    public function backup($database, $file, array $params)
    {
        $cmdParams = array($database, $file);

        if (isset($params['host'])) {
            array_push($cmdParams, '-h', $params['host']);
        }

        $this->runCommand($this->mysqlDumpBinary, $cmdParams);
    }

    public function restore($database, $file, array $params)
    {

    }
}
