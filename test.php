<?php


$name = $_GET['q'];
$json = file_get_contents(__DIR__ . "/uploads/$name.json");
$data = json_decode($json, true);
$answers = $data[5];


?>

<!DOCTYPE html>
<html>
<head>
	<title>Тест</title>
</head>
<body>
	<form action="" method="POST">

  <?php for ($i = 1; $i < 5; $i++) { ?>

      <p><?php echo $data[$i]["question"]?></p>

        <?php foreach ($data[$i]["options"] as $key => $value) : ?>

          <input type="radio" name="question<?php echo $i ?>" value="<?php echo $key ?>"><?php echo $value ?>
        
        <?php endforeach ; ?>
  
  <?php } ?> 
  <br>
  <input type="submit" name="submit" value="Ответить"> 

   </form>
   
<?php

$correctAnswers = [];
$wrongAnswers = [];
if (isset($_POST['submit'])) {
    
    foreach ($_POST as $keySubmit => $valueSubmit) {

      foreach ($answers as $keyAnswer => $valueAnswer) {

        if ($keySubmit == $keyAnswer) {
          
          if ($valueSubmit == $valueAnswer) {
            
            $correctAnswers[] = $keyAnswer;
            
          }
          else {
            
            $wrongAnswers[] = $keyAnswer;
          
          }
        }
      
      
    }
  }
  echo "Правильные ответы:";
  $commaList = implode(', ', $correctAnswers);
  echo($commaList);
 } 
  
  

?>


</body>
</html>


