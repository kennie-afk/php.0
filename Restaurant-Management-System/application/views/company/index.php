<div class="content-wrapper">
  <section class="content-header">
    <h1><i class="fa fa-briefcase"></i> Company Info</h1>
    <ol class="breadcrumb">
      <li><a href="<?= site_url('dashboard') ?>"><i class="fa fa-tachometer"></i> Home</a></li>
      <li class="active">Company</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-5">
        <?php if($this->session->flashdata('success')): ?>
          <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
        <?php endif; ?>
        <div class="box box-primary">
          <div class="box-header"><h3 class="box-title"><i class="fa fa-briefcase"></i> Company Details</h3></div>
          <form action="<?= site_url('company/') ?>" method="post">
            <div class="box-body">
              <?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>
              <div class="form-group">
                <label>Company Name</label>
                <input type="text" class="form-control" name="company_name" value="<?= $company_data['company_name'] ?>">
              </div>
              <div class="row">
                <div class="col-xs-6">
                  <div class="form-group">
                    <label>Service Charge (%)</label>
                    <input type="text" class="form-control" name="service_charge_value" value="<?= $company_data['service_charge_value'] ?>">
                  </div>
                </div>
                <div class="col-xs-6">
                  <div class="form-group">
                    <label>VAT Charge (%)</label>
                    <input type="text" class="form-control" name="vat_charge_value" value="<?= $company_data['vat_charge_value'] ?>">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" name="address" value="<?= $company_data['address'] ?>">
              </div>
              <div class="row">
                <div class="col-xs-6">
                  <div class="form-group">
                    <label>Phone</label>
                    <input type="text" class="form-control" name="phone" value="<?= $company_data['phone'] ?>">
                  </div>
                </div>
                <div class="col-xs-6">
                  <div class="form-group">
                    <label>Country</label>
                    <input type="text" class="form-control" name="country" value="<?= $company_data['country'] ?>">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Currency</label>
                <select class="form-control" name="currency">
                  <option value="">— Select Currency —</option>
                    <option value="KSH" <?= (!$company_data['currency'] || $company_data['currency']=='KSH')?'selected':'' ?>>KSh (Kenya Shilling)</option>
                  <?php foreach($currency_symbols as $k => $v): ?>
                    <option value="<?= $k ?>" <?= ($company_data['currency']==$k)?'selected':'' ?>><?= $k ?></option>
                  <?php endforeach ?>
                </select>
              </div>
              <div class="form-group">
                <label>Message</label>
                <textarea class="form-control" name="message" rows="2"><?= $company_data['message'] ?></textarea>
              </div>
            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>
<script>$(document).ready(function(){ $("#companyMainNav").addClass('active'); });</script>
