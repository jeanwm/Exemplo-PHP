<?php
    require_once("conexaoBanco.php");

    $nome = $_POST['nome'];
    $cargaHoraria = $_POST['cargaHoraria'];

    $sql = " INSERT INTO cursos (nomeCurso, cargaHorariaCurso)
            VALUES ('".$nome."','".$cargaHoraria."') ";
    echo $sql;
    $resultado = mysqli_query($conexao, $sql);

    if($resultado==true){
        header("Location: ../index.php");
    }
    else{
        echo "<script>
                alert('Ocorreu um erro')
              </script>";
        header("Location: ../index.php");
    }
?>