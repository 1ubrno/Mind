<?php 
include('function.php');
    if(isset($_POST['email'])|| isset($_POST['senha'])) {

        if(strlen($_POST['email'])== 0) {
            echo "preencha seu email";
        } else if (strlen($_POST['senha'])== 0) {
            echo "preencha sua senha";
        } else {
            $email = $mysqli->real_escape_string($_POST['email']);
            $senha = $mysqli->real_escape_string($_POST['senha']);

            $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
            $slq_query = $mysqli->query($sql_code) or die("falha na execução do codigo sql");

            $quantidade = $slq_query->num_rows;
            if($quantidade == 1) {

                $usuario = $slq_query->fetch_assoc();


                    if(isset($_SESSION)) {
                        session_start();
                    }
                        $_SESSION['user'] = $usuario['id'];
                        $_SESSION['name'] = $usuario['nome'];

                        header("location:main.html");
            } else {
                echo "falha ao logar";
            }
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faça seu Login</title>
</head>
<body>
    <main>
       <h1>Acesse sua conta</h1>
        <form action="" method="POST">
            <p>
                <label>E-mail</label>
                <input type="text" name="email">
            </p>
                <p>
                    <label>Senha</label>
                    <input type="password" name="senha" id="">
                </p>
                    <p>
                        <button type="submit">Entrar</button>
                    </p>
        </form>
    </main>
</body>
</html>