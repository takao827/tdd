<?php

use App\Money\Dollar;
use App\Money\Franc;

test('multiplication', function () {
    $five = new Dollar(5);
    expect($five->times(2))->toEqual(new Dollar(10));
    expect($five->times(3))->toEqual(new Dollar(15));
});

test('franc multiplication', function () {
    $five = new Franc(5);
    expect($five->times(2))->toEqual(new Franc(10));
    expect($five->times(3))->toEqual(new Franc(15));
});

test('equality', function () {
    expect(new Dollar(5)->equals(new Dollar(5)))->toBeTrue();
    expect(new Dollar(5)->equals(new Dollar(6)))->toBeFalse();
    expect(new Franc(5)->equals(new Franc(5)))->toBeTrue();
    expect(new Franc(5)->equals(new Franc(6)))->toBeFalse();
    expect(new Dollar(5)->equals(new Franc(5)))->toBeFalse();
});
