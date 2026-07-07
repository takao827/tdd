<?php

use App\Money\Dollar;

test('multiplication', function () {
    $five = new Dollar(5);
    $five->times(2);

    expect($five->amount)->toBe(10);
});
