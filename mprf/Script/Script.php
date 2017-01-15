<?php namespace MPRF\Script;
/*
 * 2016 (c) Ivan Montilla <personal@ivanmontilla.es>
 * ivanmontilla.es (Author website)
 * mprf.io (MPRF website)
 *
 * Monty PHP Rest Framework (MPRF) is a framework to make Rest APIs in PHP.
 * You are free to use, adapt and redistribute this framework software.
 *
 * Get started in docs.mprf.io
 */
use MPRF\Common\Singleton;

/**
 * Extending this class you can create CLI scripts for making
 * task, for example, crons to update compiled database tables.
 *
 * @package Framework\Script
 */
abstract class Script {
    use Singleton;
    /**
     * Your script code must be in the override of this method.
     */
    protected abstract function process();

    /**
     * For execute the script, you must instance the child class and
     * call this method.
     */
    public final function run() {
        $start_datetime = new \DateTimeImmutable();
        echo PHP_EOL . "╔══════════════════════════════════════════════════════════════╗" . PHP_EOL;
        echo "║   Started script execution " . date("r") . "   ║" . PHP_EOL;
        echo "╚══════════════════════════════════════════════════════════════╝" . PHP_EOL . PHP_EOL;
        echo "Executing process method..." . PHP_EOL;
        $this->process();
        echo "Script execution finished." . PHP_EOL . PHP_EOL;
        $datetime_diff = $start_datetime->diff(new \DateTimeImmutable());
        echo "Elapsed " . $datetime_diff->h . " hours, " . $datetime_diff->m
            . " minutes and " . $datetime_diff->s . " seconds." . PHP_EOL . PHP_EOL;
    }
}