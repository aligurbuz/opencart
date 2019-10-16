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
                <h4 class="col-lg-12 col-md-12 col-sm-12">TRENDYOL ENTEGRASYONUNA HOŞGELDİNİZ!</h4>
                <p class="col-lg-12 col-md-12 col-sm-12">Bu modül tüm trendyol işlemlerinizi admin panelinden kolayca halletmeniz için tasarlanmıştır. Siparişlerinizi ve ürünlerinizi yönetebilirsiniz.<br>
                Modül hakkında daha detaylı bilgiye, kurulum ve kullanım dökümanına ayrıca tanıtım videosuna sitemizden ulabilirsiniz.</p>
            </div>
            
            <div class="row" style="margin-top: 40px;">
          
            <div class="col-md-10 tiles">
                <div class="row">
                    <h4 class="col-lg-12 col-md-12 col-sm-12">
                     TRENDYOL SİPARİŞLERİ
                    <hr>
                    </h4>
                    <div class="col-lg-2 col-md-2 col-sm-6">
                        <div class="tilered">
                          <div class="tilered-heading">Yeni Sipariş</div>
                          <div class="tilered-body"><i class="fa fa-shopping-cart"></i>
                            <h2 class="pull-right"><?php echo $created_count; ?></h2>
                          </div>
                          <div class="tilered-footer"><a href="<?php echo $created_link; ?>">Siparişler Gör</a></div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-6">
                        <div class="tilered">
                          <div class="tilered-heading">Hazırlanan Sp.</div>
                          <div class="tilered-body"><i class="fa fa-shopping-cart"></i>
                            <h2 class="pull-right"><?php echo $picking_count; ?></h2>
                          </div>
                          <div class="tilered-footer"><a href="<?php echo $picking_link; ?>">Siparişler Gör</a></div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-6">
                        <div class="tilered">
                          <div class="tilered-heading">Faturalandırılan Sp.</div>
                          <div class="tilered-body"><i class="fa fa-shopping-cart"></i>
                            <h2 class="pull-right"><?php echo $invoiced_count; ?></h2>
                          </div>
                          <div class="tilered-footer"><a href="<?php echo $invoiced_link; ?>">Siparişler Gör</a></div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-6">
                        <div class="tilered">
                          <div class="tilered-heading">Kargodaki Sp.</div>
                          <div class="tilered-body"><i class="fa fa-shopping-cart"></i>
                            <h2 class="pull-right"><?php echo $shipped_count; ?></h2>
                          </div>
                          <div class="tilered-footer"><a href="<?php echo $shipped_link; ?>">Siparişler Gör</a></div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-6">
                        <div class="tilered">
                          <div class="tilered-heading">İptal Edilen Sp.</div>
                          <div class="tilered-body"><i class="fa fa-shopping-cart"></i>
                            <h2 class="pull-right"><?php echo $cancelled_count; ?></h2>
                          </div>
                          <div class="tilered-footer"><a href="<?php echo $cancelled_link; ?>">Siparişler Gör</a></div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-6">
                        <div class="tilered">
                          <div class="tilered-heading">Teslim Edilen Sp.</div>
                          <div class="tilered-body"><i class="fa fa-shopping-cart"></i>
                            <h2 class="pull-right"><?php echo $delivered_count; ?></h2>
                          </div>
                          <div class="tilered-footer"><a href="<?php echo $delivered_link; ?>">Siparişler Gör</a></div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-6">
                        <div class="tilered">
                          <div class="tilered-heading">Teslim Edilemeyen Sp.</div>
                          <div class="tilered-body"><i class="fa fa-shopping-cart"></i>
                            <h2 class="pull-right"><?php echo $undelivered_count; ?></h2>
                          </div>
                          <div class="tilered-footer"><a href="<?php echo $undelivered_link; ?>">Siparişler Gör</a></div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-6">
                        <div class="tilered">
                          <div class="tilered-heading">İade Edilen Sp.</div>
                          <div class="tilered-body"><i class="fa fa-shopping-cart"></i>
                            <h2 class="pull-right"><?php echo $returned_count; ?></h2>
                          </div>
                          <div class="tilered-footer"><a href="<?php echo $returned_link; ?>">Siparişler Gör</a></div>
                        </div>
                    </div>
                     <div class="col-lg-2 col-md-2 col-sm-6">
                        <div class="tilered">
                          <div class="tilered-heading">Yeniden Paketln. Sp.</div>
                          <div class="tilered-body"><i class="fa fa-shopping-cart"></i>
                            <h2 class="pull-right"><?php echo $repack_count; ?></h2>
                          </div>
                          <div class="tilered-footer"><a href="<?php echo $repack_link; ?>">Siparişler Gör</a></div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-6">
                        <div class="tilered">
                          <div class="tilered-heading">Tedarik Edilemeyen Sp.</div>
                          <div class="tilered-body"><i class="fa fa-shopping-cart"></i>
                            <h2 class="pull-right"><?php echo $unsupplied_count; ?></h2>
                          </div>
                          <div class="tilered-footer"><a href="<?php echo $unsupplied_link; ?>">Siparişler Gör</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-2">
                  <h4>
                      BEKLEYEN İŞLERİNİZ
                  <hr>
                  </h4>
                   <div class="tile">
                          <div class="tile-heading">EŞLEŞMEMİŞ KATEGORİLER</div>
                          <div class="tile-body"><i class="fa fa-bars"></i>
                            <h2 class="pull-right"><?php echo $escat; ?></h2>
                          </div>
                          <div class="tile-footer"><a href="index.php?route=trendyol/category&user_token=<?php echo $user_token; ?>&filter_eslesme=0">Kategorilere Git</a></div>
                        </div>
            </div>
            </div>
            <?php if($shops){ ?>
            <hr>
            <div class="row">
            	<div class="col-md-12">
            		<p>Aşağıdaki Cron Linklerini İstediğiniz Zaman Aralıkları İle Tanımlayabilirsiniz. Bu linkler otomatik olarak ürün göndermenize ve siparilerinizi kontrol etmenize yardımcı olur.</p>
            	</div>
            </div>
            <hr>
            <div class="row">
            	<div class="col-md-12">
            		<div class="table-reponsive">
            <table class="table table-bordered table-striped">
              <thead>
                <th colspan="2">CRON LİNKLERİ</th>
              </thead>
              <tbody>
                <?php 
                
                foreach($shops as $shop){ ?>
                <tr>
                   <td colspan="2" style="font-weight: bold;"><?php echo $shop['name']; ?> MAĞAZASI CRON LİNKLERİ</td>
                </tr>
                <tr>
                    <td><strong>ÜRÜN GÖNDER & GÜNCELLE</strong></td>
                    <td>wget <?php echo 'https://'.$_SERVER['SERVER_NAME']; ?>/index.php?route=api/trendyol/sendproduct</td>
                </tr>
                <tr>
                    <td><strong>ÜRÜN AKTİF ET GÖNDER & GÜNCELLE</strong></td>
                    <td>wget <?php echo 'https://'.$_SERVER['SERVER_NAME']; ?>/index.php?route=api/trendyol/sendproduct_active</td>
                </tr>
                <tr>
                    <td><strong>YENİ SİPARİŞLERİ AL</strong></td>
                    <td>wget <?php echo 'https://'.$_SERVER['SERVER_NAME']; ?>/index.php?route=api/trendyol/getneworder</td>
                </tr>
                <tr>
                    <td><strong>SİPARİŞLERİ GÜNCELLE</strong></td>
                    <td>wget <?php echo 'https://'.$_SERVER['SERVER_NAME']; ?>/index.php?route=api/trendyol/updateorder</td>
                </tr>
                <?php }  ?>
              </tbody>
            </table>
        </div>
           </div>
          </div>
        <?php } ?>
        </div>
  </div>
