<form method="post" action="?action=entrar">

	<div class="d-block w-25 mt-5" style="margin: 0 auto;">
		<center><img src="<?= ROOT ?>/img/logo.png" class="mb-5" width="260"></center>
		<div class="row">
			<div class="col-12">
				<label>Usuario:</label>
				<input type="text" name="app_login" class="form-control form-control-sm" placeholder="Digite usuario" maxlength="100" required>
			</div>
			<div class="col-12">
				<label>Senha:</label>
				<input type="password" name="app_senha" class="form-control form-control-sm" placeholder="Digite sua senha" maxlength="100" reduired>
			</div>
			<div class="col-12">
				<button type="submit" class="btn btn-outline-danger btn-sm btn-block mt-4" onclick="actionLogin();">Entrar</button>
			</div>
			<div class="col-12">
				<br>
				<?php Controller\Message::getMessage( 'Login' ); ?>
				<!--<div class="alert alert-warning text-center">Espaço de Alerta!!</div>-->
			</div>
		</div>
	</div>

</form>
