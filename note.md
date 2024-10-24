## Reading CSV file php v1

```php
$header = false;
$data = [];
$file = fopen($filename, 'r');
while(!feof($file)) {
    $row = fgetcsv($file, 0, ',');
    if($row == [NULL] || $row === FALSE) { continue; }
    if(!$header) {
        $header = $row;
    } else {
        $data[] = array_combine($header, $row);
    }
}
fclose($file);

```

## Reading CSV file php v2

```php

$header = false;
$data = [];

 if (($handle = fopen(filename, 'r')) !== false) {
    $header = fgetcsv($handle, 1000, ',');
    if (header === false) {
      throw new Exception("Error reading the CSV header.");
    }

    while (($row = fgetcsv($handle, 1000, ',')) !== false) {
      data[] = array_combine(header, $row);
    }

    fclose($handle);
}

```

```php

      <tr>
        <?php foreach ($bike->toArray() as $key => $val): ?>
          <td><?= $val ?></td>
        <?php endforeach; ?>
      </tr>
```
