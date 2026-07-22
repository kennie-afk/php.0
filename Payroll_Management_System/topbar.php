<nav class="navbar navbar-light fixed-top">
  <div class="topbar-inner">
    <div class="topbar-brand">
      <i class="fa fa-leaf" style="color:var(--yellow);font-size:15px;"></i>
      <span>Five</span>Senses <span style="color:rgba(255,255,255,.5);font-weight:400;margin-left:2px;">Payroll</span>
    </div>
    <div class="topbar-user">
      <div class="topbar-avatar"><?php echo strtoupper(substr($_SESSION['login_name'],0,1)); ?></div>
      <span class="topbar-name"><?php echo htmlspecialchars($_SESSION['login_name']); ?></span>
      <a href="ajax.php?action=logout" class="topbar-logout"><i class="fa fa-sign-out-alt"></i> Sign out</a>
    </div>
  </div>
</nav>
