```php
<?php

// Product Interface
interface Shape {
    public function draw(): void;
}

// Concrete Products
class Circle implements Shape {
    public function draw(): void {
        echo "Drawing Circle\n";
    }
}

class Square implements Shape {
    public function draw(): void {
        echo "Drawing Square\n";
    }
}

class Rectangle implements Shape {
    public function draw(): void {
        echo "Drawing Rectangle\n";
    }
}

// Factory
class ShapeFactory {
    public static function createShape(string $type): Shape {
        switch (strtolower($type)) {
            case 'circle':
                return new Circle();
            case 'square':
                return new Square();
            case 'rectangle':
                return new Rectangle();
            default:
                throw new Exception("Shape type not supported");
        }
    }
}

// Usage
$shape1 = ShapeFactory::createShape("circle");
$shape1->draw();

$shape2 = ShapeFactory::createShape("square");
$shape2->draw();

$shape3 = ShapeFactory::createShape("rectangle");
$shape3->draw();
```
