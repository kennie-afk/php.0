<nav id="sidebar">
  <div class="sidebar-list">
    <div class="sidebar-section">Main</div>
    <a href="index.php?page=home" class="nav-item nav-home">
      <span class="icon-field"><i class="fa fa-tachometer-alt"></i></span> Dashboard
    </a>
    <a href="index.php?page=attendance" class="nav-item nav-attendance">
      <span class="icon-field"><i class="fa fa-calendar-check"></i></span> Attendance
    </a>
    <a href="index.php?page=payroll" class="nav-item nav-payroll">
      <span class="icon-field"><i class="fa fa-money-check-alt"></i></span> Payroll
    </a>

    <div class="sidebar-section">Organization</div>
    <a href="index.php?page=employee" class="nav-item nav-employee">
      <span class="icon-field"><i class="fa fa-user-tie"></i></span> Employees
    </a>
    <a href="index.php?page=department" class="nav-item nav-department">
      <span class="icon-field"><i class="fa fa-sitemap"></i></span> Departments
    </a>
    <a href="index.php?page=position" class="nav-item nav-position">
      <span class="icon-field"><i class="fa fa-id-badge"></i></span> Positions
    </a>

    <div class="sidebar-section">Compensation</div>
    <a href="index.php?page=allowances" class="nav-item nav-allowances">
      <span class="icon-field"><i class="fa fa-plus-circle"></i></span> Allowances
    </a>
    <a href="index.php?page=deductions" class="nav-item nav-deductions">
      <span class="icon-field"><i class="fa fa-minus-circle"></i></span> Deductions
    </a>

    <?php if(isset($_SESSION['login_type']) && $_SESSION['login_type'] == 1): ?>
    <div class="sidebar-section">Admin</div>
    <a href="index.php?page=users" class="nav-item nav-users">
      <span class="icon-field"><i class="fa fa-users-cog"></i></span> Users
    </a>
    <?php endif; ?>
  </div>
</nav>
<script>
  $('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>').addClass('active');
</script>
