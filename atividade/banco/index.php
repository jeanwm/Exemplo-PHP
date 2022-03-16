<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Página Principal</title>
</head>

<script>
    function limparCampos(){
        document.getElementById("nomeCurso").value = "";
        document.getElementById("cargaCurso").value = "";
    }
</script>

<body>
    <section id="cadastro">
        <div class="cadastro">
            <h1>Cadastro de Cursos</h1>

            <form action="php/cadastro.php" method="POST">
                <label for="nome" name="campo">Nome do curso: </label>
                <input type="text" name="nome" id="nomeCurso">
                <br>

                <br>
                <label for="carga" name="campo">Carga horária: </label>
                <input type="text" name="cargaHoraria" id="cargaCurso">
                <br>

                <br>
                <button type="button" class="botao" value="Limpar" onclick="limparCampos()">Limpar</button>
                <button type="submit" class="botao" value="Cadastrar">Cadastrar</button>
            </form>
        </div>

        <div class="consulta">
            <h1>Consulta de cursos</h1>

            <form action="#" method="GET">
                <label for="busca" id="campo">Nome do curso: </label>
                <input type="text" name="buscaNome"> 
                <button type="submit" class="botao">
                    <img src="img/lupa.png" id="lupa" width="20px">
                </button>   
            </form>  
            
            <table> 
                <br>
                <th>Nome</th>
                <th>Carga horária</th>
                <th>Ações</th>

                <?php 
                    require_once("php/conexaoBanco.php");
                    $sql = "";

                    if(isset($_GET['buscaNome']) && $_GET['buscaNome'] != ""){
                        $nomeCurso = $_GET['buscaNome'];
                        $sql = " SELECT * FROM cursos WHERE nomeCurso LIKE '" . $nomeCurso . "%'";
                    }

                    else{
                        $sql = " SELECT * FROM cursos";
                    }

                    $resultado = mysqli_query($conexao, $sql);
                    $linhas = mysqli_num_rows($resultado);

                    if($linhas == 0) { ?>
                        <tr>
                            <td colspan='3'>
                                Nenhum curso encontrado.
                            </td>
                        </tr>
                    
                    <?php 
                        }
                        else{
                            $arrayCursos = array();

                            while($cadaCurso = mysqli_fetch_assoc($resultado)){
                                $idCurso = $cadaCurso['idCurso'];
                                $nomeCurso = $cadaCurso['nomeCurso'];
                                $cargaHoraria = $cadaCurso['cargaHorariaCurso'];
                            ?>

                            <tr>
                                <td><?= $nomeCurso ?></td>
                                <td><?= $cargaHoraria ?></td>
                                
                                <td>
                                    <form action="php/editarCursoForm.php" method="POST">
                                        <input type="hidden" name="idCurso" value="<?= $cadaCurso['idCurso'] ?>">

                                        <button type="submit">
                                            <img src="img/editar.png" alt="Editar">
                                        </button>
                                    </form>
                                </td>

                                <td>
                                    <form action="php/excluirCurso.php" method="POST">
                                        <input type="hidden" name="idCurso" value="<?= $cadaCurso['idCurso'] ?>">

                                        <button type="submit">
                                            <img src="img/excluir.png" alt="Excluir">
                                        </button>
                                    </form>
                                </td>
                            </tr>
                         
                        <?php
                            }
                        }
                    ?>
            </table>
        </div>
    </section>
</body>
</html>