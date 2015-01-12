<?php

namespace Driebit\DbBackup;

class MongoDumpBackup extends AbstractCliBackup
{
    protected $dumpBinary = 'mongodump';
    protected $restoreBinary = 'mongorestore';
    
    public function backup($database, $file, array $params = array())
    {
        $arguments = array(
            '-d', $database,
            '-o', $file
        );
            
        $this->runCommand($this->dumpBinary, $arguments);
    }

    public function restore($database, $file, array $params = array())
    {
        $arguments = array(
            $file
        );

        if (isset($params['drop'])) {
            array_push($arguments, '--drop');
        }
            
        $this->runCommand($this->restoreBinary, $arguments);
    }
}
