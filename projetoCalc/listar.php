<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="ISO 8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calculadora - Listar</title>
</head>
<body>
    <?php 
        function listar(){
            $con = new mysqli("localhost", "root", "", "devweb2_projetocalc");

            $stmt = $con->prepare("select * from operacoes order by id");

            $stmt->execute();

            $result = $stmt->get_result();

            while ($row = $result->fetch_array()){
                echo
                "<p>",
                $row["numero1"], "", $row["operador"], "", $row["numero2"], "=", $row["resultado"],
                "</p>";
            }

            $result->close();

            $stmt->close();

            $con->close();

        }

        listar();

    ?>

    <p>
        <a href="index.php"> Voltar</a>
    </p>
</body>
</html>