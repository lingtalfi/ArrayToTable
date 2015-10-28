ArrayToTable
=====================
2015-10-28



Create an html table from a php array.





Goal
----------

Our goal is to display an html table from a php array.
The php array contains the elements of the table, and therefore it's an array containing rows.
For instance, this is the kind of php array that we want to display:


```php
$rows = [
    ['pierre', 'male', 'developer'],
    ['alice', 'female', 'designer'],
    ['kobe', 'male', 'basketball player'],
    ['christine', 'female', 'marketing assistant'],
];
```

Notice that each line is a row, and every row must have the same structure (first name - gender - job).




How to
-----------

ArrayToTable is a [planet](https://github.com/lingtalfi/Observer/blob/master/article/article.planetReference.eng.md).




To create the simplest table possible, we can use the ArrayToTableUtil class.

```php
<?php

use ArrayToTable\ArrayToTableUtil;

require_once "bigbang.php";


$rows = [
    ['pierre', 'male', 'developer'],
    ['alice', 'female', 'designer'],
    ['kobe', 'male', 'basketball player'],
    ['christine', 'female', 'marketing assistant'],
];


echo ArrayToTableUtil::create()
    ->addBody($rows)
    ->setHeaders(['First Name', 'Gender', 'Job'])
    ->setCaption('My first table')
    ->setFooter(['Bum', 'Bam', 'Bim'])
    ->render()
;

```



History Log
------------------
    
- 1.0.0 -- 2015-10-28

    - initial commit
    
    
    
    