# pdo-db-classes
PDO classes for CRUD

have at least rows ``id`` and  ``logtime``



## CREATE

```
$fields = array('txt', 'title');
$values = array('teste1', 'teste2');  OR  $values = array($value1, $value2);

$teste = new insertDb('table_name', $fields, $values);
$teste->doIt();
```







## READ

### RETRIEVE ALL VALUES FROM MULTIPLE ENTRIES - result 2 level array (ARRAY OF ARRAYS OF STRINGS)

1. DEFINE THE OBJECT
```
$obj = new retrieveFromDb("*", "table_name WHERE row_name = 'test'");
OR
$obj = new retrieveFromDb("*", "table_name WHERE row_name = '$test'");
$content = $obj->retrieveAll();
```

2. RETRIEVE

A. FOREACH LOOP (LIKE NEWS FEED)
```
foreach ($content as $v1) { echo $v1['row_name']; }
or
foreach ($content as $v1) { echo $v1['1']; }
```

B. INDIVIDUAL
```
echo $content[2][4];
or
echo $content[2]['row_name'];
```



### RETRIEVE ALL VALUES FROM 1 ROW (ARRAY OF STRINGS)

1. DEFINE THE OBJECT
```
$obj = new retrieveFromDb("what_row", "table_name WHERE featured = 1");
$content = $obj->retrieveAllFromRow();
```

2. RETRIVE (ARRAY)
```
print_r($content);
echo $content[2];
```



### RETRIEVE ALL VALUES FROM A SINGLE ENTRY (ARRAY OF STRINGS)

1. DEFINE THE OBJECT
```
$obj = new retrieveFromDb("*", "table_name WHERE id = 1");
$content = $obj->retrieveLine();
```

2. RETRIEVE (ARRAY)
```
echo $content['row_name'];
or
echo $content[2];
```



### RETRIEVE SINGLE VALUE (STRING)

1. DEFINE THE OBJECT
```
$obj = new retrieveFromDb("row_name", "table_name WHERE id = 1");
$content = $obj->retrieveSingleValue();
```

2. RETRIEVE (STRING)
```
echo $content;
```






## UPDATE
```
$fields = array('txt', 'title');
$values = array('teste1', 'teste2');
$where = 'id = 1';

$update = new updateDb('project', $fields, $values, $where);
$update->doIt();
```






## REMOVE

THE THIRD PARAMETER HAS TO BE A STRING WITH the values SEPARATED BY COMMAS ( , )

IF IT IS AN ARRAY
``$deleteThis = implode(', ', $deleteThis);``

```
$remove = new deleteDb('table_name', 'rowName', $deleteThis);
$remove->doIt();
```



