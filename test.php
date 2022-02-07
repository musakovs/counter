<?php

require_once 'Counter.php';

$c = new Counter;

var_dump($c->count('101') === 1);
var_dump($c->count('1011') === 2);
var_dump($c->count('101111') === 5);
var_dump($c->count('1011111') === 8);
