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
                <h4 class="col-lg-12 col-md-12 col-sm-12">TRENDYOL ENTEGRASYON AYARLARINIZ</h4>
                <p class="col-lg-12 col-md-12 col-sm-12">Bu sayfada trendyol entegrasyonunuzun ayarlarını gözden geçirebilir ve tekrar düzenleyebilirsiniz</p>
            </div>
            <div class="row" style="margin-top: 40px;">
                <div class="col-md-6">
                  <div class="panel panel-default">
                    <div class="panel-heading">SATICI BİLGİLERİ</div>
                    <div class="panel-body form-horizontal">
                      <div class="form-group">
                        <label class="control-label col-md-5">Mağaza Adı</label>
                        <span class="col-md-7"><?php echo $shop['store_name']; ?></span>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-5">Satıcı ID</label>
                        <span class="col-md-7"><?php echo $shop['supplier_id']; ?></span>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-5">Api Kullanıcı Adı</label>
                        <span class="col-md-7"><?php echo $shop['api_username']; ?></span>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-5">Api Şifresi</label>
                        <span class="col-md-7"><?php echo $shop['api_password']; ?></span>
                      </div>
                    </div>
                    <div class="panel-footer">
                      <a class="btn btn-primary" href="<?php echo $step1duzenle; ?>">BİLGİLERİ DÜZENLE</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="panel panel-default">
                    <div class="panel-heading">KARGO VE KAR MARJI</div>
                    <div class="panel-body form-horizontal">
                      <div class="form-group">
                        <label class="control-label col-md-5">Fiyat Değişim Metodu</label>
                        <span class="col-md-7">
                          <?php if($shop['difference_type'] == '0'){ echo 'İşlem Yapma'; } ?>
                          <?php if($shop['difference_type'] == 'yuzde'){ echo 'Yüzde Olarak Arttır'; } ?>
                          <?php if($shop['difference_type'] == 'sabit'){ echo 'Sabit Olarak Arttır'; } ?>
                          <?php if($shop['difference_type'] == 'yuzdeazalt'){ echo 'Yüzde Olarak Azalt'; } ?>
                          <?php if($shop['difference_type'] == 'sabitazalt'){ echo 'Sabit Olarak Azalt'; } ?>
                        </span>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-5">Fiyat Değişim Değeri</label>
                        <span class="col-md-7"><?php echo $shop['difference_value']; ?></span>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-5">Kargo Çıkış Adres ID</label>
                        <span class="col-md-7"><?php echo $shop['shipment_address_id']; ?></span>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-5">Kargo İade Adres ID</label>
                        <span class="col-md-7"><?php echo $shop['returning_address_id']; ?></span>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-5">Kargo Şirketi ID</label>
                        <span class="col-md-7"><?php echo $shop['cargo_company_id']; ?></span>
                      </div>
                    </div>
                    <div class="panel-footer">
                      <a class="btn btn-primary" href="<?php echo $step2duzenle; ?>">BİLGİLERİ DÜZENLE</a>
                    </div>
                  </div>
                </div>        
            </div>
        </div>
  </div>
</div>
<?php echo $footer; ?>