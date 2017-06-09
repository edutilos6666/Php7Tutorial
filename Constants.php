<?php

define ("NAME", "foobar");
define ("AGE", 10);
define ("WAGE", 100.0);
define ("NL", "\n");

function test_constants() {
    echo "name = ". NAME . NL ;
    echo "age = ". AGE . NL ;
    echo "wage = ". WAGE . NL ;
}

test_constants();
echo "name = ". NAME . NL ;