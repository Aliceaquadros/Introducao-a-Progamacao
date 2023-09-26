<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <title>Calcular IMC</title>
</head>

<body>
     <p>Entre com <b>Peso</b> e <b>Altura</b></p>

     <form>
         Peso: <input name="peso">
         <br />
         Altura: <input name="altura">
         <br />
         <button>Calcular IMC</button>
     </form>

    <?php
       
       if (isset($_GET["peso"]) ) {


         $peso = $_GET["peso"];
         $altura = $_GET["altura"];
         $imc = $peso/($altura * $altura);
         echo "<p>Seu IMC é $imc</p>";
         if ($imc <= 18.5) {
            echo "<p>Abaixo do peso normal</p)";
         } else if ($imc <= 24.9) {
            echo "<p>Peso normal</p>";
         } else if ($imc <= 29.9) {
            echo "<p>Excesso de peso</p>";
         } else if ($imc <= 34.9) {
            echo "<p>Obesidade classe I</p>";
         } else if ($imc <= 39.9) {
            echo "<p>Obesidade classe II</p>";
         } else {
            echo "<p>Obesidade classe III</p>";
         }  
       }   
     ?>

</body>


</html>
           

