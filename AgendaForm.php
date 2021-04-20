<?php
include '../database/bd.php';
include './head.php';

$objBD = new bd();

if (!empty($_POST['nome'])) {
    $dados = [
        "id" => $_POST['id'],
        "nome" => $_POST['nome'], "telefone" => $_POST['telefone'],
        "cpf" => $_POST['cpf']
    ];

    if (!empty($_POST['id'])) {
        $objBD->update($dados);
    } else {
        $objBD->insert($dados);
    }

    header("location:UsuarioList.php");
} elseif (!empty($_GET['id'])) {
    $result = $objBD->find($_GET['id']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>



<form action="AgendaForm.php" method="post">
    <h3>Formulário Agenda</h3>
    <input type="hidden" name="id" value="<?php echo !empty($result->id) ? $result->id : ""; ?>"><br>

    <input type="text" name="nome" id="" value="<?php echo !empty($result->nome) ? $result->nome : "" ?>" required><br>
    <br>
  
    <input type="text" name="telefone" id="" value="<?php echo !empty($result->telefone) ? $result->telefone : "" ?>" required><br>
<br>
 
    <input type="text" name="cpf" id="" value="<?php echo !empty($result->cpf) ? $result->cpf : "" ?>" required><br>
<br>
    <button type="submit" class="btn btn-success"> <i class="fas fa-save"></i> Salvar</button>
    <a href="./ContatoList.php" class="btn btn-primary"><i class="fas fa-arrow-left"></i>Voltar</a>
   
</form>
</body>

</html>