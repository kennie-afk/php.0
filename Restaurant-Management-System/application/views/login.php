<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sign In — Restaurant Management System</title>
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/custom.css') ?>">
</head>
<body class="login-page">
<div class="login-box">
  <div class="login-card">
    <div class="login-card-top">
      <div class="login-logo-text">RMS</div>
      <div class="login-tagline">Restaurant Management System</div>
    </div>
    <div class="login-card-body">
      <?php if(!empty($errors)): ?>
        <div class="login-error"><i>&
      <?php endif; ?>
      <?php $val = validation_errors(); if($val): ?>
        <div class="login-error"><?php echo $val; ?></div>
      <?php endif; ?>

      <form action="<?php echo site_url('auth/login'); ?>" method="post">
        <div class="login-form-group">
          <label for="email">Email address</label>
          <input type="email" name="email" id="email" placeholder="mwanzia@gmail.com" autocomplete="off">
        </div>
        <div class="login-form-group">
          <label for="password">Password</label>
          <input type="password" name="password" id="password" placeholder="••••••••" autocomplete="off">
        </div>
        <button type="submit" class="login-btn">Sign In</button>
      </form>
    </div>
  </div>
</div>
</body>
</html>
