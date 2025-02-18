<?php

//Chamando a página php referente a conexão
    include_once "verbindung.php";

//Utilizando o método GET que já foi invocado na página index aqui ele "trata" os dados que vem de lá e salva no banco de dados

    $cod = filter_input(INPUT_GET, "codigo", FILTER_SANITIZE_SPECIAL_CHARS);
    $tip = filter_input(INPUT_GET, "tipo", FILTER_SANITIZE_SPECIAL_CHARS);
    $title = filter_input(INPUT_GET, "titulo", FILTER_SANITIZE_SPECIAL_CHARS);
    $val = str_replace(",", ".", filter_input(INPUT_GET, "valor", FILTER_SANITIZE_SPECIAL_CHARS));

    if($cod > 0){

    //Se o cod do produto for maior que 0 significa que ele já existe então ele faz a atualização dos dados já existentes
        
        $sql = "UPDATE produtos SET tipo = '$tip', titulo = '$title', valor = $val where id = '$cod'; ";

    }else{

    //Senão o produto ainda não existe então é criado e inserido esses novos dados na tabela do banco de dados.
        
        $sql = "INSERT INTO produtos values (null, '$tip', '$title', $val)";
    }

    
    //Essa variável recebe o comando mysqli_query que é passado no seu parametro a conexão e o comando sql salvos também na variável anteriormente.
    $einfugen = mysqli_query($verbindung, $sql);

    if($einfugen){
        echo "
        <script>
            alert('Salvo com sucesso!');
            window.location.href='index.php';
        </script>
        ";
    }else{
        echo "
        <script>
            alert('Erro ao salvar!');
            window.location.href='index.php';
        </script>
        ";    }

    //mysqli_close();
?>
