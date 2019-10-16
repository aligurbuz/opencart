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
    <div class="panel panel-danger">
        <div class="panel-heading"><?php echo $heading_title; ?></div>
        <div class="panel-body">
            <div class="row">
                <h4 class="col-lg-12 col-md-12 col-sm-12">ÜRÜN & YÖNETİMİ İŞLEMLERİ</h4>
                <p class="col-lg-12 col-md-12 col-sm-12">Bu sayfadan ürün işlemlerinizi yapabilirsiniz, ürüne özel kategori ve değer tanımalama, ürün gönderme, silme ve ürün eşitleme gibi işlemleri yapabileceğiniz sayfadır.</p>
            </div>
            <hr style="margin-top: 5px; margin-bottom: 5px;">
                <a class="btn btn-info btn-sm allsend" onclick="productsend('index.php?route=trendyol/products/batchKontrol&user_token=<?php echo $user_token; ?>', null)" data-toggle="tooltip" data-placement="top" title="Gönderilen ve bacth request id almış ürünlerin son durumlarını kontrol eder">Durum Kontrolü</a>
                <a class="btn btn-primary btn-sm allsend" onclick="productsend('index.php?route=trendyol/products/sendProduct&user_token=<?php echo $user_token; ?>', null)" data-toggle="tooltip" data-placement="top" title="Açık durumda olan ürünlerinizi trendyol.com'a gönderir ve günceller, pasif ürünler için işlem yapmaz."><i class="fa fa-cloud-upload" aria-hidden="true"></i> TÜM ÜRÜNLERİ GÖNDER & GÜNCELLE</a>
                <a class="btn btn-success btn-sm allsend" onclick="productsend('index.php?route=trendyol/products/updateStockPrice&user_token=<?php echo $user_token; ?>', null)"  data-toggle="tooltip" data-placement="top" title="Sitenizdeki ürünlerin sitenizdeki stoklarını ve fiyatlarını trendyola gönderir"><i class="fa fa-cloud-upload" aria-hidden="true"></i>STOK & FİYAT GÜNCELLE</a>
                <!-- <a class="btn btn-danger btn-sm" onclick="productsend('index.php?route=trendyol/products/delProduct&user_token=<?php echo $user_token; ?>', null)"  data-toggle="tooltip" data-placement="top" title="Sitenizdeki ürünlerle eşleşmiş olan tüm trendyol ürünlerini siler, ürünler ile birlikte ürün yorumları, puanlar da silinir."><i class="fa fa-trash" aria-hidden="true"></i> TÜM ÜRÜNLERİ SİL</a> -->
            <hr style="margin-top: 5px;">
          <div class="well">
                  <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Ürün Adı (Otm. Tamamlama)</label>
                          <input type="text" class="form-control input-sm" name="filter_name" value="<?php echo $filter_name; ?>">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Ürün Kodu (Otm. Tamamlama)</label>
                          <input type="text" class="form-control input-sm" name="filter_model" value="<?php echo $filter_model; ?>">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Kategori (Otm. Tamamlama)</label>
                          <input type="text" class="form-control input-sm" name="filter_category" value="<?php echo $filter_category; ?>">
                          <input type="hidden" name="filter_category_id" value="<?php echo $filter_category_id; ?>">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Ürün Markası (Otm. Tamamlama)</label>
                          <input type="text" class="form-control input-sm" name="filter_manufacturer" value="<?php echo $filter_manufacturer; ?>">
                          <input type="hidden" class="form-control input-sm" name="filter_manufacturer_id" value="<?php echo $filter_manufacturer_id; ?>">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Opencart Ürün Durumu</label>
                          <select name="filter_status" class="form-control input-sm">
                            <option value="*">Tümü</option>
                            <?php if ($filter_status) { ?>
                            <option value="1" selected="selected">Açık</option>
                            <?php } else { ?>
                            <option value="1">Açık</option>
                            <?php } ?>
                            <?php if (!$filter_status && !is_null($filter_status)) { ?>
                            <option value="0" selected="selected">Kapalı</option>
                            <?php } else { ?>
                            <option value="0">Kapalı</option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Trendyol Ürün Durumu</label>
                          <select name="filter_trendstatus" class="form-control input-sm">
                            <option value="*">Tümü</option>
                            <?php if ($filter_trendstatus == 4) { ?>
                            <option value="4" selected="selected">Açık</option>
                            <?php } else { ?>
                            <option value="4">Açık</option>
                            <?php } ?>
                            
                            <?php if (!$filter_trendstatus && !is_null($filter_trendstatus)) { ?>
                            <option value="0" selected="selected">Kapalı</option>
                            <?php } else { ?>
                            <option value="0">Kapalı</option>
                            <?php } ?>
                            
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Eşleşme Durumu</label>
                          <select name="filter_eslesme" class="form-control input-sm">
                            <option value="*">Tümü</option>
                            <option value="1" <?php if($filter_eslesme == 1){ echo 'selected'; } ?>>Eşleştirilenler</option>
                            <option value="3" <?php if($filter_eslesme == 3){ echo 'selected'; } ?>>Eşleştirilmemişler</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Stok Durumu</label>
                          <input type="text" name="filter_quantity" value="<?php echo $filter_quantity; ?>" class="form-control input-sm">
                        </div>
                      </div>
                  </div>
                  <button class="btn btn-primary btn-sm" id="button-filter">Ürünleri Getir</button>
              </div>
            <form id="toplu_eslestirme" method="post">
            <table class="table table-bordered">
              <thead>
                <th style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></th>
                <th colspan="2">ÜRÜN ADI</th>
                <th>BARKOD</th>
                <th>MODEL</th>
                <th>BEDEN</th>
                <th>PSF</th>
                <th>TSF</th>
                <th>STOK</th>
                <th>TRENDYOL KATEGORİ</th>
                <td>ÖZELLİKLER</td>
                <th>TRENDYOL DURUM</th>
                <th>ORAN</th>
                <th>İŞLEMLER</th>
              </thead>
              <tbody>
                <?php if($products){ ?>
                    <?php foreach($products as $product){ ?>
                    <tr>
                      <td class="text-center">
                        <?php if (in_array($product['product_id'], $selected)) { ?>
                          <input type="checkbox" name="selected[]" value="<?php echo $product['product_id']; ?>" checked="checked" />
                        <?php } else { ?>
                          <input type="checkbox" name="selected[]" value="<?php echo $product['product_id']; ?>" />
                        <?php } ?>
                      </td>
                      <td><img src="<?php echo $product['image']; ?>"></td>
                      <td><?php echo $product['name']; ?></td>
                      <td><?php echo $product['barcode']; ?></td>
                      <td><?php echo $product['model']; ?></td>
                      <td><?php echo $product['beden']; ?></td>
                      <?php if ($product['special']) { ?>
                        <td>
                          <b>SİTE</b><br> <?php echo number_format($product['price'], 2, ',', '.'); ?><br>
                          <?php if(isset($product['trend_data'])){ ?>
                            <b>TRNY</b><br> <?php echo number_format($product['trend_data']['listprice'], 2, ',', '.'); ?></span>
                          <?php } else { ?>
                            <span class="label label-danger" style="font-size: 11px;">Trendyolda Yok</span>
                          <?php } ?>
                        </td>
                        <td>
                          <b>SİTE</b><br> <?php echo number_format($product['special'], 2, ',', '.'); ?><br>
                          <?php if(isset($product['trend_data'])){ ?>
                            <b>TRNY</b><br> <?php echo number_format($product['trend_data']['saleprice'], 2, ',', '.'); ?></span>
                          <?php } else { ?>
                            <span class="label label-danger" style="font-size: 11px;">Trendyolda Yok</span>
                          <?php } ?>

                        </td>
                        <?php } else { ?>
                        <td><?php echo $product['price']; ?></td>
                        <td>-- yok --</td>
                        <?php } ?>
                     
                      <td>
                        
                        <span class="label label-success" style="font-size: 11px;">Site : <?php echo $product['quantity']; ?></span><br>
                        <?php if(isset($product['trend_data'])){ ?>
                          <span class="label label-warning" style="font-size: 11px; margin-top: 5px; float: left;">Trendyol : <?php echo $product['trend_data']['quantity']; ?></span>
                        <?php } else { ?>
                          <span class="label label-danger" style="font-size: 11px; margin-top: 5px; float: left;">Trendyolda Yok</span>
                        <?php } ?>
                      </td>
                       <td>
                        <?php if($product['tcategory_id'] != 0 or $product['tcategory_id'] != false){ ?>
                        <a href="#" class="eslestirme" data-type="typeaheadjs" data-pk="<?php echo $product['product_id']; ?>" data-value="<?php echo $product['tcategory_id'].'|'.$product['tcategory_name']; ?>" data-url="index.php?route=trendyol/products/cateslestir&user_token=<?php echo $user_token; ?>" data-title="Lütfen Kategori Arayın" data-emptytext="Kategori Eşleştirmesi Yapın"></a>
                        <?php } else { ?>
                        <a href="#" class="eslestirme" data-type="typeaheadjs" data-pk="<?php echo $product['product_id']; ?>" data-value="" data-url="index.php?route=trendyol/products/cateslestir&user_token=<?php echo $user_token; ?>"  data-emptytext="Kategori Eşleştirmesi Yapın" data-title="Lütfen Kategori Arayın"></a>
                        <?php } ?>
                      </td>
                      <td class="attr_<?php echo $product['product_id']; ?>">

                        <a data-ocid="<?php echo $product['product_id']; ?>" class="btn btn-xs btn-default setattr" style="color: #666;"><?php 
                        if($product['setattr'] == 1){ ?>
                          <i class="fa fa-circle" aria-hidden="true" style="color: #3bbf6f;"></i>
                        <?php } else { ?>
                           <i class="fa fa-circle" aria-hidden="true" style="color: #d72135;"></i>
                        <?php } ?>
                        Özellikleri Ayarla</a>
                      </td>
                      <td> 
                        <div class="togselect">
                          <input type="checkbox" class="nproductstatus" value="1" name="nproductstatus[]" data-value="<?php echo $product['product_id']; ?>" type="checkbox" data-toggle="toggle" data-size="mini"
                          <?php if(isset($product['tstatus']) and $product['tstatus'] == 4){ echo 'checked'; } ?>
                          >
                        </div>
                      </td>
              
                      <td>
                      <?php if($product['komisyon'] != 0 or $product['komisyon'] == false){ ?>
                      <a href="#" class="komisyon" data-type="text" data-emptytext="Kar Marjı" data-pk="<?php echo $product['product_id']; ?>" data-url="index.php?route=trendyol/products/changecomission&user_token=<?php echo $user_token; ?>" data-title="Kategori Komisyon Oranını Girin"><?php echo $product['komisyon']; ?></a>
                      <?php } else { ?>
                      <a href="#" class="komisyon" data-type="text"  data-emptytext="Kar Marjı Oranı" data-pk="<?php echo $product['product_id']; ?>" data-url="index.php?route=trendyol/products/changecomission&user_token=<?php echo $user_token; ?>" data-title="Kategori Komisyon Oranını Girin"></a>
                      <?php } ?>
                      </td>
                      
                      <td width="140">
                        <?php if(isset($product['trend_data'])){ ?>
                          <?php if($product['trend_data']['aproved'] == 1){ ?>
                            <a class="btn btn-primary btn-xs btn-block" href="https://www.trendyol.com/bruno-shoes/xopencart-p-<?php echo $product['trend_data']['productcontentid']; ?>" target="_blank">TRENDYOL LİNKİ</a>
                          <?php } else { ?>
                              <center>-- Onaylanmamış --</center><br>
                          <?php } ?>
                        <?php }  ?>
                        <a class="btn btn-warning btn-xs btn-block editprod" data-prodid="<?php echo $product['product_id']; ?>" data-toggle="tooltip" data-original-title="Ürün Title, Ürün Alt Başlık ve Açıklamasını Özelleştirin!"><i class="fa fa-edit"></i> Bilgi Düzenle</a>
                        <!--<a onclick="productsend('index.php?route=trendyol/products/sendProduct&user_token=<?php echo $user_token; ?>&product_id=<?php echo $product['product_id']; ?>', '<?php echo $product['product_id']; ?>')" class="btn btn-info btn-block btn-xs <?php echo $product['product_id']; ?>btnsend">Ürünü Gönder</a>-->
                      </td>
                    </tr>
                    <?php } ?>
                <?php } else { ?>
                <tr>
                  <td colspan="9"><p style="text-align: center;">Henüz Bir Ürününüz Yok</p></td>
                </tr>
                <?php } ?>
              </tbody>
           </table>
          </form>
          <hr>
           <div class="row">
            <div class="col-sm-6 text-left"><?php echo $pagination; ?></div>
          </div>
      </div>
  </div>
</div>
<!-- attr modal -->
<div class="modal fade" id="attrmodal" tabindex="-1" role="dialog" aria-labelledby="attrmodallabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ürün Özelliklerini Ata</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Vazgeç</button>
        <button type="button" class="btn btn-primary saveattr">Değişiklikleri Kaydet</button>
      </div>
    </div>
  </div>
</div>
<!-- description modal -->
<div class="modal fade" id="descmodal" tabindex="-1" role="dialog" aria-labelledby="descmodallabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ürün Bilgileri Özelleştir</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Vazgeç</button>
        <button type="button" class="btn btn-primary savedesc">Değişiklikleri Kaydet</button>
      </div>
    </div>
  </div>
</div>
<div class="loading" style="background: rgba(0,0,0,0.7); position: fixed; display: none; left: 0; top: 0; right: 0; bottom: 0; z-index: 1250;">
    <span style="text-align: center; margin-top: 250px; color: #fff; width: 100%; display: block;">
      <i class="fa fa-spinner fa-spin" style="font-size: 35px"></i><br><br>
      Lütfen bekleyin değerler getiriliyor...
    </span>
</div>
  <script type="text/javascript" src="view/javascript/summernote/summernote.js"></script>
  <link href="view/javascript/summernote/summernote.css" rel="stylesheet" />
  <script type="text/javascript" src="view/javascript/summernote/opencart.js"></script>
<script type="text/javascript">
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
            }
            if(json['next']){
                productsend(json['next']);
            } else {
               $('.allsend').button('reset');
            }
          
        }
      });
    }


    $(document).on('click', '.savedesc', function(){
      $('textarea[name="n11_description"]').html($('.summernote').summernote('code'));
       $.ajax({
          url: 'index.php?route=n11/product/descsave&user_token=<?php echo $user_token; ?>',
          type: 'post',
          dataType: 'json',
          data : $('#descform').serialize(),
          success: function(json) {
             if(json.status == 1){
                $('#descmodal').modal('hide');
                $('#descmodal .modal-body').html('');
                $.toast({heading: 'Başarılı',text: json.msg, position: 'top-right',loader: false,allowToastClose: false,showHideTransition: 'slide',icon: 'success'});
             }
          }
        });
    });

    $(document).on('click', '.saveattr', function(){
       $.ajax({
          url: 'index.php?route=trendyol/products/attrsave&user_token=<?php echo $user_token; ?>',
          type: 'post',
          dataType: 'json',
          data : $('#attrform').serialize(),
          success: function(json) {
             if(json.status == 1){
                $('#attrmodal').modal('hide');
                $('#attrmodal .modal-body').html('');
                $.toast({heading: 'Başarılı',text: json.msg, position: 'top-right',loader: false,allowToastClose: false,showHideTransition: 'slide',icon: 'success'});
                $('.attr_'+json.prodid).find('i').attr('style','color: #3bbf6f')
             } else {
                $.toast({heading: 'Hata',text: json.msg, position: 'top-right',loader: false,allowToastClose: false,showHideTransition: 'slide',icon: 'danger'});
             }
          }
        });
    });

    $(document).on('click','.setattr', function(e){
        $('.loading').fadeIn();
        $('body').addClass('modal-open');
        var ocid = $(this).data('ocid');
        $( "#attrmodal .modal-body" ).load( "index.php?route=trendyol/products/getattr&user_token=<?php echo $user_token; ?>&product_id="+ocid, function() {
           $('#attrmodal').modal('show');
           $('.loading').fadeOut();
           e.preventDefault();
        });
    });

   

    $('.eslestirme').editable({
        mode : 'inline',
        typeahead: {
            remote: 'index.php?route=trendyol/category/trendyol_kategoriara&user_token=<?php echo $user_token; ?>&filter_name=%QUERY',
            displayKey: 'name',
            valueKey : 'name',
            emptytext: 'Kategorisi Eşleştirilmemiş',
            display: function(item){ return item.name }
        }
    }).on('save', function(e, params) {
      console.log(params);
        if(params.newValue == ''){
          $.toast({heading: 'Başarılı',text: 'Eşleştirme Silindi!', position: 'top-right',loader: false,allowToastClose: false,showHideTransition: 'slide',icon: 'success'});
          $('.attr_'+params.response.product_id).html('Önce Kategoriyi Eşleştirin');
        } else {
          $.toast({heading: 'Başarılı',text: params.newValue +' Başarıyla Eşleşti', position: 'top-right',loader: false,allowToastClose: false,showHideTransition: 'slide',icon: 'success'});
          $('.attr_'+params.response.product_id).html('<a data-ocid="'+params.response.product_id+'"  data-nnid="'+params.response.trendyolcategory+'" class="btn btn-xs btn-warning setattr">Özellikleri Ayarla</a>');
        }
    });

    $('.togselect input[type=checkbox]').bootstrapToggle({
        on: '<i class="fa fa-check" aria-hidden="true"></i>',
        off: '<i class="fa fa-times" aria-hidden="true"></i>'
    });

    $('.nproductstatus').on('change', function(){
      var product_id = $(this).data('value');
      if ($(this).is(':checked')) { var status = 4; } else { var status = 0; }
      $.ajax({
        url: 'index.php?route=trendyol/products/changeprodstatus&user_token=<?php echo $user_token; ?>&product_id='+product_id+'&status='+status,
        dataType: 'json',
        success: function(json) {   
            if(json.status == 1){
                $.toast({heading: 'Başarılı', text: json.msg, position: 'top-right',loader: false,allowToastClose: false,showHideTransition: 'slide',icon: 'success'});
            }
            if(json.status == 0){
                $.toast({heading: 'Hata', text: json.msg, position: 'top-right',loader: false,allowToastClose: false,showHideTransition: 'slide',icon: 'danger'});
            }
        }
      });
    });


    $(document).ready(function() {
        $('.komisyon').editable({mode : 'inline', inputclass: 'intclass input-sm'});
    });

  $('#button-filter').on('click', function() {
  var url = 'index.php?route=trendyol/products&user_token=<?php echo $user_token; ?>';
  var filter_name = $('input[name=\'filter_name\']').val();
  if (filter_name) {
    url += '&filter_name=' + encodeURIComponent(filter_name);
  }

  var filter_model = $('input[name=\'filter_model\']').val();
  if (filter_model) {
    url += '&filter_model=' + encodeURIComponent(filter_model);
  }

  var filter_eslesme = $('select[name=\'filter_eslesme\']').val();
  if (filter_eslesme) {
    url += '&filter_eslesme=' + encodeURIComponent(filter_eslesme);
  }

  var filter_category = $('input[name=\'filter_category\']').val();
  if (filter_category) {
    url += '&filter_category=' + encodeURIComponent(filter_category);
  } else {
    $('input[name=\'filter_category_id\']').val('');
  }
  var filter_category_id = $('input[name=\'filter_category_id\']').val();
  if (filter_category_id) {
    url += '&filter_category_id=' + encodeURIComponent(filter_category_id);
  }

  

  var filter_manufacturer = $('input[name=\'filter_manufacturer\']').val();
  if (filter_manufacturer) {
    url += '&filter_manufacturer=' + encodeURIComponent(filter_manufacturer);
  } else {
    $('input[name=\'filter_manufacturer_id\']').val('');
  }
  var filter_manufacturer_id = $('input[name=\'filter_manufacturer_id\']').val();
  if (filter_manufacturer_id) {
    url += '&filter_manufacturer_id=' + encodeURIComponent(filter_manufacturer_id);
  }

  var filter_price = $('input[name=\'filter_price\']').val();
  if (filter_price) {
    url += '&filter_price=' + encodeURIComponent(filter_price);
  }

  var filter_quantity = $('input[name=\'filter_quantity\']').val();
  if (filter_quantity) {
    url += '&filter_quantity=' + encodeURIComponent(filter_quantity);
  }

  var filter_status = $('select[name=\'filter_status\']').val();
  if (filter_status != '*') {
    url += '&filter_status=' + encodeURIComponent(filter_status);
  }

  var filter_trendstatus = $('select[name=\'filter_trendstatus\']').val();
  if (filter_trendstatus != '*') {
    url += '&filter_trendstatus=' + encodeURIComponent(filter_trendstatus);
  }

  location = url;
});

