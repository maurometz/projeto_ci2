<div class="container">
<?php

?>
    <table>
        <tr>
            <td>Nome</td>
            <td>Email</td>
            <td>Senha</td>
        </tr>
        <?php
            foreach ($usuarios as $usuario) {
        ?>
        <tr>
            <td><?php echo $usuario['nome'] ?></td>
            <td><?php echo $usuario['email'] ?></td>
            <td><?php echo $usuario['senha'] ?></td>
        </tr>
        <?php
            }
        ?>

    </table>



<?php

    // foreach ($usuarios as $usuario) {
    //     echo $usuario ['nome'];
    // }

?>

</div>