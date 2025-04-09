<?php

$c = new CalcModel;

$c->set(new Adder);
$c->calc(10, 50); // return 60

$c->set(new Subtractor);
$c->calc(30); // return 30

$c->set(new Multiplier);
$c->calc(5); // return 150

$c->set(new Divider);
$c->calc(2); // return 75

echo $c->result();