$('input[name=\'filter_name\']').autocomplete({
  'source': function(request, response) {
    $.ajax({
      url: 'index.php?route=catalog/product/autocomplete&user_token=<?php echo $user_token; ?>&filter_name=' +  encodeURIComponent(request),
      dataType: 'json',
      success: function(json) {
        response($.map(json, function(item) {
          return {
            label: item['name'],
            value: item['product_id']
          }
        }));
      }
    });
  },
  'select': function(item) {
    $('input[name=\'filter_name\']').val(item['label']);
  }
});

// Category
$('input[name=\'filter_category\']').autocomplete({
  minLength: 4,
  'source': function(request, response) {
    $.ajax({
      url: 'index.php?route=catalog/category/autocomplete&user_token=<?php echo $user_token; ?>&filter_name=' +  encodeURIComponent(request),
      dataType: 'json',
      success: function(json) {
        response($.map(json, function(item) {
          return {
            label: item['name'],
            value: item['category_id']
          }
        }));
      }
    });
  },
  'select': function(item) {
    $('input[name=filter_category]').val(item['label']);
    $('input[name=filter_category_id]').val(item['value']);
  }
});

$('input[name=\'filter_model\']').autocomplete({
  'source': function(request, response) {
    $.ajax({
      url: 'index.php?route=catalog/product/autocomplete&user_token=<?php echo $user_token; ?>&filter_model=' +  encodeURIComponent(request),
      dataType: 'json',
      success: function(json) {
        response($.map(json, function(item) {
          return {
            label: item['model'],
            value: item['product_id']
          }
        }));
      }
    });
  },
  'select': function(item) {
    $('input[name=\'filter_model\']').val(item['label']);
  }
});

