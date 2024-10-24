<?php

class ParseCSV
{
  public static string $delimiter = ",";

  private string $filename;
  private $header;
  private array $data = [];
  private int $row_count = 0;


  public function __construct(string $filename = '')
  {
    if ($filename !== '') {
      $this->file($filename);
    }
  }


  public function file($filename)
  {
    if (!file_exists($filename)) {
      throw new Exception("Error reading the CSV header.");
    } elseif (!is_readable($filename)) {
      throw new Exception("File is not readable.");
    }
    $this->filename = $filename;
    return true;
  }


  public function parse()
  {


    if (!isset($this->filename)) {
      throw new Exception("Error reading the CSV header.");
    }
    // cleart any previos results
    $this->reset();


    $file = fopen($this->filename, 'r');
    while (!feof($file)) {
      $row = fgetcsv($file, 0, self::$delimiter);

      if ($row == NULL || $row === FALSE) {
        continue;
      }
      if (!$this->header) {
        $this->header = $row;
      } else {
        $this->data[] = array_combine($this->header, $row);
        $this->row_count++;
      }
    }

    fclose($file);
    return $this->data;
  }


  public function last_resort()
  {
    return $this->data;
  }


  public function row_count(): int
  {
    return $this->row_count;
  }


  public function reset()
  {
    $this->header = null;
    $this->data = [];
    $this->row_count = 0;
  }
}
