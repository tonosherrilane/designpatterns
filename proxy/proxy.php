```php
<?php

// Subject Interface
interface Image {
    public function display(): void;
}

// Real Subject
class RealImage implements Image {
    private string $filename;

    public function __construct(string $filename) {
        $this->filename = $filename;
        $this->loadFromDisk();
    }

    private function loadFromDisk(): void {
        echo "Loading {$this->filename} from disk\n";
    }

    public function display(): void {
        echo "Displaying {$this->filename}\n";
    }
}

// Proxy
class ProxyImage implements Image {
    private ?RealImage $realImage = null;
    private string $filename;

    public function __construct(string $filename) {
        $this->filename = $filename;
    }

    public function display(): void {
        if ($this->realImage === null) {
            $this->realImage = new RealImage($this->filename);
        }
        $this->realImage->display();
    }
}

// Usage
$image = new ProxyImage("photo.jpg");

$image->display();
$image->display();
```
