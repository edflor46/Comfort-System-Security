<?php

class Config
{
    public function isAdmin()
    {
        if ($_SESSION['rol'] != 'Administrador') {
            echo '<script>window.location = "inicio"</script>';
        }
    }

    public function isSuperUsuario(){
        if ($_SESSION['rol'] != 'Super Usuario') {
            echo '<script>window.location = "inicio"</script>';
        }
    }
}
