<?php

//Assim como no index e na página que salva os dados é chamada a conexão aqui.
    include_once "verbindung.php";

//Semelhante a página "fertig" que salva os dados ele utiliza o método GET porém aqui só é necessário "pegar" o dado do código.

    $cod = filter_input(INPUT_GET, "codigo", FILTER_SANITIZE_SPECIAL_CHARS);


    $sql = "DELETE FROM produtos WHERE id = $cod";


//A mesma coisa da página "fertig" só que aqui ele recebe a variável com o comando SQL "DELETE FROM".

    $loschen = mysqli_query($verbindung, $sql);

    if($loschen){
        echo "
        <script>
            alert('Excluído com sucesso!');
            window.location.href='index.php';
        </script>
        ";
    }else{
        echo "
        <script>
            alert('Erro ao excluir!');
            window.location.href='index.php';
        </script>
        ";    }

    //mysqli_close();
?>
