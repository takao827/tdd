<?php

namespace App\Money;

abstract class Money
{
    protected int $amount;

    protected string $currency;

    abstract function times(int $multiplier): Money;

    public function currency(): string
    {
        return $this->currency;
    }

    public function equals(Money $money): bool
    {
        return $this->amount == $money->amount
            && get_class($this) === get_class($money);
    }

    public static function dollar(int $amount): Dollar
    {
        return new Dollar($amount);
    }

    public static function franc(int $amount): Franc
    {
        return new Franc($amount);
    }
}
