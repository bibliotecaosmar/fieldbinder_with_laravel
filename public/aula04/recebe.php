<?php
	if(empty($_POST)){
		echo '<script>location.href="form.html";</script>';
		//   header("Location: cadastrar.php");
	}
?>

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
		<meta charset="utf-8">

<div class="col-md-8 offset-2">
	<h2>Dados de Cadastro</h2><hr>
	<table class="table table-stripped">
		<tbody>
			<tr>
				<td>Nome</td>
				<td><?=$_POST['nome_completo']; ?></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><?=$_POST['email']; ?></td>
			</tr>
			<tr>
				<td>CPF</td>
				<td><?=$_POST['cpf']; ?></td>
			</tr>
			<tr>
				<td>Telefone</td>
				<td><?=$_POST['telefone']; ?></td>
			</tr>
			<tr>
				<td>Senha</td>
				<td><?=sha1($_POST['email']); ?></td>
			</tr>
		</tbody>
	</table>
	<button class="btn btn-warning btn-block" onClick="window.print();">
		<i class="fa fa-print"> Imprimir</i>
	</button></td>
</div>


<table class="table table-stripped">
	<thead>
		<th>Nome</th>
		<th>Email</th>
		<th>Telefone</th>
	</thead>
	<tbody>
		<tr>
			<td>Matheus</td>
			<td>matheus@email.com</td>
			<td>(85) 99565-5564</td>
		</tr>
	</tbody>

</table>