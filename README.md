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


The example above will display a nicely formatted output (notice the comments and the clean indentation in 
the generated source code):


```html
<!-- START - My first table -->
<table>
	<caption id="bam">My first table</caption>
	<thead>
		<tr><th>First Name</th><th>Gender</th><th>Job</th></tr>
	</thead>
	<tfoot>
		<tr><td>Bum</td><td>Bam</td><td>Bim</td></tr>
	</tfoot>
	<tbody>
		<tr><td>pierre</td><td>male</td><td>developer</td></tr>
		<tr><td>alice</td><td>female</td><td>designer</td></tr>
		<tr><td>kobe</td><td>male</td><td>basketball player</td></tr>
		<tr><td>christine</td><td>female</td><td>marketing assistant</td></tr>
	</tbody>
</table>
<!-- END - My first table -->
```






History Log
------------------
    
- 1.1.0 -- 2015-10-28

    - improve generated html code formatting, add html comments at the top and bottom of the generated table
    
- 1.0.0 -- 2015-10-28

    - initial commit
    
    
    
    