<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <h1>
        <?php echo $heading_title2; ?>
      </h1>
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
    <div class="panel panel-warning">
        <div class="panel-heading"><?php echo $heading_title; ?></div>
        <div class="panel-body">
            <div class="row">
                <h4 class="col-lg-12 col-md-12 col-sm-12">TRENDYOL İŞLEM KAYITLARI</h4>
                <p class="col-lg-12 col-md-12 col-sm-12">Bu sayfada trendyol entegrasyonu ile yaptığınız işlemlerin kayıtlarını görebilirsiniz</p>
            </div>
            
            <div style="margin-top: 40px;">
              <textarea wrap="off" rows="15" readonly class="form-control"><?php echo $log; ?></textarea>
            <br>
            <a class="btn btn-info" onclick="confirm('Bu işlem geri alınamaz, logları temizleme istediğine emin misin ?') ? location.href='<?php echo $clear; ?>' : false;">Log Dosyasını Temizle</a>
            </div>
       </div>
  </div>
</div>

<?php echo $footer; ?>