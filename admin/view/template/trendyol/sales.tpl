<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <h1><?php echo $heading_title2; ?></h1>
      <ul class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
  <div class="container-fluid" id="content">
    <?php if($error_warning){ ?>
        <div class="alert alert-danger"><?php echo $error_warning; ?></div>
    <?php } ?>
    <?php if($success){ ?>
        <div class="alert alert-success"><?php echo $success; ?></div>
    <?php } ?>
    <ul class="nav nav-tabs" role="tablist">
        <?php foreach($links as $link){ ?>
        <li class="<?php echo $link['css']; ?>"><a href="<?php echo $link['link']; ?>"><b><?php echo $link['text']; ?></b></a></li>
        <?php } ?>
    </ul>
    <div class="panel panel-warning">
        <div class="panel-heading"><?php echo $heading_title; ?></div>
        <div class="panel-body">
          <div class="row">
              <div class="col-md-9">
                <div class="row">
                  <h4 class="col-lg-12 col-md-12 col-sm-12">TRENDYOL SİPARİŞLERİ</h4>
                  <p class="col-lg-12 col-md-12 col-sm-12">Bu sayfada trendyol üzerinden satılan ürünlerinizi görebilirsiniz, ürünleriniz ile ilgili işlemleri kolayca yapabilirsiniz.</p>
                </div>
              </div>
          </div>
          <table class="table table-bordered">
              <thead>
                <th>SİPARİŞ NO</th>
                <th>MÜŞTERİ ADI</th>
                <th>MODEL NO / BARKOD</th>
                <th>ÜRÜN ADI</th>
                <th>Adet</th>
                <th>FİYAT</th>
                <th>DURUM</th>
              </thead>
              <tbody>
          <?php if($sales->totalElements > 0){ ?>
              <tbody>
                <?php foreach ($sales->content as $sale) {
                  foreach ($sale->lines as $line) {  ?>
                <tr>
                  <td><?php echo $sale->orderNumber; ?></td>
                  <td><?php echo $sale->customerFirstName.' '.$sale->customerLastName; ?></td>
                  <td><b>Model : </b><?php echo $line->merchantSku; ?><br>
                    <b>Barkod : </b><?php echo $line->barcode; ?></td>
                  <th><?php echo $line->productName; ?></th>
                  <th><?php echo $line->quantity; ?></th>
                  <td><?php echo $line->price; ?> <?php echo $line->currencyCode; ?></td>
                  <td>
                    <?php if($line->orderLineItemStatusName == 'Delivered'){ ?>
                      Teslim Edildi
                    <?php } else if($line->orderLineItemStatusName == 'Shipped'){ ?>
                      Kargoda
                    <?php } else if($line->orderLineItemStatusName == 'Cancelled'){ ?>
                      İptal Edildi
                    <?php } else if($line->orderLineItemStatusName == 'Picking'){ ?>
                      Hazırlanıyor
                    <?php } else if($line->orderLineItemStatusName == 'ReadyToShip'){ ?>
                      Kargoya Hazır
                    <?php } ?>
                  </td>
                </tr>
                <?php } } ?>
              </tbody>
          <?php } ?>
        </tbody>
      </table>
      <hr>
          <div class="row">
            <div class="col-sm-6 text-left"><?php echo $pagination; ?></div>
            <div class="col-sm-6 text-right"><?php echo $results; ?></div>
          </div>
      </div>
  </div>
</div>
<?php echo $footer; ?>