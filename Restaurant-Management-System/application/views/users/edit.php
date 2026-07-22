<div class="content-wrapper">
  <section class="content-header">
    <h1><i class="fa fa-pencil"></i> Edit User</h1>
    <ol class="breadcrumb">
      <li><a href="<?= site_url('dashboard') ?>"><i class="fa fa-tachometer"></i> Home</a></li>
      <li><a href="<?= site_url('users') ?>">Users</a></li>
      <li class="active">Edit</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-5">
        <?php if($this->session->flashdata('success')): ?>
          <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
        <?php endif; ?>
        <div class="box box-primary">
          <div class="box-header"><h3 class="box-title"><i class="fa fa-pencil"></i> Edit User</h3></div>
          <form action="<?= site_url('users/edit/'.$user_data['id']) ?>" method="post">
            <div class="box-body">
              <?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>
              <div class="form-group">
                <label>Group</label>
                <select class="form-control" name="groups">
                  <option value="">— Select Group —</option>
                  <?php foreach($group_data as $v): ?>
                    <option value="<?= $v['id'] ?>" <?= (!empty($user_group) && $user_group['id'] == $v['id']) ? 'selected' : '' ?>><?= $v['group_name'] ?></option>
                  <?php endforeach ?>
                </select>
              </div>
              <div class="form-group">
                <label>Store</label>
                <select class="form-control" name="store">
                  <option value="">— Select Store —</option>
                  <?php foreach($store_data as $v): ?>
                    <option value="<?= $v['id'] ?>" <?= ($user_data['store_id'] == $v['id']) ? 'selected' : '' ?>><?= $v['name'] ?></option>
                  <?php endforeach ?>
                </select>
              </div>
              <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="username" value="<?= $user_data['username'] ?>" autocomplete="off">
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" value="<?= $user_data['email'] ?>" autocomplete="off">
              </div>
              <div class="row">
                <div class="col-xs-6">
                  <div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control" name="fname" value="<?= $user_data['firstname'] ?>" autocomplete="off">
                  </div>
                </div>
                <div class="col-xs-6">
                  <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control" name="lname" value="<?= $user_data['lastname'] ?>" autocomplete="off">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Phone</label>
                <input type="text" class="form-control" name="phone" value="<?= $user_data['phone'] ?>" autocomplete="off">
              </div>
              <div class="form-group">
                <label>Gender</label>
                <div>
                  <label style="margin-right:16px;font-weight:400;"><input type="radio" name="gender" value="1" <?= ($user_data['gender']==1)?'checked':'' ?>> Male</label>
                  <label style="font-weight:400;"><input type="radio" name="gender" value="2" <?= ($user_data['gender']==2)?'checked':'' ?>> Female</label>
                </div>
              </div>
              <div class="alert alert-info" style="font-size:11.5px;padding:7px 10px;">Leave password blank to keep unchanged.</div>
              <div class="row">
                <div class="col-xs-6">
                  <div class="form-group">
                    <label>New Password</label>
                    <input type="password" class="form-control" name="password" placeholder="••••••••" autocomplete="off">
                  </div>
                </div>
                <div class="col-xs-6">
                  <div class="form-group">
                    <label>Confirm</label>
                    <input type="password" class="form-control" name="cpassword" placeholder="••••••••" autocomplete="off">
                  </div>
                </div>
              </div>
            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
              <a href="<?= site_url('users') ?>" class="btn btn-default">Cancel</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>
<script>$(document).ready(function(){ $("#userMainNav").addClass('active'); $("#manageUserSubNav").addClass('active'); });</script>
