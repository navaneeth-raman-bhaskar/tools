Documentation
======

PHP tools, scripts and assets.

1. Coding standards
------------
Prefered coding standards for all "Rathouz libraries" are defined in file **assets/coding-standards/standards.xml**.

2. MD file generator
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

3. JavaScript Object (JObject)
------------
Converts PHP class to JavaScript language. It helps you to dynamically configure/change the JavaScript objects. 

```php

$employee = new Rathouz\Tools\Objects\JObject('employee');

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
