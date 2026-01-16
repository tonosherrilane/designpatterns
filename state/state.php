```php
<?php

// State Interface
interface State {
    public function doAction(Context $context);
}

// Concrete States
class StartState implements State {
    public function doAction(Context $context) {
        echo "Player is in START state\n";
        $context->setState($this);
    }

    public function __toString() {
        return "Start State";
    }
}

class StopState implements State {
    public function doAction(Context $context) {
        echo "Player is in STOP state\n";
        $context->setState($this);
    }

    public function __toString() {
        return "Stop State";
    }
}

// Context
class Context {
    private ?State $state = null;

    public function setState(State $state) {
        $this->state = $state;
    }

    public function getState(): ?State {
        return $this->state;
    }
}

// Client Code
$context = new Context();

$startState = new StartState();
$startState->doAction($context);

echo $context->getState() . "\n";

$stopState = new StopState();
$stopState->doAction($context);

echo $context->getState() . "\n";

?>
```
