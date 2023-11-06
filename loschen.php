<?php
    include_once "verbindung.php";

    $cod = filter_input(INPUT_GET, "codigo", FILTER_SANITIZE_SPECIAL_CHARS);


    $sql = "DELETE FROM produtos WHERE id = $cod";



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