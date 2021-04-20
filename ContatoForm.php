<?php
include '../database/bd.php';
include './head.php';

$objBD = new bd();

if (!empty($_POST['nome'])) {
    $dados = [
        "id" => $_POST['id'],
        "nome" => $_POST['nome'], 
        "sobrenome" => $_POST['sobrenome'],
        "tel01" => $_POST['tel01'],
        "tel02" => $_POST['tel02'],
        "tipo01" => $_POST['tipo01'],
        "tipo02" => $_POST['tipo02'],
        "email" => $_POST['email'],
    ];

    if (!empty($_POST['id'])) {
        $objBD->update($dados);
    } else {
        $objBD->insert($dados);
    }

    header("location:ContatoList.php");
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



<form action="ContatoForm.php" method="post">
    <h3>Formulário Contato (mexer no bd)</h3>
    <div class="form-row">
    <div class="form-group col-md-6">
    <input type="text" class="form-control" name="nome" placeholder="Nome" value="<?php echo !empty($result->nome) ? $result->nome : ""; ?>">
    </div>
    <div class="form-group col-md-6">
    <input type="text" class="form-control" name="sobrenome" placeholder="Sobrenome" value="<?php echo !empty($result->sobrenome) ? $result->sobrenome : ""; ?>">
    </div>
    <div class="form-row">
    <div class="form-group col-md-6">
    <input type="text" class="form-control" name="tel01" placeholder="Telefone 01" value="<?php echo !empty($result->tel01) ? $result->tel01 : ""; ?>">
    </div>
    <div class="form-group col-md-6">
    <input type="text" class="form-control" name="tipo01"  placeholder="Tipo Telefone 01" value="<?php echo !empty($result->tipo01) ? $result->tipo01 : ""; ?>">
    </div>
    <div class="form-group col-md-6">
    <input type="text" class="form-control" name="email"  placeholder="nome@example.com" value="<?php echo !empty($result->email) ? $result->email : ""; ?>">
    </div>
    <div class="form-row">
    <div class="form-group col-md-6">
    <input type="text" class="form-control" name="tel02"  placeholder="Telefone 02" value="<?php echo !empty($result->tel02) ? $result->tel02 : ""; ?>">
    </div>
    <div class="form-group col-md-6">
    <input type="text" class="form-control" name="tipo02" placeholder="Tipo Telefone 02" value="<?php echo !empty($result->tipo02) ? $result->tipo02 : ""; ?>">
    </div>
    </div>

    </div>

   
    <button type="submit" class="btn btn-success"> <i class="fas fa-save"></i> Salvar</button>
    <a href="./ContatoList.php" class="btn btn-primary"><i class="fas fa-arrow-left"></i>Voltar</a>
   
</form>
</body>

</html>