<?php
    $usuario = $this->session->userdata("usuario_logado");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?=base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" >

    <script src="<?=base_url('assets/js/bootstrap.min.js'); ?>" > </script>
    <script src="<?=base_url('assets/js/jquery-3.5.1.slim.min.js'); ?>"> </script>
    <script src="<?=base_url('assets/js/popper.min.js'); ?>" > </script>
    

</head>
<body>
    <div class="container">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link active" href="#">Active</a>
            </li>
            
            <?php if ($usuario) { ?>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('/inicio/sobre'); ?>" >Sobre</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('/usuario/pesquisa?nome='); ?>" >Lista de Usuários</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('/usuario/novo'); ?>" >Novo Usuário </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('/usuario/lista_players'); ?>" >Lista de Players</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('/usuario/novoP'); ?>" >Novo Player</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('/usuario/lista_staff'); ?>" >Lista da Staff</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('/usuario/novoS'); ?>" >Novo Staff</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('/login/logoff'); ?>" >Logoff</a>
            </li>
            <?php } else { ?>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('/inicio/sobre'); ?>" >Sobre</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="<?=base_url('/usuario/lista'); ?>" >Lista de Usuários</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('/usuario/lista_staff'); ?>" >Lista da Staff</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('/login'); ?>" >Login</a>
            </li>
            <?php } ?>
        </ul>
    </div>

    <?php 
        if ($usuario) {
            $nome = $usuario["nome"];
            echo "<h3> Bem-vindo(a) $nome. </h3>";
        }
        else{
            //echo "<h3>Não Logado<h3>";
            // $dado = array("login" => $email);
            // $this->load->view("view_menu");
            // $this->load->view("login", $dado);
        }
    ?>    

</body>
</html>