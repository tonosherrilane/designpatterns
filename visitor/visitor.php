```php
<?php

// Visitor Interface
interface Visitor {
    public function visitBook(Book $book): void;
    public function visitDVD(DVD $dvd): void;
}

// Element Interface
interface Item {
    public function accept(Visitor $visitor): void;
}

// Concrete Elements
class Book implements Item {
    public string $title;
    public float $price;

    public function __construct(string $title, float $price) {
        $this->title = $title;
        $this->price = $price;
    }

    public function accept(Visitor $visitor): void {
        $visitor->visitBook($this);
    }
}

class DVD implements Item {
    public string $name;
    public float $price;

    public function __construct(string $name, float $price) {
        $this->name = $name;
        $this->price = $price;
    }

    public function accept(Visitor $visitor): void {
        $visitor->visitDVD($this);
    }
}

// Concrete Visitor
class PriceVisitor implements Visitor {
    public function visitBook(Book $book): void {
        echo "Book: {$book->title}, Price: {$book->price}\n";
    }

    public function visitDVD(DVD $dvd): void {
        echo "DVD: {$dvd->name}, Price: {$dvd->price}\n";
    }
}

// Usage
$items = [
    new Book("Design Patterns", 45.5),
    new DVD("Clean Code", 30.0)
];

$visitor = new PriceVisitor();

foreach ($items as $item) {
    $item->accept($visitor);
}
```
