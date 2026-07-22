<header class="main-header">
  <a href="<?php echo site_url('dashboard') ?>" class="logo">
    <span class="logo-mini"><b>R</b></span>
    <span class="logo-lg"><b>RMS</b></span>
  </a>
  <nav class="navbar navbar-static-top">
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button"></a>
    <div class="navbar-custom-menu">
      <?php $uname = $this->session->userdata('username'); ?>
      <div class="topbar-user">
        <div class="topbar-avatar"><?php echo $uname ? strtoupper(substr($uname,0,1)) : 'U'; ?></div>
        <span class="topbar-name"><?php echo htmlspecialchars($uname ? $uname : ''); ?></span>
      </div>
      <a href="<?php echo site_url('auth/logout') ?>" style="display:flex;align-items:center;gap:5px;padding:5px 12px;font-size:12px;font-weight:600;color:#7a746c;border-radius:4px;transition:all .16s;" onmouseover="this.style.background='#fff4ed';this.style.color='#e8650a'" onmouseout="this.style.background='transparent';this.style.color='#7a746c'">
        <i class="fa fa-sign-out"></i> Sign out
      </a>
    </div>
  </nav>
</header>
