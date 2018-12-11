<?php

$list = [];

$list[] = $_POST['item_1'];
$list[] = $_POST['item_2'];

foreach ($list as $item) {
    foo($item);
}

function foo(int $bar) {
    echo $bar;
}

// /example01.php:9 PhanTypeMismatchArgument Argument 1 (bar) is string|string[] but \foo() takes int defined at /example01.php:12