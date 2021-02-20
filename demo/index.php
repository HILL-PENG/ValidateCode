<?php
require "../vendor/autoload.php";

$validate_code = new ValidateCode\ValidateCode(100, 40, 'abc2f');
$validate_code->generate();