$('input[name=\'filter_manufacturer\']').autocomplete({
  'source': function(request, response) {
    $.ajax({
      url: 'index.php?route=catalog/manufacturer/autocomplete&user_token=<?php echo $user_token; ?>&filter_name=' +  encodeURIComponent(request),
      dataType: 'json',
      success: function(json) {
        response($.map(json, function(item) {
          return {
            label: item['name'],
            value: item['manufacturer_id']
          }
        }));
      }
    });
  },
  'select': function(item) {
    $('input[name=\'filter_manufacturer\']').val(item['label']);
    $('input[name=\'filter_manufacturer_id\']').val(item['value']);
  }
});

// toplu n11 kategori 
$('input[name=\'toplu_n11category\']').autocomplete({
  minLength: 30,
  'source': function(request, response) {
    $.ajax({
      url: 'index.php?route=trendyol/category/n11tkategoriara&user_token=<?php echo $user_token; ?>&filter_name=' +  encodeURIComponent(request),
      dataType: 'json',
      success: function(json) {
        response($.map(json, function(item) {
          return {
            label: item['name'],
            value: item['category_id']
          }
        }));
      }
    });
  },
  'select': function(item) {
    $(".toplu_ozellik").load( "index.php?route=n11/category/toplu_ozelliksifirla&user_token=<?php echo $user_token; ?>&nnid="+item['value'], function() {
        $('input[name=toplu_n11category]').val(item['label']);
        $('input[name=toplu_n11categoryid]').val(item['value']);
        e.preventDefault();
    });
  }
}).focus(function(){            
    $('input[name=toplu_n11category]').val('');
    $('input[name=toplu_n11categoryid]').val('');
    $(".toplu_ozellik").html('-- Önce Kategori Eşleştirin --');
});

$(document).on('click','.set_topluattr', function(e){
    var nnid = $(this).data('nnid');
    $("#attrmodal .modal-footer").html('<button type="button" class="btn btn-default" data-dismiss="modal">Vazgeç</button><button type="button" class="btn btn-primary save_topluattr">Değişiklikleri Kaydet</button>');
    $( "#attrmodal .modal-body" ).load( "index.php?route=n11/category/getattr&user_token=<?php echo $user_token; ?>&nnid="+nnid, function() {
        $('#attrmodal').modal('show');
        e.preventDefault();
    });
});

$(document).on('click', '.save_topluattr', function(){
     $.ajax({
        url: 'index.php?route=n11/category/attrsave_toplu&user_token=<?php echo $user_token; ?>',
        type: 'post',
        dataType: 'json',
        data : $('#attrform').serialize(),
        success: function(json) {
           if(json.status == 1){
              $('#attrmodal').modal('hide');
              $('#attrmodal .modal-body').html('');
              $.toast({heading: 'Başarılı',text: json.msg, position: 'top-right',loader: false,allowToastClose: false,showHideTransition: 'slide',icon: 'success'});
           }
        }
      });
  });
</script>
<?php echo $footer; ?>