<?php 

//Utilitary class containing static methods

class Utils {
  //Method to get a request variable or to replace it by default value
  public static function request(string $variableName, mixed $defaultValue = null) : mixed
  {  
    return $_REQUEST[$variableName] ?? $defaultValue;

  }

  //Method to transform a string into a DateTime object
  public static function stringToDate(string|DateTime $date, string $format = 'Y-m-d') : DateTime 
  {
    if (is_string($date)) {
        $date = DateTime::createFromFormat($format, $date);
    }
    return $date;
  }

  //Format a string into paragraphs
  public static function format(string $string) : string
  {
    $lines = explode("\n", $string);

    $finalString = "";
    foreach ($lines as $line) {
        if (trim($line) != "") {
            $finalString .= "<p>$line</p>";
        }
    }
    
    return $finalString;
  }
}