</div>
<div class="pageload">
    <div class="container" style="padding: 20% 0px;">
        <center>Yeni Siparişler Alınıyor, Lütfen Bekleyin...<br><br><i class="fa fa-spinner fa-spin"></i></center>
    </div>
</div>
<script type="text/javascript">
   function starttool(url) {
      $.ajax({
        url: url,
        type: 'post',
        dataType: 'json',
        beforeSend: function() {
            $('.allsend').button('loading');
        },
        success: function(json) {
            $('.alert, .text-danger, .progress').remove();
            if (json.status == 0) {
                $('#content > .container-fluid').prepend('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> ' + json.msg + '</div>');
            }
            if (json.status == 1){
                $('#content > .container-fluid').prepend('<div class="alert alert-success"><i class="fa fa-check-circle"></i>  ' + json.msg + '</div>');
            }
            if(json['next']){
                starttool(json['next']);
            } else {
               $('.allsend').button('reset');
            }
        }
      });
    }

  <?php if($salecount['new_total'] > 0){ ?>
  newcheck();
  <?php } ?>
  function newcheck(){
      $.ajax({
        url: 'index.php?route=n11/sales/checknewsales&user_token=<?php echo $user_token; ?>',
        type: 'post',
        dataType: 'json',
        beforeSend: function() {
            $('.pageload').fadeIn();
        },
        success: function(json) {
            $('.alert, .text-danger, .progress').remove();
            if (json.status == 0) {
                $('.pageload .container').prepend('<div class="text-danger" style="font-size:20px; text-align:center;"><i class="fa fa-exclamation-circle"></i> ' + json.msg + '</div>');
            }
            if (json.status == 1){
                $('.pageload .container').prepend('<div class="text-success" style="font-size:20px; text-align:center;"><i class="fa fa-check-circle"></i>  ' + json.msg + '</div>');
            }
            if(json['next']){
              newcheck(json['next']);
            } else {
              setTimeout(function(){
                $('.pageload').fadeOut();
                location.href = 'index.php?route=n11/sales&user_token=<?php echo $user_token; ?>&status=2';
              },4000);
            }
            
        }
      });
    }
    function productsend(url, product_id) {
      $.ajax({
        url: url,
        type: 'post',
        dataType: 'json',
        beforeSend: function() {
          if(product_id != null){
               $('.'+product_id+'btnsend').button('loading');
          } else {
              $('.allsend').button('loading');
          }
        },
        success: function(json) {
            $('.alert, .text-danger, .progress').remove();
            if (json.status == 0) {
                $('#content > .container-fluid').prepend('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> ' + json.msg + '</div>');
            }
            if (json.status == 1){
                $('#content > .container-fluid').prepend('<div class="alert alert-success"><i class="fa fa-check-circle"></i>  ' + json.msg + '</div>');
            }
            if(product_id != null){
               $('.'+product_id+'btnsend').button('reset');
            } else {
               $('.allsend').button('reset');
            }
            productsend(json['next']);
        }
      });
    }
</script>
<?php echo $footer; ?>