<?php

use App\Money\Dollar;

test('multiplication', function () {
    $five = new Dollar(5);
    expect($five->times(2))->toEqual(new Dollar(10));
    expect($five->times(3))->toEqual(new Dollar(15));
});

test('equality', function () {
    expect(new Dollar(5)->equals(new Dollar(5)))->toBeTrue();
    expect(new Dollar(5)->equals(new Dollar(6)))->toBeFalse();
});
