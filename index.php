<?php

$n1 = intval($_POST["number1"]);
$n2 = intval($_POST["number2"]);
$operator = $_POST["operator"];

function check_operation($n1, $n2, $operator) {
  switch ($operator) {
    case '+':
      return $n1 + $n2;;
      break;
      
      case '-':
        return $n1 - $n2;;
        break;
        
        case '/':
          if ($n2 === 0) {
            throw new Exception("Division by Zero is now allowed");
          }
          return $n1 / $n2;;
          break;
          
          case '*':
            return $n1 * $n2;;
            break;
            
            default:
            return "Can't handle this operation";
            break;
          }
        }
        
        try {
          $result = check_operation($n1, $n2, $operator);
      } catch (Exception $error) {
        $result = $error->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
    </head>
    <body>
        
    <form method="post">
      <input type="number" name="number1" id="number1" required />
      <input type="number" name="number2" id="number2" required />
      <div>
        <select name="operator" id="operator" required >
          <option value="/">/</option>
          <option value="*">*</option>
          <option value="-">-</option>
          <option selected value="+">+</option>
        </select>
      </div>
      <button type="submit">=</button>
      <?php if(isset($n1) && isset($n2) && isset($operator)) { ?>
        <?= $n1, $operator, $n2, ' = ',  $result; ?>
      <?php } ?>
    </form>
    <input hidden="<?= $show_result; ?>" value="<?= $result; ?>"></input>
  </body>
</html>
