<?php 

//Utilitary class containing static methods

class Utils {
  /**
   * Method to get a variable from the $_GET array
   * 
   * @param string $variableName The name of the variable to get
   * @param mixed $defaultValue The default value of the variable
   * @return mixed The value of the variable
   */
  public static function request(string $variableName, mixed $defaultValue = null) : mixed
  {  
    return $_REQUEST[$variableName] ?? $defaultValue;

  }

  //**
  // * Method to transform a string into a DateTime object
  // *
  // * @param string|DateTime $date The date to transform
  // * @param string $format The format of the date
  // * @return DateTime The transformed date
  // */
  public static function stringToDate(string|DateTime $date, string $format = 'Y-m-d') : DateTime 
  {
    if (is_string($date)) {
        $date = DateTime::createFromFormat($format, $date);
    }
    return $date;
  }

  /**
   * Method to transform a DateTime object into a string
   * 
   * @param DateTime|string $date The date to transform
   * @param string $format The format of the date
   * @return string The transformed date
   */
  public static function dateToString(DateTime|string $date, string $format = 'Y-m-d') : string
  {
    if ($date instanceof DateTime) {
        return $date->format($format);
    }
    return $date;
  }

  /**
   * Method to format a string into a HTML paragraph
   * 
   * @param string $string The string to format
   * @return string The formatted string
   */
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

  /**
   * Method to redirect to another page
   * 
   * @param string $action The action to redirect to
   */
  public static function redirect(string $action) : void
  {
    $url = "index.php?action=$action";
    header("Location: $url");
    exit;
  }

  /**
   * Method to check if a string is empty
   * 
   * @param array $data The data to check
   * @return bool True if the data is empty, false otherwise
   */
  public static function isEmpty($data) : bool
  {
  foreach ($data as $key => $value) {
    if (empty($value) || trim($value) == '') {
      return true;
    }
  }

  return false;
  }

  /**
   * Method to validate an image
   * 
   * @param array $file The file to validate
   * @param int $maxSize The maximum size of the file
   * @param array $validExtensions The valid extensions for the file
   * 
   * @return array An array containing the errors
   */
  private static function imageValidate($file, $maxSize = 500000, $validExtensions = ['jpg', 'jpeg', 'png', 'webp']) : array
  {
    $errors = [];
    $fileSize = $file['size'];
    $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

    if ($fileSize > $maxSize) {
        $errors[] = "Le fichier est trop grand.";
    }

    if (!in_array($fileExtension, $validExtensions)) {
        $errors[] = "Seuls les formats jpg, jpeg, png et webp sont autorisés.";
    }

    return $errors;
  }

  /**
   * Method to upload an image
   * 
   * @param string $fileName The name of the file to upload
   * @param string $targetDir The directory to upload the file to
   * 
   * @return array An array containing the errors and the path of the uploaded file
   */
  public static function uploadImage($fileName, $targetDir): array
  {
    $targetFile = $targetDir . basename($_FILES[$fileName]["name"]);
    $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

    //Validate the image
    $picErrors = self::imageValidate($_FILES[$fileName]);

    if (!empty ($picErrors)) {
      return [$picErrors, null];
    }

    if (!move_uploaded_file($_FILES[$fileName]["tmp_name"], $targetFile)) {
      $picErrors[] = "Votre fichier n'a pas pu être téléchargé.";

      return [$picErrors, null];
    }

    return [$picErrors, $targetFile];

  }

  /**
   * Method to ask for confirmation before performing an action
   * 
   * @param string $message The message to display
   * @return string JavaScript code to insert in the HTML
   */
  public static function askConfirmation(string $message) : string
  {
      return "onclick=\"return confirm('$message');\"";
  }

  /**
   * Method to cut a text
   * 
   * @param string $text The text to cut
   * @param int $length The length of the text
   * @return string The cut text
   */
  public static function truncate(string $text, int $length = -1) : string 
  {
    if ($length > 0) {
      $cutText = mb_substr($text, 0, $length);
      if (strlen($text) > $length) {
        $cutText .= "...";
      }
      return $cutText;
    }
    return $text;
  }

}