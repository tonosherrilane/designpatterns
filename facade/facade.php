```php
<?php

// Subsystem classes
class CPU {
    public function start(): void {
        echo "CPU started\n";
    }
}

class Memory {
    public function load(): void {
        echo "Memory loaded\n";
    }
}

class HardDrive {
    public function read(): void {
        echo "Hard Drive reading data\n";
    }
}

// Facade
class ComputerFacade {
    private CPU $cpu;
    private Memory $memory;
    private HardDrive $hardDrive;

    public function __construct() {
        $this->cpu = new CPU();
        $this->memory = new Memory();
        $this->hardDrive = new HardDrive();
    }

    public function startComputer(): void {
        $this->cpu->start();
        $this->memory->load();
        $this->hardDrive->read();
    }
}

// Usage
$computer = new ComputerFacade();
$computer->startComputer();
```
