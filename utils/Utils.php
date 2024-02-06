<?php 

//Utilitary class containing static methods

class Utils {
  //Method to get a request variable or to replace it by default value
  public static function request(string $variableName, mixed $defaultValue = null) : mixed
  {  
    return $_REQUEST[$variableName] ?? $defaultValue;

  }
}