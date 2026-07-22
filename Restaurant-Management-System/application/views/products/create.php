<div class="content-wrapper">
  <section class="content-header">
    <h1><i class="fa fa-plus-circle"></i> Add Product</h1>
    <ol class="breadcrumb">
      <li><a href="<?= site_url('dashboard') ?>"><i class="fa fa-tachometer"></i> Home</a></li>
      <li><a href="<?= site_url('products') ?>">Products</a></li>
      <li class="active">Add Product</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-6">
        <div class="box box-primary">
          <div class="box-header"><h3 class="box-title"><i class="fa fa-cube"></i> New Product</h3></div>
          <form action="" method="post" enctype="multipart/form-data">
            <div class="box-body">
              <?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>
              <div class="form-group">
                <label>Product Image</label>
                <input id="product_image" name="product_image" type="file" class="form-control" style="height:auto;padding:4px;">
              </div>
              <div class="row">
                <div class="col-xs-8">
                  <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" class="form-control" name="product_name" placeholder="Product name" value="<?= $this->input->post('product_name') ?>">
                  </div>
                </div>
                <div class="col-xs-4">
                  <div class="form-group">
                    <label>Price</label>
                    <input type="text" class="form-control" name="price" placeholder="0.00" value="<?= $this->input->post('price') ?>">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" name="description" rows="2" placeholder="Brief description"><?= $this->input->post('description') ?></textarea>
              </div>
              <div class="row">
                <div class="col-xs-6">
                  <div class="form-group">
                    <label>Category</label>
                    <select class="form-control" name="category[]" multiple>
                      <?php foreach($category as $v): ?>
                        <option value="<?= $v['id'] ?>"><?= $v['name'] ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
                <div class="col-xs-6">
                  <div class="form-group">
                    <label>Store</label>
                    <select class="form-control" name="store[]" multiple>
                      <?php foreach($stores as $v): ?>
                        <option value="<?= $v['id'] ?>"><?= $v['name'] ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="active">
                  <option value="1">Active</option>
                  <option value="2">Inactive</option>
                </select>
              </div>
            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
              <a href="<?= site_url('products') ?>" class="btn btn-default">Cancel</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>
<script>$(document).ready(function(){ $(".select_group, select[multiple]").select2(); $("#productMainNav").addClass('active'); $("#createProductSubMenu").addClass('active'); });</script>
