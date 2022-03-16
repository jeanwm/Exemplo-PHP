<?php
    require_once("conexaoBanco.php");

    $idCurso = $_POST['idCurso'];
    $nomeCurso = $_POST['nome'];
    $cargaHoraria = $_POST['cargaHoraria'];

    $sql = " UPDATE cursos SET nomeCurso ='". $nomeCurso ."', cargaHorariaCurso = '". $cargaHoraria ."' WHERE idCurso = ". $idCurso;

    $resultado = mysqli_query($conexao, $sql);

    if($resultado == true){
        header("Location: ../index.php");
    } 
    else{
        echo "<script>
                alert('Ocorreu um erro')
              </script>";
        header("Location: ../index.php");
    }
?>