<?php

use App\Money\Dollar;

test('multiplication', function () {
    $five = new Dollar(5);

    $product = $five->times(2);
    expect($product->amount)->toBe(10);

    $product = $five->times(3);
    expect($product->amount)->toBe(15);
});
