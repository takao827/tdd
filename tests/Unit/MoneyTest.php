<?php

use App\Money\Bank;
use App\Money\Money;

test('multiplication', function () {
    $five = Money::dollar(5);
    expect($five->times(2))->toEqual(Money::dollar(10));
    expect($five->times(3))->toEqual(Money::dollar(15));
});

test('equality', function () {
    expect(Money::dollar(5))->toEqual(Money::dollar(5));
    expect(Money::dollar(5))->not->toEqual(Money::dollar(6));
    expect(Money::dollar(5))->not->toEqual(Money::franc(5));
});

test('currency', function () {
    expect(Money::dollar(1)->currency())->toBe('USD');
    expect(Money::franc(1)->currency())->toBe('CHF');
});

test('simple addition', function () {
    $five = Money::dollar(5);
    $sum = $five->plus($five);
    $bank = new Bank();
    $reduced = $bank->reduce($sum, 'USD');
    expect($reduced)->toEqual(Money::dollar(10));
});
