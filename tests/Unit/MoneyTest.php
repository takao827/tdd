<?php

use App\Money\Money;
use App\Money\Franc;

test('multiplication', function () {
    $five = Money::dollar(5);
    expect($five->times(2)->equals(Money::dollar(10)))->toBeTrue();
    expect($five->times(3)->equals(Money::dollar(15)))->toBeTrue();
});

test('franc multiplication', function () {
    $five = Money::franc(5);
    expect($five->times(2)->equals(Money::franc(10)))->toBeTrue();
    expect($five->times(3)->equals(Money::franc(15)))->toBeTrue();
});

test('equality', function () {
    expect(Money::dollar(5)->equals(Money::dollar(5)))->toBeTrue();
    expect(Money::dollar(5)->equals(Money::dollar(6)))->toBeFalse();
    expect(Money::franc(5)->equals(Money::franc(5)))->toBeTrue();
    expect(Money::franc(5)->equals(Money::franc(6)))->toBeFalse();
    expect(Money::dollar(5)->equals(Money::franc(5)))->toBeFalse();
});

test('different class equality', function () {
    expect(new Money(10, 'CHF')->equals(new Franc(10, 'CHF')))->toBeTrue();
});

test('currency', function () {
    expect(Money::dollar(1)->currency())->toBe('USD');
    expect(Money::franc(1)->currency())->toBe('CHF');
});
