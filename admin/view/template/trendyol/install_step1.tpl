<?php echo $header; ?><?php echo $column_left; ?>
<form method="post" id="step1form">
<div id="content">
  <div class="page-header">
    <div class="container-fluid"></div>
  </div>
  <div class="container-fluid" id="content">
  <div class="col-md-5 col-centered">
  <center><img src="view/template/trendyol/asset/istn112.png" style="margin-bottom: 20px;"></center>
  <div class="panel panel-default">
        <div class="panel-heading" style="font-weight: bold; font-size: 14px;"><?php echo $heading_title; ?></div>
        <div class="panel-body install-panel">
            <div class="row">
                <div class="form-group">
                  <label>MAĞAZANIZ İÇİN BİR AD BELİRLEYİN</label>
                  <p style="font-size: 12px !important;" class="text-danger">Bu adım sistem işleyişi konusunda bir önem teşkil etmez sadece sizin mağazanızı tanıyabilmeniz için gereken bir alandır ve boş bırakılamaz</p>
                  <input type="text" class="form-control input-lg" name="store_name" value="<?php echo $shop['store_name']; ?>" required="required">
                </div>

                <div class="form-group">
                  <label>TRENDYOL SUPPLIER ID</label>
                  <p style="font-size: 12px !important;" class="text-danger">Supplier ID bağlantı sağlamanız için gerekli bir bilgidir, trendyol tedarikçi girişi yaptıktan sonra alabildiğiniz gibi api kullanıcı adı ve şifre ile birlikte gelen mailde mevcuttur.</p>
                  <input type="text" class="form-control input-lg" value="<?php echo $shop['supplier_id']; ?>" name="supplier_id" required="required">
                </div>
           
                <div class="form-group">
                  <label>TRENDYOL APİ KULLANICI ADI</label>
                  <p style="font-size: 12px  !important;" class="text-danger" >Trendyol Api Kullanıcı Adı api servisinize bağlanmanız için gereki bir bilgidir ve zorunludur. Bu bilgileri trendyol'dan öğrenmeniz gerekmektedir.</p>
                  <input type="text" class="form-control input-lg" value="<?php echo $shop['api_username']; ?>" name="api_username" required="required">
                </div>
           
                <div class="form-group">
                  <label>TRENDYOL APİ ŞİFRE</label>
                  <p style="font-size: 12px  !important;" class="text-danger">
                    Trendyol api şifresi tıpkı kullanıcı adı gibi api servisinize bağlanmanız için gerekli ve zorunlu bir alandır. Api şifreniz kullanıcı adınızla birlikte verilir.
                  </p>
                  <input type="text" class="form-control input-lg" value="<?php echo $shop['api_password']; ?>" name="api_password" required="required">
                </div>
                <div class="form-group devamet">
                   <button type="submit" class="btn btn-lg btn-primary pull-right">SONRAKİ ADIMA GEÇ</button>
                </div>
          </div>
        </div>
  </div>
</div>
</div>
</div>
<?php echo $footer; ?>
<script type="text/javascript">
  $(document).on('click', '.checkkey', function(){
      $('.panel-body .alert').remove();
       $('.checkkey').button('loading');
       $.ajax({
          url: 'index.php?route=trendyol/install/checkkey&user_token=<?php echo $user_token; ?>',
          type: 'post',
          dataType: 'json',
          data : $('#step1form').serialize(),
          success: function(json) {
            setTimeout(function() {
                if(json.status == 1){
                    $('.devamet').before('<div class="alert alert-success">'+json.msg+'</div>');
                    $('.devamet').html(json.btn);
                } else {
                   $('.devamet').before('<div class="alert alert-danger">'+json.msg+'</div>');
                   $('.checkkey').button('reset');
                }
            }, 1000);
          }
        });
  });
</script>