<?php
    $usuario = $this->session->userdata("usuario_logado");
    if(!$usuario) {
        redirect("/");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Membro da Staff</title>
    <style> 
        .erro {color: #f00}
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Novo Membro da Staff</h1>
            <div class="col-md-6">
            <?= form_open('usuario/gravarS');  ?>
                <div class="form_group">
                    <label for="nome">Nome</label><span class="erro"><?php echo form_error('nome') ? : '' ?>
                    <input type="text" name="nome" id="nome" value="<?= set_value('nome') ? : (isset($nome) ? $nome : '') ?>" class="form-control" autofocus/>
                </div>
                <div class="form_group">
                <label for="apelido">Apelido</label><span class="erro"><?php echo form_error('apelido') ? : '' ?> </span>
                    <input type="text" name="apelido" id="apelido" value="<?= set_value('apelido') ? : (isset($apelido) ? $apelido : '') ?>" class="form-control" />
                </div>
                <div class="form_group">
                <label for="senha">Dias de Contrato</label><span class="erro"><?php echo form_error('diasContrato') ? : '' ?> </span>
                    <input type="text" name="diasContrato" id="diasContrato" value="<?= set_value('senha') ? : (isset($senha) ? $senha : '') ?>" class="form-control" />
                </div>
                <div class="form_group">
                <label for="genero">Gênero</label><span class="erro"><?php echo form_error('genero') ? : '' ?> </span>
                    <input type="text" name="genero" id="genero" value="<?= set_value('genero') ? : (isset($genero) ? $genero : '') ?>" class="form-control" />
                </div>
                <div class="form_group">
                <label for="email">E-Mail</label><span class="erro"><?php echo form_error('email') ? : '' ?> </span>
                    <input type="email" name="email" id="email" value="<?= set_value('email') ? : (isset($email) ? $email : '') ?>" class="form-control" />
                </div>
                <div class="form_group">
                <label for="anosExperiencia">Anos de Experiência</label><span class="erro"><?php echo form_error('anosExperiencia') ? : '' ?> </span>
                    <input type="text" name="anosExperiencia" id="anosExperiencia" value="<?= set_value('anosExperiencia') ? : (isset($anosExperiencia) ? $anosExperiencia : '') ?>" class="form-control" />
                </div>
                <div class="form_group">
                <label for="funcao">Função</label><span class="erro"><?php echo form_error('funcao') ? : '' ?> </span>
                    <input type="text" name="funcao" id="funcao" value="<?= set_value('funcao') ? : (isset($funcao) ? $funcao : '') ?>" class="form-control" />
                </div>
                <div class="form_group">
                    <input type="submit" value="Salvar" class="btn btn-success"/>
                </div>
                <input type="hidden" name="id" value="<?= set_value('id') ? : (isset($id) ? $id : '') ?>" />
            <?= form_close();   ?>
            </div>

    </div>
</body>
</html>