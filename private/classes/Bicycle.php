<?php

class Bicycle
{

  public string $brand;
  public string $model;
  public string $year;
  public string $category;
  public string $color;
  public string $description;
  public string $gender;
  public int $price;

  protected float $weight_kg;
  protected float $condition_id;


  public const CATEGORIES = ['Road', 'Mountain', 'Hybrid', 'Cruiser', 'City', 'BMX'];
  public const GENDERS = ['Mens', 'Womens', 'Unisex'];

  protected const CONDITION_OPTIONS = [
    1 => 'Beat Up',
    2 => 'Decent',
    3 => 'Good',
    4 => 'Great',
    5 => 'Like New'
  ];



  public function __construct($args = [])
  {


    // $this->brand = isset($args['brand']) ? $args['brand']  : '';
    $this->brand = $args['brand'] ?? '';
    $this->model = $args['model'] ?? '';
    $this->year = $args['year'] ?? '';
    $this->category = $args['category'] ?? '';
    $this->color = $args['color'] ?? '';
    $this->description = $args['description'] ?? '';
    $this->gender = $args['gender'] ?? '';
    $this->price = $args['price'] ?? 0;
    $this->weight_kg = $args['weight_kg'] ?? 0.0;
    $this->condition_id = $args['condition_id'] ?? 3;

    //Caution: allows private/procted to be set 
    // foreach ($args as $key => $val) {
    //   if (property_exists($this, $key)) {
    //     $this->$key = $val;
    //   }
    // }
  }

  public function toArray()
  {

    // return get_object_vars($this);
    return [
      'brand' => $this->brand,
      'model' => $this->model,
      'year' => $this->year,
      'category' => $this->category,
      'color' => $this->color,
      'description' => $this->description,
      'gender' => $this->gender,
      'price' => $this->price,
      'weight_kg' => $this->weight_kg,
      'condition_id' => $this->condition_id,
    ];
  }



  public function weight_kg()
  {
    return number_format($this->weight_kg, 2) . ' kg';
  }

  public function set_weight_kg($value)
  {
    $this->weight_kg = floatval($value);
  }

  public function weight_lbs()
  {
    $weight_lbs = floatval($this->weight_kg()) * 2.2046226218;
    return number_format($weight_lbs, 2) . ' lbs';
  }

  public function set_weight_lbs($value)
  {
    $this->weight_kg = floatval($value) / 2.2046226218;
  }


  public function condition()
  {
    if ($this->condition_id > 0) {
      return self::CATEGORIES[$this->condition_id];
    } else {
      return 'Unknown';
    }
  }
}
