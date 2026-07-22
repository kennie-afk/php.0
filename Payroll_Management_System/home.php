<?php include 'db_connect.php'; ?>
<?php
$emp_count = $conn->query("SELECT COUNT(*) as c FROM employees")->fetch_assoc()['c'] ?? 0;
$dept_count = $conn->query("SELECT COUNT(*) as c FROM department")->fetch_assoc()['c'] ?? 0;
$payroll_count = $conn->query("SELECT COUNT(*) as c FROM payroll")->fetch_assoc()['c'] ?? 0;
$pos_count = $conn->query("SELECT COUNT(*) as c FROM position")->fetch_assoc()['c'] ?? 0;
?>
<div class="page-header">
  <h5><i class="fa fa-tachometer-alt"></i> Dashboard</h5>
  <small style="color:var(--text-2);font-size:11px;"><?php echo date('l, d F Y'); ?></small>
</div>

<div class="row mb-3">
  <div class="col-md-3 col-sm-6">
    <div class="stat-card green">
      <div class="stat-val"><?php echo $emp_count; ?></div>
      <div class="stat-lbl"><i class="fa fa-user-tie"></i> Employees</div>
      <div class="stat-icon"><i class="fa fa-users"></i></div>
    </div>
  </div>
  <div class="col-md-3 col-sm-6">
    <div class="stat-card yellow">
      <div class="stat-val"><?php echo $dept_count; ?></div>
      <div class="stat-lbl"><i class="fa fa-sitemap"></i> Departments</div>
      <div class="stat-icon"><i class="fa fa-building"></i></div>
    </div>
  </div>
  <div class="col-md-3 col-sm-6">
    <div class="stat-card teal">
      <div class="stat-val"><?php echo $payroll_count; ?></div>
      <div class="stat-lbl"><i class="fa fa-money-check-alt"></i> Payroll Records</div>
      <div class="stat-icon"><i class="fa fa-file-invoice-dollar"></i></div>
    </div>
  </div>
  <div class="col-md-3 col-sm-6">
    <div class="stat-card olive">
      <div class="stat-val"><?php echo $pos_count; ?></div>
      <div class="stat-lbl"><i class="fa fa-id-badge"></i> Positions</div>
      <div class="stat-icon"><i class="fa fa-briefcase"></i></div>
    </div>
  </div>
</div>

<div class="card">
  <div class="card-body welcome-card">
    <i class="fa fa-hand-sparkles"></i>
    Welcome back, <strong><?php echo htmlspecialchars($_SESSION['login_name']); ?></strong>
  </div>
</div>
