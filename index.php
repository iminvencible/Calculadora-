<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Tabuadas</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f5f5f5;
        }

        .container{
            background-color: #f5f5f5;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        input[type="number"] {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }

        input[type="number"]:focus {
            border-color: #4CAF50;
            outline: none;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        button:hover {
            background-color: #45a049;
        }

        .result {
            margin-top: 30px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
            border-left: 4px solid #4CAF50;
        }

        .multiplication-table {
            list-style: none;
            padding: 0;
        }

        .multiplication-table li {
            padding: 8px 0;
            border-bottom: 1px solid #eee;
            font-size: 18px;
        }

        .multiplication-table li:last-child {
            border-bottom: none;
        }

        .error {
            color: #d32f2f;
            background-color: #ffebee;
            border-left: 4px solid #d32f2f;
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Calculadora de Tabuada</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="numero">Digite um número para ver a tabuada</label>
                <input type="number" id="number" name="numero" min="1" max="100" value="<?php echo isset($_POST['numero']) ? htmlspecialchars($_POST['numero']) : ''; ?>" required>
            </div>
            <button type="submit">Gerar tabuada</button>
        </form>

        <?php 
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $numero = $_POST['numero'];

            if (is_numeric($numero) && $numero > 0 && $numero <= 100) {
                $numero = (int)$numero;
                echo "<div class='result'>";
                echo "<h2>Tabuada do $numero:</h2>";
                echo "<ul class='multiplication-table'>";

                for ($i=1; $i <= 10; $i++) { 
                    $resultado = $numero * $i;
                    echo "<li>$numero x $i = $resultado</li>";
                }

                echo "</ul>";
                echo "</div>";
            } else {
                echo "<div class='error'>";
                echo "<strong>Erro:</strong> Por favor digite um número entre 1 a 100.";
                echo "</div>";
            }
        }
        ?>
    </div>
</body>
</html>