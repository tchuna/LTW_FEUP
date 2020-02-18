<?php

  function getSum($num1, $num2)
  {
      $sum = $num1 + $num2;
      echo "Sum of the two numbers $num1 and $num2 is : $sum";
  }

  getSum($_GET['num1'], $_GET['num2']);
?>
