<?php

//Aqui é "chamada" a página que faz a conexão com o banco de dados
    include_once "verbindung.php";
?>

//Página inicial que contem a tabela de cadastro de produtos e exibe os produtos cadastrados

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Sodoma</title>
</head>
<body>
    <div id="overlay" class="overlay">
        <div id="prompt-container" class="prompt-container">
            <p>BEM VINDO À SODOMA!!</p>
            <p>Cadastre seu e-mail e ganhe 10% OFF!</p>
            <input type="text" id="emailInput" placeholder="Seu e-mail">
            <input type="text" id="senhaInput" placeholder="Sua senha">
            <button onclick="solicitarEmail()">Entrar</button>
            <button onclick="fecharOverlay()">Cancelar</button>
        </div>
    </div>

    <script src="script.js"></script>
    <div class="container">
        <div class="row">
            <div class="col6">
                <h2>Cadastro de produtos</h2>
            </div>
        </div>

        <div class="formul">

            //É utilizado o método GET para pegar os dados digitados nos campos do formulário e salvar
            //na tabela do banco de dados já criado anteriormente e atrvés do "action" que no seu parâmetro é passado a página referente
            //com os comandos que realizam esse processo.
            
            <form method="GET" action="fertig.php">
        
                <div>
                    <input type="text" id=tipo name="tipo"
                    value="<?php echo filter_input(INPUT_GET, "tipo", FILTER_SANITIZE_SPECIAL_CHARS);?>">
                    <label for="codigo">Tipo de produto</label>
                </div>
                <div>
                    <input type="text" id=titulo name="titulo"
                    value="<?php echo filter_input(INPUT_GET, "titulo", FILTER_SANITIZE_SPECIAL_CHARS);?>">
                    <label for="codigo">Título/Modelo</label>
                </div>
                <div>
                    <input type="text" id=valor name="valor"
                    value="<?php echo filter_input(INPUT_GET, "valor", FILTER_SANITIZE_SPECIAL_CHARS);?>">
                    <label for="codigo">Valor</label>
                </div>

                <div>
                    <div class="row">
                        <div class="col">
                            <a href="index.php">
                            <button type="button" class="btn">Limpar</button>
                            </a>
                            <button type="submit" class="btn">Salvar</button>
                        </div>
                    </div>

                </div>
            </form>

        </div>
    </div>

    <div class="container">

        <div class="row">
            <div class="table">
                <table class="table" border="1">
                    <thead class="table">
                        <tr>
                            <th>Código</th>
                            <th>Tipo do produto</th>
                            <th>Título/modelo</th>
                            <th>Valor</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                    //Aqui está sendo utilizado código SQL passado através de variáveis e funções em PHP
                    //para fazer uma varredura na tabela do banco de dados e coletar os dados da mesma e exibi-las.

                        $sql = "Select * from produtos";
                        $suchen = mysqli_query($verbindung, $sql);

                        while ($row = $suchen->fetch_assoc()){
                            echo "
                            <tr>
                                <td>".$row['id']."</td>
                                <td>".$row['tipo']."</td>
                                <td>".$row['titulo']."</td>
                                <td>".$row['valor']."</td>
                                <td>
                                    <a href='?
                                    codigo=".$row['id']."&
                                    tipo=".$row['tipo']."&
                                    titulo=".$row['titulo']."&
                                    valor=".$row['valor']."'>
                                        <img src='images/bearbeiten.png' class = 'imgtable'>
                                    </a>
                                </td>

                                <td>
                                    <a href='loschen.php?codigo=".$row['id']."'>
                                        <img src='images/loschen.png' class = 'imgtable'>
                                    </a>
                                </td>
                            </tr>";
                        }
                        
                        ?>
                    </tbody>

                </table>
            </div>
        </div>

    </div>
    
</body>
</html>
