<div class="menu-lateral">

    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link rounded-0 <?php echo (!isset($_GET['window']) or $_GET['window']=='home') ? 'active' : ''; ?>" id="v-pills-home-tab" href="." role="tab" aria-controls="v-pills-home" aria-selected="true">
        <i class="material-icons float-left mr-3">home</i> inicio
      </a>
      <a class="nav-link rounded-0 <?php echo (isset($_GET['window']) and $_GET['window']=='funcionario') ? 'active' : ''; ?>" id="v-pills-messages-tab" href="?window=funcionario" role="tab" aria-controls="v-pills-messages" aria-selected="false">
        <i class="material-icons float-left mr-3">assignment_ind</i> Funcionarios
      </a>
      <a class="nav-link rounded-0 <?php echo (isset($_GET['window']) and $_GET['window']=='cliente') ? 'active' : ''; ?>" id="v-pills-messages-tab" href="?window=cliente" role="tab" aria-controls="v-pills-messages" aria-selected="false">
        <i class="material-icons float-left mr-3">person</i> Clientes
      </a>
      <a class="nav-link rounded-0 <?php echo (isset($_GET['window']) and $_GET['window']=='aluguel') ? 'active' : ''; ?>" id="v-pills-settings-tab" href="?window=aluguel" role="tab" aria-controls="v-pills-settings" aria-selected="false">
        <i class="material-icons float-left mr-3">shopping_cart</i> Alugar
      </a>
      <a class="nav-link rounded-0 <?php echo (isset($_GET['window']) and $_GET['window']=='carro') ? 'active' : ''; ?>" id="v-pills-settings-tab" href="?window=carro" role="tab" aria-controls="v-pills-settings" aria-selected="false">
        <i class="material-icons float-left mr-3">directions_car</i> Carros
      </a>
      <a class="nav-link rounded-0 <?php echo (isset($_GET['window']) and $_GET['window']=='usuario') ? 'active' : ''; ?>" id="v-pills-settings-tab" href="?window=usuario" role="tab" aria-controls="v-pills-settings" aria-selected="false">
        <i class="material-icons float-left mr-3">account_circle</i> Usuários
      </a>
      <a class="nav-link rounded-0 mt-5" id="v-pills-settings-tab" href="?window=login&action=sair" role="tab" aria-controls="v-pills-settings" aria-selected="false">
        <i class="material-icons float-left mr-3">exit_to_app</i> Sair
      </a>
    </div>

</div>

<div id="conteudo" class=" w-75 pl-3 pr-4" style="margin-left: 23%;margin-top: 3%;">