<?php namespace MPRF\Aria;

use MPRF\Common\Singleton;

/**
 * Class Command
 *
 * @package MPRF\Aria
 */
abstract class Command {
    use Singleton;

    protected $command = null;
    protected $description = "An Aria command.";

    protected abstract function action($args);

    public function run() {
        if (!$this->command) $this->command = strtolower(get_class($this));
        echo "Running command $this->command..." . PHP_EOL;
        global $argv;
        $this->action($argv);

    }
}