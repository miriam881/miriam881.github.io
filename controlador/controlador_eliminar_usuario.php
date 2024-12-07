<?php 
if (!empty($_GET["id"])) {
    $id=$_GET["id"];
    $sql=$conexion->query("delete from usuario where id_usuario=$id ");
    if ($sql == true) {
         ?>
            <script>
                $(function notification(){
                    new PNotify({
                        title: "CORRECTO",
                        type: "success",
                        text: "usuario eliminado correctamente",
                        styling: "bootstrap3",
                    })
                })
            </script>
                
        <?php
        
    } else {
        ?>
        <script>
                $(function notification(){
                    new PNotify({
                        title: "INCORRECTO",
                        type: "error",
                        text: "error al eliminar al usuario",
                        styling: "bootstrap3",
                    })
                })
            </script>
        <?php
    }
    ?>
    <script>
        setTimeout(() => {
            window.history.replaceState(null, null, window.location.pathname);

        }, 0);
    </script>
    <?php
    
    
}
?>