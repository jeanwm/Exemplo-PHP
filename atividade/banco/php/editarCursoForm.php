<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/geral.css">
    <title>Página de Edição</title>
</head>

<script>
    function limparCampos(){
        document.getElementById("nomeCurso").value = "";
        document.getElementById("cargaCurso").value = "";
    }
</script>

<body>  
    <section id="edicao">
        <div class="edicao">
            <h1>Edição de Cursos</h1>

            <?php 
                require_once("conexaoBanco.php");

                $idCurso = $_POST['idCurso'];

                $sql = " SELECT * FROM cursos WHERE idCurso=". $idCurso;

                $resultado = mysqli_query($conexao,$sql);
                $retorno = mysqli_fetch_assoc($resultado);  
            ?>

            <form action="editarCurso.php" method="POST">
                <input type="hidden" name="idCurso" value="<?= $retorno['idCurso'] ?>">

                <label for="nome" class="campo">Nome do curso: </label>
                <input type="text" name="nome" id="nomeCurso" value="<?= $retorno['nomeCurso'] ?>">
                <br>

                <br>
                <label for="carga" class="campo">Carga horária: </label>
                <input type="text" name="cargaHoraria" id="cargaCurso" value="<?= $retorno['cargaHorariaCurso'] ?>">
                <br>

                <br>
                <button type="button" class="botao" value="Limpar" onclick="return limparCampos()">Limpar</button>
                <button type="submit" class="botao" value="Editar">Editar</button>
            </form>
        </div>
</body>
</html>