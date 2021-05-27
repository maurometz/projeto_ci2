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
</head>
<body>
    <div class="container">
        <h1 class="text-center">Listagem de Players</h1>
            <div class="row">
              <h3> <?= $players->num_rows();  ?> registro(s) </h3>
              <!-- <?php echo print_r($players); ?> -->
            </div>

            <?php echo form_open('usuario/pesquisaP', 'method="get'); ?>
            <table>
                <tr>
                    <td><input placeholder="Nome do jogador" type="text" name="nome"> </td>
                    <td><input type="submit" value="Pesquisar"> </td>
                </tr>
            </table>
        <?php echo form_close(); ?>

            <?php if ($usuario["tipo"]=="adm") { ?>
            <a href="<?php echo base_url('usuario/exportaP'); ?>" class="link blue float-right">Exportar Players</a>
            <?php } ?>

        <?php if ($players->num_rows() > 0) { ?>
            <table class="table table-striped">
                <thead>

                        <!-- <th>Id<th> -->
                        <th>Nome</th>
                        <th>Apelido</th>
                        <th>Dias Contrato</th>
                        <th>Anos de Experiência</th>
                        <th>Gênero</th>
                        <th>E-mail</th>
                        <th>Títulos</th>
                        <?php if ($usuario["tipo"]=="adm") { ?>
                        <th>Ações<th>
                        <?php } ?>
                </thead>
                <tbody>
                    <?php foreach($players -> result() as $cadastroP) { ?>
                    <tr>
                            
                            <td><?= $cadastroP->nome ?></td>
                            <td><?= $cadastroP->apelido ?></td>
                            <td><?= $cadastroP->diasContrato ?></td>
                            <td><?= $cadastroP->anosExperiencia ?></td>
                            <td><?= $cadastroP->genero ?></td>
                            <td><?= $cadastroP->email ?></td>
                            <td><?= $cadastroP->titulos ?></td>
                            <!-- <td><?= $cadastroP->id ?> Id</td> -->
                            <?php if ($usuario["tipo"]=="adm") { ?>
                            <td><?= anchor("usuario/editarP/$cadastroP->id", "Editar") ?> 
                            <a href="#" class='confirma_exclusao' 
                            data-id="<?= $cadastroP->id ?>" 
                            data-nome="<?= $cadastroP->nome ?>" />Excluir</a> </td>
                            <?php } ?>
                    </tr>
                  <?php  } ?>
                </tbody>
            </table>
            <?php
                echo $this->pagination->create_links();
            ?>

        <?php } ?>

        </div>

        <!-- <?= anchor("usuario/excluirP/$cadastroP->id", "Excluir") ?></td> -->

        <div class="modal fade" id="modal_confirmation">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Confirmação de Exclusão</h4>
        </div>
        <div class="modal-body">
            <p> Deseja realmente excluir o registro <strong><span id="nome_exclusao"></span></strong>?</p>
        </div>    
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"> Agora não </button>
            <button type="button" class="btn btn-danger" id="btn_excluir"> Sim, confirmar. </button>
        </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script src="<?=base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>

    <script>
        var base_url = "<?=base_url(); ?>";
            $(function(){
                $('.confirma_exclusao').on('click', function(e){
                    e.preventDefault();
                    var nome = $(this).data('nome');
                    var id = $(this).data('id');

                    $('#modal_confirmation').data('nome', nome);
                    $('#modal_confirmation').data('id', id);
                    $('#modal_confirmation').modal('show');
                });

            $('#modal_confirmation').on('show.bs.modal', function(){
                var nome = $(this).data('nome');
                $('nome_exclusao').text(nome);
            });
            $('#btn_excluir').click(function(){
                var id = $('#modal_confirmation').data('id');
                document.location.href = base_url + "usuario/excluirP/" + id;
            });
        });
                
                </script>                    
    
</body>
</html>

