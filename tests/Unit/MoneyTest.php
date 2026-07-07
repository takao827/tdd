<?php

use App\Money\Money;

test('multiplication', function () {
    $five = Money::dollar(5);
    expect($five->times(2))->toEqual(Money::dollar(10));
    expect($five->times(3))->toEqual(Money::dollar(15));
});

test('franc multiplication', function () {
    $five = Money::franc(5);
    expect($five->times(2))->toEqual(Money::franc(10));
    expect($five->times(3))->toEqual(Money::franc(15));
});

test('equality', function () {
    expect(Money::dollar(5)->equals(Money::dollar(5)))->toBeTrue();
    expect(Money::dollar(5)->equals(Money::dollar(6)))->toBeFalse();
    expect(Money::franc(5)->equals(Money::franc(5)))->toBeTrue();
    expect(Money::franc(5)->equals(Money::franc(6)))->toBeFalse();
    expect(Money::dollar(5)->equals(Money::franc(5)))->toBeFalse();
});
