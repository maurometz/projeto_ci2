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
    <title>Document</title>
    <style> 
        .erro {color: #f00}
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Novo Usuário</h1>
            <div class="col-md-6">
            <?= form_open('usuario/gravar');  ?>
                <div class="form_group">
                    <label for="nome">Nome</label><span class="erro"><?php echo form_error('nome') ? : '' ?>
                    <input type="text" name="nome" id="nome" value="<?= set_value('nome') ? : (isset($nome) ? $nome : '') ?>" class="form-control" autofocus/>
                </div>
                <div class="form_group">
                <label for="email">E-mail</label><span class="erro"><?php echo form_error('email') ? : '' ?> </span>
                    <input type="email" name="email" id="email" value="<?= set_value('email') ? : (isset($email) ? $email : '') ?>" class="form-control" />
                </div>
                <div class="form_group">
                <label for="senha">Senha</label><span class="erro"><?php echo form_error('senha') ? : '' ?> </span>
                    <input type="password" name="senha" id="senha" value="<?= set_value('senha') ? : (isset($senha) ? $senha : '') ?>" class="form-control" />
                </div>
                <div class="form_group">
                <label for="aniversario">Aniversário</label><span class="erro"><?php echo form_error('aniversario') ? : '' ?> </span>
                    <input type="text" name="aniversario" id="aniversario" value="<?= set_value('aniversario') ? : (isset($aniversario) ? $aniversario : '') ?>" class="form-control" />
                </div>
                <div class="form_group">
                <label for="cpf">CPF</label><span class="erro"><?php echo form_error('cpf') ? : '' ?> </span>
                    <input type="text" name="cpf" id="cpf" value="<?= set_value('cpf') ? : (isset($cpf) ? $cpf : '') ?>" class="form-control" />
                </div>
                <div class="form_group">
                <label for="genero">Gênero</label><span class="erro"><?php echo form_error('genero') ? : '' ?> </span>
                    <input type="text" name="genero" id="genero" value="<?= set_value('genero') ? : (isset($genero) ? $genero : '') ?>" class="form-control" />
                </div>
                <div class="form_group">
                <label for="estado">Estado</label><span class="erro"><?php echo form_error('estado') ? : '' ?> </span>
                    <input type="text" name="estado" id="estado" value="<?= set_value('estado') ? : (isset($estado) ? $estado : '') ?>" class="form-control" />
                </div>
                <div class="form_group">
                <label for="cidade">Cidade</label><span class="erro"><?php echo form_error('cidade') ? : '' ?> </span>
                    <input type="text" name="cidade" id="cidade" value="<?= set_value('cidade') ? : (isset($cidade) ? $cidade : '') ?>" class="form-control" />
                </div>
                <label for="cidade">Tipo</label><span class="erro"><?php echo form_error('tipo') ? : '' ?> </span>
                    <input type="text" name="tipo" id="tipo" value="<?= set_value('tipo') ? : (isset($tipo) ? $tipo : '') ?>" class="form-control" />
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