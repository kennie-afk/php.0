<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FiveSenses Payroll — Sign In</title>
  <?php include('./header.php'); include('./db_connect.php'); session_start();
  if(isset($_SESSION['login_id'])) { header("location:index.php?page=home"); exit(); } ?>
  <style>
    body {
      min-height: 100vh; background: 
      display: flex; align-items: center; justify-content: center;
      position: relative; overflow: hidden;
    }
    body::before {
      content: '';
      position: absolute; inset: 0;
      background: radial-gradient(ellipse 55% 55% at 65% 45%, rgba(249,168,37,.12) 0%, transparent 70%);
      pointer-events: none;
    }
    .login-wrap { width: 340px; position: relative; z-index: 1; }
    .login-card { background: 
    .login-top {
      background: linear-gradient(135deg, 
      padding: 24px 28px 20px; position: relative; overflow: hidden;
    }
    .login-top::after {
      content: ''; position: absolute; right: -16px; bottom: -16px;
      width: 90px; height: 90px; border-radius: 50%; background: rgba(255,255,255,.06);
    }
    .login-top::before {
      content: ''; position: absolute; right: 24px; bottom: -32px;
      width: 120px; height: 120px; border-radius: 50%; background: rgba(249,168,37,.08);
    }
    .login-logo {
      font-size: 20px; font-weight: 800; color: 
      display: flex; align-items: center; gap: 8px;
    }
    .login-logo i { color: 
    .login-logo span { color: rgba(255,255,255,.65); font-weight: 400; font-size: 14px; }
    .login-tagline { font-size: 11.5px; color: rgba(255,255,255,.65); margin-top: 4px; }
    .login-body { padding: 24px 28px 28px; }
    .login-error {
      background: 
      padding: 8px 11px; border-radius: 0; font-size: 12px; margin-bottom: 14px;
    }
    .login-group { margin-bottom: 11px; }
    .login-group label { font-size: 11px; font-weight: 600; color: 
    .login-group input {
      width: 100%; height: 32px; padding: 5px 10px;
      border: 1px solid 
      font-size: 12.5px; color: 
      transition: border-color .15s, box-shadow .15s;
    }
    .login-group input:focus { border-color: 
    .login-group input:hover:not(:focus) { border-color: 
    .login-btn {
      width: 100%; height: 34px; background: 
      border: none; border-radius: 0; font-size: 12.5px; font-weight: 700;
      cursor: pointer; margin-top: 6px; letter-spacing: .2px;
      transition: background .15s, box-shadow .15s, transform .15s;
      display: flex; align-items: center; justify-content: center; gap: 6px;
    }
    .login-btn:hover { background: 
    .login-btn:active { transform: translateY(0); box-shadow: none; }
  </style>
</head>
<body>
  <div class="login-wrap">
    <div class="login-card">
      <div class="login-top">
        <div class="login-logo"><i class="fa fa-leaf"></i> FiveSenses <span>Payroll</span></div>
        <div class="login-tagline">Payroll Management System</div>
      </div>
      <div class="login-body">
        <div id="error-box"></div>
        <form id="login-form">
          <div class="login-group">
            <label>Username</label>
            <input type="text" name="username" id="username" placeholder="Enter username" autocomplete="off">
          </div>
          <div class="login-group">
            <label>Password</label>
            <input type="password" name="password" id="password" placeholder="••••••••" autocomplete="off">
          </div>
          <button type="submit" class="login-btn"><i class="fa fa-sign-in-alt"></i> Sign In</button>
        </form>
      </div>
    </div>
  </div>
  <script>
    $('#login-form').submit(function(e){
      e.preventDefault();
      var btn = $(this).find('button');
      btn.prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Signing in...');
      $('#error-box').html('');
      $.ajax({
        url: 'ajax.php?action=login', method: 'POST', data: $(this).serialize(),
        error: function() { btn.prop('disabled',false).html('<i class="fa fa-sign-in-alt"></i> Sign In'); },
        success: function(resp) {
          if(resp == 1) { location.href = 'index.php?page=home'; }
          else {
            $('#error-box').html('<div class="login-error"><i class="fa fa-exclamation-circle"></i> Invalid username or password.</div>');
            btn.prop('disabled',false).html('<i class="fa fa-sign-in-alt"></i> Sign In');
          }
        }
      });
    });
  </script>
</body>
</html>
