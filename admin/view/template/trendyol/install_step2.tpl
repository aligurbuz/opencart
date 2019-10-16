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
            <input type="hidden" name="store_id" value="<?php echo $trend_storeid; ?>">
            <div class="row">
                <div class="form-group">
                  <label>FİYAT DEĞİŞİM METODU</label>
                  <p style="font-size: 12px !important;" class="text-danger">Ürün Fiyatlarınızı trendyol.com a gönderirken arttırıp azaltmanız için aşağıdaki metodlardan birini seçebilirsiniz. Bu alanda belirlediğinzi metoda göre ürün fiyatınız hesaplanıp trendyol.com a gönderilir.</p>
                  <select name="difference_type" id="difference_type" class="form-control input-lg">
                    <option value="0" <?php if($shop['difference_type'] == '0'){ echo 'selected'; } ?>>--- İşlem Yapma ---</option>
                    <option value="yuzde"  <?php if($shop['difference_type'] == 'yuzde'){ echo 'selected'; } ?>>% Yüzde Arttır</option>
                    <option value="sabit"  <?php if($shop['difference_type'] == 'sabit'){ echo 'selected'; } ?>>Sabit Tutar Olarak Arttır</option>
                    <option value="yuzdeazalt"  <?php if($shop['difference_type'] == 'yuzdeazalt'){ echo 'selected'; } ?>>% Yüzde Azalt</option>
                    <option value="sabitazalt"  <?php if($shop['difference_type'] == 'sabitazalt'){ echo 'selected'; } ?>>Sabit Tutar Olarak Azalt</option>
                </select>
                </div>
           
                <div class="form-group">
                  <label>FİYAT DEĞİŞİM DEĞERİ (YÜZDE / SABİT)</label>
                  <p style="font-size: 12px !important;" class="text-danger">Üstteki alanın değerine göre ürün fiyatlarınızdaki değişim değeridir. Örneğin 10 yazarsanız ve üstte yüzde seçili ise yüzde 10 / sabit yazarsanız üstteki değre göre +10 TL olarak işlem yapacaktır.</p>
                  <input type="text" class="form-control input-lg" name="difference_value" value="<?php echo $shop['difference_value']; ?>">
                </div>

                <div class="form-group">
                  <label>ÜRÜN KARGO ÇIKIŞ ADRESİ</label>
                  <p style="font-size: 12px !important;" class="text-danger">Aşağıdaki adresler trendyol.com'dan gelmektedir. Aşağıdaki adresler içerisinden kargo çıkış adresinizi seçiniz, aşağıda adres göremiyosanız trendyol paneline giderek adres ekleyin</p>
                  <select name="shipment_address_id" id="shipment_address_id" class="form-control input-lg">
                    <?php foreach ($adresler->supplierAddresses as $adres) { ?>
                      <option value="<?php echo $adres->id; ?>"><?php if($adres->addressType == 'Shipment'){ echo 'Kargo Adresi'; }; ?><?php if($adres->addressType == 'Returning'){ echo 'İade Adresi'; }; ?><?php if($adres->addressType == 'Invoice'){ echo 'Fatura Adresi'; }; ?> - <?php echo $adres->address; ?></option>
                    <?php } ?>
                </select>
                </div>

                 <div class="form-group">
                  <label>ÜRÜN İADE ADRESİ</label>
                  <p style="font-size: 12px !important;" class="text-danger">Aşağıdaki adresler trendyol.com'dan gelmektedir. Aşağıdaki adresler içerisinden ürün iade adresinizi seçiniz, aşağıda adres göremiyosanız trendyol paneline giderek adres ekleyin</p>
                  <select name="returning_address_id" id="returning_address_id" class="form-control input-lg">
                    <?php foreach ($adresler->supplierAddresses as $adres) { ?>
                      <option value="<?php echo $adres->id; ?>"><?php if($adres->addressType == 'Shipment'){ echo 'Kargo Adresi'; }; ?><?php if($adres->addressType == 'Returning'){ echo 'İade Adresi'; }; ?><?php if($adres->addressType == 'Invoice'){ echo 'Fatura Adresi'; }; ?> - <?php echo $adres->address; ?></option>
                    <?php } ?>
                </select>
                </div>

                 <div class="form-group">
                  <label>KARGO ŞİRKETİ SEÇİNİZ</label>
                  <p style="font-size: 12px !important;" class="text-danger">Lütfen aşağıdan çalıştığınız kargo firmasınız seçiniz, aşağıdaki kargo firmaları trendyol.com'dan gelmektedir. Çalıştığınız kargo firmasını göremiyorsanız trendyol ile görüşünüz.</p>
                  <select name="cargo_company_id" id="cargo_company_id" class="form-control input-lg">
                    <?php foreach ($kargo_sirketleri as $kargo) { ?>
                      <option value="<?php echo $kargo->id; ?>"><?php echo $kargo->name; ?></option>
                    <?php } ?>
                </select>
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