<nav class="navbar navbar-light">
  <a class="navbar-brand" href="#">
    <img src="<?= ROOT ?>/img/logo.png" alt="Locadora Gold" width="120">
  </a>
  <span class="navbar-text">
      <?php echo strtoupper($_SESSION[SS_NAME]); ?>
      <i class="material-icons float-right ml-3 text-danger">account_circle</i>
    </span>
</nav>