<?php
include '../database/bd.php';


$objBD = new bd();

if (!empty($_POST['valor'])) {
    $result = $objBD->search($_POST);
} else {
    $result = $objBD->select();
}

if (!empty($_GET['id'])) {
    $objBD->remove($_GET['id']);
    header("location:ContatoList.php");
}

?>
<?php
include "./head.php";
?>

<h4>Listagem de Contatos</h4>
<form action="ContatoList.php" method="post">
    <div class="form-row">
        <div class="col-3">
            <input type="text" class="form-control" placeholder="Digite sua pesquisa..." name="valor" id="">
        </div>
        <div class="col-3">
            <select name="tipo" class="form-control" id="">
                <option value=" nome">Nome</option>
                <option value="cpf">CPF</option>
                <option value="telefone">Telefone</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary"> <i class="fas fa-search"></i> Buscar</button>
        <div class="col-3">
            <a href="./ContatoForm.php" class="btn btn-success"> <i class="fas fa-plus-circle"></i> Cadastrar</a>
        </div>
    </div>
</form>
<p></p>
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Sobrenome</th>
            <th scope="col">Telefone 1</th>
            <th scope="col">Tipo telefone 1</th>
            <th scope="col">Telefone 2</th>
            <th scope="col">Tipo telefone 2</th>
            <th scope="col">Editar</th>
            <th scope="col">Excluir</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($result as $item) {
            $item = (object) $item;
            echo "
        <tr>
            <th scope='row'>" . $item->id . "</th> 
            <td>" . $item->nome . "</td>
            <td>" . $item->sobrenome . "</td>
            <td>" . $item->tel01 . "</td>
            <td>" . $item->tel02 . "</td>
            <td>" . $item->tipo01 . "</td>
            <td>" . $item->tipo02 . "</td>
            <td>" . $item->email . "</td>

            <td><a href='ContatoForm.php?id=" . $item->id . "' style='color:orange;' ><i class='fas fa-edit'></i></a> </td>
            <td><a href='ContatoList.php?id=" . $item->id . "' onclick=\"return confirm('Deseja realmente remover o registro?'); \" style='color:red;'><i class='fas fa-trash'></i></a> </td>
        </tr>
        ";
        }
        ?>
    </tbody>
</table>
<?php
include "./footer.php";
?>