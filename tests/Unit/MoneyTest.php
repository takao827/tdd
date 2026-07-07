<?php

use App\Money\Money;

test('multiplication', function () {
    $five = Money::dollar(5);
    expect($five->times(2)->equals(Money::dollar(10)))->toBeTrue();
    expect($five->times(3)->equals(Money::dollar(15)))->toBeTrue();
});

test('equality', function () {
    expect(Money::dollar(5)->equals(Money::dollar(5)))->toBeTrue();
    expect(Money::dollar(5)->equals(Money::dollar(6)))->toBeFalse();
    expect(Money::dollar(5)->equals(Money::franc(5)))->toBeFalse();
});

test('currency', function () {
    expect(Money::dollar(1)->currency())->toBe('USD');
    expect(Money::franc(1)->currency())->toBe('CHF');
});
