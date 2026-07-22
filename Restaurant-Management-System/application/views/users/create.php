<div class="content-wrapper">
  <section class="content-header">
    <h1><i class="fa fa-user-plus"></i> Add User <small>Create new account</small></h1>
    <ol class="breadcrumb">
      <li><a href="<?= site_url('dashboard') ?>"><i class="fa fa-tachometer"></i> Home</a></li>
      <li><a href="<?= site_url('users') ?>">Users</a></li>
      <li class="active">Add User</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-5">
        <?php if($this->session->flashdata('success')): ?>
          <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
        <?php endif; ?>
        <div class="box box-primary">
          <div class="box-header"><h3 class="box-title"><i class="fa fa-user-plus"></i> New User</h3></div>
          <form action="<?= site_url('users/create') ?>" method="post">
            <div class="box-body">
              <?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>
              <div class="form-group">
                <label>Group</label>
                <select class="form-control" name="groups">
                  <option value="">— Select Group —</option>
                  <?php foreach($group_data as $v): ?>
                    <option value="<?= $v['id'] ?>"><?= $v['group_name'] ?></option>
                  <?php endforeach ?>
                </select>
              </div>
              <div class="form-group">
                <label>Store</label>
                <select class="form-control" name="store">
                  <option value="">— Select Store —</option>
                  <?php foreach($store_data as $v): ?>
                    <option value="<?= $v['id'] ?>"><?= $v['name'] ?></option>
                  <?php endforeach ?>
                </select>
              </div>
              <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="username" placeholder="username" autocomplete="off">
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" placeholder="email@example.com" autocomplete="off">
              </div>
              <div class="row">
                <div class="col-xs-6">
                  <div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control" name="fname" placeholder="First name" autocomplete="off">
                  </div>
                </div>
                <div class="col-xs-6">
                  <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control" name="lname" placeholder="Last name" autocomplete="off">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Phone</label>
                <input type="tel" class="form-control" name="phone" placeholder="+254 700 000 000" autocomplete="off">
              </div>
              <div class="form-group">
                <label>Gender</label>
                <div>
                  <label style="margin-right:16px;font-weight:400;"><input type="radio" name="gender" value="1"> Male</label>
                  <label style="font-weight:400;"><input type="radio" name="gender" value="2"> Female</label>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-6">
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="••••••••" autocomplete="off">
                  </div>
                </div>
                <div class="col-xs-6">
                  <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" name="cpassword" placeholder="••••••••" autocomplete="off">
                  </div>
                </div>
              </div>
            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
              <a href="<?= site_url('users') ?>" class="btn btn-default">Cancel</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>
<script>$(document).ready(function(){ $("#userMainNav").addClass('active'); $("#createUserSubNav").addClass('active'); });</script>
