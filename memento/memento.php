```php
<?php

// Memento
class EditorMemento {
    private string $content;

    public function __construct(string $content) {
        $this->content = $content;
    }

    public function getContent(): string {
        return $this->content;
    }
}

// Originator
class TextEditor {
    private string $content = "";

    public function type(string $text): void {
        $this->content .= $text;
    }

    public function save(): EditorMemento {
        return new EditorMemento($this->content);
    }

    public function restore(EditorMemento $memento): void {
        $this->content = $memento->getContent();
    }

    public function getContent(): string {
        return $this->content;
    }
}

// Caretaker
class History {
    private array $mementos = [];

    public function add(EditorMemento $memento): void {
        $this->mementos[] = $memento;
    }

    public function get(int $index): EditorMemento {
        return $this->mementos[$index];
    }
}

// Usage
$editor = new TextEditor();
$history = new History();

$editor->type("Hello ");
$history->add($editor->save());

$editor->type("World!");
$history->add($editor->save());

echo $editor->getContent() . "\n";

$editor->restore($history->get(0));
echo $editor->getContent();
```
