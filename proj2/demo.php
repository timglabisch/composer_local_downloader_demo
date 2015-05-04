<?php

require_once __DIR__.'/vendor/autoload.php';


assert(class_exists('Proj2Class') === true);
assert(class_exists('Proj3Class') === true);
assert(class_exists('LibAClass') === false);
assert(class_exists('LibBClass') === false);
assert(class_exists('LibCClass') === false);

echo "all fine";