```php
<?php

// Strategy Interface
interface PaymentStrategy {
    public function pay(float $amount): void;
}

// Concrete Strategies
class CreditCardPayment implements PaymentStrategy {
    public function pay(float $amount): void {
        echo "Paid {$amount} using Credit Card\n";
    }
}

class PayPalPayment implements PaymentStrategy {
    public function pay(float $amount): void {
        echo "Paid {$amount} using PayPal\n";
    }
}

class CashPayment implements PaymentStrategy {
    public function pay(float $amount): void {
        echo "Paid {$amount} using Cash\n";
    }
}

// Context
class PaymentContext {
    private PaymentStrategy $strategy;

    public function setStrategy(PaymentStrategy $strategy): void {
        $this->strategy = $strategy;
    }

    public function executePayment(float $amount): void {
        $this->strategy->pay($amount);
    }
}

// Usage
$context = new PaymentContext();

$context->setStrategy(new CreditCardPayment());
$context->executePayment(100);

$context->setStrategy(new PayPalPayment());
$context->executePayment(200);

$context->setStrategy(new CashPayment());
$context->executePayment(50);
```
