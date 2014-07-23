<?php

namespace Driebit\DbBackup;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\ProcessBuilder;

abstract class AbstractCommandBackup implements BackupInterface
{
    protected function runCommand($command, array $arguments)
    {
        $builder = new ProcessBuilder(array($command) + $arguments);
        $process = $builder->getProcess();

        $process->run();

        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
    }
}
