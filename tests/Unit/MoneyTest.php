<?php

use App\Money\Bank;
use App\Money\Money;
use App\Money\Sum;

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

test('plus returns sum', function () {
    $sum = new Sum(Money::dollar(3), Money::dollar(4));
    $bank = new Bank();
    $result = $bank->reduce($sum, 'USD');
    expect($result)->toEqual(Money::dollar(7));
});

test('reduce money', function () {
    $bank = new Bank();
    $result = $bank->reduce(Money::dollar(1), 'USD');
    expect($result)->toEqual(Money::dollar(1));
});

test('reduce money different currency', function () {
    $bank = new Bank();
    $bank->addRate('CHF', 'USD', 2);
    $result = $bank->reduce(Money::franc(2), 'USD');
    expect($result)->toEqual(Money::dollar(1));
});

test('identity rate', function () {
    expect(new Bank()->rate('USD', 'USD'))->toBe(1);
});

test('mixed addition', function () {
    $fiveBucks = Money::dollar(5);
    $tenFrancs = Money::franc(10);
    $bank = new Bank();
    $bank->addRate('CHF', 'USD', 2);
    $result = $bank->reduce($fiveBucks->plus($tenFrancs), 'USD');
    expect($result)->toEqual(Money::dollar(10));
});

test('sum plus money', function () {
    $fiveBucks = Money::dollar(5);
    $tenFrancs = Money::franc(10);
    $bank = new Bank();
    $bank->addRate('CHF', 'USD', 2);
    $sum = new Sum($fiveBucks, $tenFrancs)->plus($fiveBucks);
    $result = $sum->reduce($bank, 'USD');
    expect($result)->toEqual(Money::dollar(15));
});
