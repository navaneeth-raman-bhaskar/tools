Documentation
======

Tools, scripts and assets for Pehape libraries.

1. MD file generator
------------
Generates *.md files from predefined templates.

**Example of README.md generation**

```sh
$ php bin/genmd.php assets/readme/template.md README.md
```

**Example of license.md generation**

```sh
$ php bin/genmd.php assets/licenses/bsdgpl-template.md license.md
```

All parameters needed by predefined templates are provides by interactive console mode.

2. JavaScript Object (JObject)
------------
Converts PHP class to JavaScript language. It helps you to dynamically configure/change the JavaScript objects. 

```php

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

```
