<?php
include("conexao.php");

if (isset($_FILES['arquivo'])) {
    $arquivo = $_FILES['arquivo'];
    if ($arquivo["error"])
        die("falha ao enviar arquivo");

    $pasta = "arquivos/";
    $nomeDoArquivo = $arquivo['name'];
    $novoNomeDoArquivo = uniqid();
    $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

    $path = $pasta . $novoNomeDoArquivo . "." . $extensao;

    if ($extensao !== "jpg" && $extensao !== "png")
        die("Tipo de arquivo não aceito");

    $deu_certo = move_uploaded_file($arquivo["tmp_name"], $path);

    if ($deu_certo) {
        // $mysqli->query("INSERT INTO arquivos(nome, path) VALUES('$nomeDoArquivo', '$path')") or die($mysqli->error);
        $sql = "INSERT INTO `arquivos`(`nome`, `path`) VALUES ('$nomeDoArquivo', '$path')";
        if (mysqli_query($conn, $sql)) {
            echo "Imagem enviada para banco com sucesso.";
        } else {
            echo 'Erro ao enviar pro banco.';
        }
        //echo "Deu certo essa porra aqui";
    } else {
        echo "FALHA AO ENVIAR O ARQUIVO";
    }
}
$sql = "SELECT * FROM arquivos";
$dados = mysqli_query($conn, $sql);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carregar Imagens</title>
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <div class="principal">
        <div class="p-area">
            <form method="POST" action="" enctype="multipart/form-data">
                <label for="">Selecione um arquivo</label>
                <input type="file" name="arquivo">

                <button name="upload">Enviar</button>
            </form>
        </div>




    </div>


</body>

</html>