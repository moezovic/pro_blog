<?php
if ($var1) {
    $var2 = 0;
} else {
    $var2 = 1;
}

$var1 ? $var2 = 0 : $var2 = 1;

function foo(string $bar, array $baz, ?MyClass $object) : MyClass
{
}
