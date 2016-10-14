<?php

require_once __DIR__ . '/../vendor/autoload.php';

$employee = new Pehape\Tools\Objects\JObject('employee');

$employee->name = 'John';
//employee.name = 'John';
$employee->surname = 'Doe';
//employee.surname = 'Doe';
$employee->age = 38;
//employee.age = 38;
$employee->tags = ['programmer', 'developer'];
//employee.tags = ["programmer","developer"];

$employee->language->beginner = [
    'perl' => 'Perl',
    'python' => 'Python',
];
//employee.language.beginner = {"perl":"Perl","python":"Python"};
$employee->language->advanced = [
    'bash' => 'Bash',
    'js' => 'JavaScript',
];
//employee.language.advanced = {"bash":"Bash","js":"JavaScript"};
$employee->isProgrammer = 'function() { return true; }';
//employee.isProgrammer = function() { return true; };

echo $employee;


