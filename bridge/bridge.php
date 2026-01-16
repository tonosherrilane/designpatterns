```php
<?php

// Implementor
interface Color {
    public function applyColor();
}

// Concrete Implementors
class RedColor implements Color {
    public function applyColor() {
        echo "Applying red color\n";
    }
}

class BlueColor implements Color {
    public function applyColor() {
        echo "Applying blue color\n";
    }
}

// Abstraction
abstract class Shape {
    protected Color $color;

    public function __construct(Color $color) {
        $this->color = $color;
    }

    abstract public function draw();
}

// Refined Abstractions
class Circle extends Shape {
    public function draw() {
        echo "Drawing Circle - ";
        $this->color->applyColor();
    }
}

class Rectangle extends Shape {
    public function draw() {
        echo "Drawing Rectangle - ";
        $this->color->applyColor();
    }
}

// Client Code
$redCircle = new Circle(new RedColor());
$blueRectangle = new Rectangle(new BlueColor());

$redCircle->draw();
$blueRectangle->draw();

?>
```
