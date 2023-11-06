<?php
    include_once "verbindung.php";

    $cod = filter_input(INPUT_GET, "codigo", FILTER_SANITIZE_SPECIAL_CHARS);
    $tip = filter_input(INPUT_GET, "tipo", FILTER_SANITIZE_SPECIAL_CHARS);
    $title = filter_input(INPUT_GET, "titulo", FILTER_SANITIZE_SPECIAL_CHARS);
    $val = str_replace(",", ".", filter_input(INPUT_GET, "valor", FILTER_SANITIZE_SPECIAL_CHARS));

    if($cod > 0){

        $sql = "UPDATE produtos SET tipo = '$tip', titulo = '$title', valor = $val where id = '$cod'; ";

    }else{

        $sql = "INSERT INTO produtos values (null, '$tip', '$title', $val)";
    }

    

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
    //O comando abaixo no meu não compila por isso está comentado,
    //surgiro descomentarem esse código e testar no de vcs.
    //mysqli_close();
?>