<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
          <div class="btn-group">
            <?php if($shops){ ?>
              <?php foreach($shops as $shop){ ?>
                <a href="index.php?route=trendyol/setting/changeshop&id=<?php echo $shop['id']; ?>&user_token=<?php echo $user_token; ?>" class="btn btn-primary <?php if($actshop_id == $shop['id']){ echo 'active'; } ?>"><?php echo $shop['name']; ?></a>
              <?php } ?>
            <?php } ?>
          </div>
      </div>
      <h1><?php echo $heading_title2; ?></h1>
      <ul class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
  <div class="container-fluid" id="content">
    <ul class="nav nav-tabs" role="tablist">
        <?php foreach($links as $link){ ?>
        <li class="<?php echo $link['css']; ?>"><a href="<?php echo $link['link']; ?>"><b><?php echo $link['text']; ?></b></a></li>
        <?php } ?>
    </ul>
    <div class="panel panel-danger">
        <div class="panel-heading"><?php echo $heading_title; ?></div>
        <div class="panel-body">
            <div class="row">
                <h4 class="col-lg-12 col-md-12 col-sm-12">TRENDYOL KATEGORİLERİ</h4>
                <p class="col-lg-12 col-md-12 col-sm-12">Bu kısımdan trendyol kategorilerin düzgün indirilip indirilmediğini kontrol edebilirsiniz.</p>
            </div>
            <hr style="margin-top: 5px; margin-bottom: 5px;">
            <a class="btn btn-primary" href="<?php echo $return; ?>"><i class="fa fa-reply" aria-hidden="true"></i> GERİ DÖN</a>
          <hr style="margin-top: 5px;">
            <?php if($success){ ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
            <?php } ?>
            <table class="table table-bordered">
              <thead>
                <th>TRENDYOL KATEGORİ ID</th>
                <th>KATEGORİ ADI</th>
              </thead>
              <tbody>
                <?php if($categories){ ?>
                  <?php foreach($categories as $category){ ?>
                  <tr>
                    <td><?php echo $category['category_id']; ?></td>
                    <td><?php echo $category['name']; ?></td>
                  </tr>
                  <?php } ?>
                <?php } else { ?>
                <tr>
                  <td colspan="5"><center>Henüz Bir Trendyol Kategoriniz Yok</center></td>
                </tr>
                <?php } ?>
              </tbody>
          </table>
          <div class="row">
            <div class="col-sm-6 text-left"><?php echo $pagination; ?></div>
            <div class="col-sm-6 text-right"><?php echo $results; ?></div>
          </div>
        </div>
    </div>
</div>
<?php echo $footer; ?>