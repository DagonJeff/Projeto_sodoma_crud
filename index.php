<?php
    include_once "verbindung.php";
?>

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
            <div class="col">
                <h2>Cadastro de produtos</h2>
            </div>
        </div>

        <div class="formul">

            <form method="GET" action="fertig.php">
                <div>
                    <input type="number" id=codigo name="codigo" readonly 
                    value="<?php echo filter_input(INPUT_GET, "codigo", FILTER_SANITIZE_SPECIAL_CHARS);?>">
                    <label for="codigo">Código</label>
                </div>
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
                            <button type="button" class="btn">Novo</button>
                            </a>
                        </div>
                        <div class="col">
                            <button type="submit" class="btn">Salvar</button>
                        </div>
                    </div>

                </div>
            </form>

        </div>
    </div>

    <div class="container">

        <div class="row">
            <div class="col">
                <table class="table" border="1">
                    <thead>
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
