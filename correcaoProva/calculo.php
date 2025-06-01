<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo</title>
</head>
<body>
    <h1>Cálculo de dois números</h1>

    <form action="" method="POST">
        <label for="num1">Número 1</label>
        <input type="number" id="num1" name="num1" required><br><br>
        <label for="num2">Número 2</label>
        <input type="number" id="num2" name="num2" required><br><br>
        <button type="submit">Somar</button>
    </form>

    <?php 
        //Verifica se o método enviado ao servidor é o método POST
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $num1 = $_POST['num1'];//informa qual campo do formulário vai receber
            $num2 = $_POST['num2'];

            $soma = $num1 + $num2;

            echo "<p>A soma dos números é $soma</p>";
        }
    ?>
</body>
</html>