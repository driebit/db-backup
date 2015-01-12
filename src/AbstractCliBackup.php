<?php

namespace Driebit\DbBackup;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\ProcessBuilder;

abstract class AbstractCliBackup implements BackupInterface
{
    protected $dumpBinary;
    protected $restoreBinary;

    /**
     * @param string $dumpBinary
     */
    public function setDumpBinary($dumpBinary)
    {
        $this->dumpBinary = $dumpBinary;
    }

    /**
     * @param string $restoreBinary
     */
    public function setRestoreBinary($restoreBinary)
    {
        $this->restoreBinary = $restoreBinary;
    }
    
    protected function runCommand($command, array $arguments)
    {
        array_unshift($arguments, $command);
        $builder = new ProcessBuilder($arguments);
        $process = $builder->getProcess();

        $process->run();

        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
    }
}
