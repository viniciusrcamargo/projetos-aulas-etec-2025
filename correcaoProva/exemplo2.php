<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora Simples</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f4f4f4;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        input[type="number"], button {
            padding: 10px;
            margin: 8px 0;
            border-radius: 4px;
            border: 1px solid #ddd;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        p {
            font-size: 1.2em;
            color: #333;
            margin-top: 20px;
        }
        .error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Somador de Números</h1>

        <form action="" method="POST">
            <label for="numero1">Número 1:</label>
            <input type="number" id="numero1" name="numero1" required>
            <br>
            <label for="numero2">Número 2:</label>
            <input type="number" id="numero2" name="numero2" required>
            <br>
            <button type="submit">Somar</button>
        </form>

        <?php
        // Verifica se o formulário foi enviado usando o método POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Verifica se os campos numero1 e numero2 foram preenchidos
            if (isset($_POST["numero1"]) && isset($_POST["numero2"])) {
                // Obtém os valores dos inputs
                $numero1 = $_POST["numero1"];
                $numero2 = $_POST["numero2"];

                // Converte os valores para float para garantir que a soma seja numérica
                // Mesmo que o input seja "number", eles chegam como strings do formulário
                $num1_float = floatval($numero1);
                $num2_float = floatval($numero2);

                // Realiza a soma
                $soma = $num1_float + $num2_float;

                // Exibe o resultado dentro de uma tag p
                echo "<p>A soma é: <strong>" . htmlspecialchars($soma) . "</strong></p>";
            } else {
                // Mensagem de erro caso algum campo esteja faltando
                echo "<p class='error'>Por favor, preencha ambos os números.</p>";
            }
        }
        ?>
    </div>
</body>
</html>