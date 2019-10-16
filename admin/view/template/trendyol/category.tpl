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
                  <h4 class="col-lg-12 col-md-12 col-sm-12">KATEGORİ İŞLEMLERİ</h4>
                  <p class="col-lg-12 col-md-12 col-sm-12">Bu sayfadan kategori eşleştirmelerinizi yapabilir ve kategori için özel komisyon oranlarını ayarlayabilirsiniz. Trendyol kategorilerini görmek için trendyol kategorileri sayfasına gidiniz. Trendyol Kategorilerini indirmek için trendyol kategorilerini indir butonuna tıklayınız.</p>
                </div>
              </div>
              <div class="col-md-3">
                  <a class="btn btn-info btn-block pull-right starttool" onclick="starttool('index.php?route=trendyol/category/downloadcategory&user_token=<?php echo $user_token; ?>')"><i class="fa fa-download"></i> TRENDYOL KATEGORİLERİNİ İNDİR</a>
                   <a class="btn btn-info btn-block pull-right starttool" onclick="starttool('index.php?route=trendyol/category/downloadcatAttr&user_token=<?php echo $user_token; ?>')"><i class="fa fa-download"></i> KATEGORİ ÖZELLİKLERİNİ İNDİR</a>
                  <a class="btn btn-primary btn-block pull-right" href="<?php echo $trendyol_kategorileri; ?>"><i class="fa fa-check"></i> TRENDYOL KATEGORİLERİNİ GÖR</a>
              </div>
          </div>
          <hr>
          <div class="well">
                  <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Kategori (Otm. Tamamlama)</label>
                          <input type="text" class="form-control input-sm" name="filter_category" value="<?php echo $filter_category; ?>">
                          <input type="hidden" name="filter_category_id" value="<?php echo $filter_category_id; ?>">
                        </div>
                      </div>
                      
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Eşleşme Durumu</label>
                          <select name="filter_eslesme" class="form-control input-sm">
                            <option value="">Tümü</option>
                            <?php if (isset($filter_eslesme) and $filter_eslesme == 1) { ?>
                            <option value="1" selected="selected">Eşleşenler</option>
                            <?php } else { ?>
                            <option value="1">Eşleşenler</option>
                            <?php } ?>
                            <?php if (isset($filter_eslesme) and $filter_eslesme == 0) { ?>
                            <option value="0" selected="selected">Eşleşmeyenler</option>
                            <?php } else { ?>
                            <option value="0">Eşleşmeyenler</option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Komisyon Durumu</label>
                          <select name="filter_komisyon" class="form-control input-sm">
                            <option value="">Tümü</option>
                            <?php if (isset($filter_komisyon) and $filter_komisyon == 1) { ?>
                            <option value="1" selected="selected">Var</option>
                            <?php } else { ?>
                            <option value="1">Var</option>
                            <?php } ?>
                            <?php if (isset($filter_komisyon) and $filter_komisyon == 0) { ?>
                            <option value="0" selected="selected">Yok</option>
                            <?php } else { ?>
                            <option value="0">Yok</option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3"><button style="margin-top: 30px;" class="btn btn-primary btn-block btn-sm" id="button-filter">Kategorileri Getir</button></div>
                  </div>
                  
              </div>
          <form id="toplu_eslestirme" method="post">
          <table class="table table-bordered">
              <thead>
                <th style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></th>
                <th>SİTE KATEGORİ</th>
                <th>TRENDYOL KATEGORİ</th>
                <th>ÖZELLİK AYARLA</th>
                <th>KOMİSYON (%)</th>
              </thead>
              <tbody>
                <?php if($categories){ ?>
                  <?php foreach($categories as $category){ ?>
                  <tr>
                    <td class="text-center">
                      <?php if (in_array($category['category_id'], $selected)) { ?>
                        <input type="checkbox" name="selected[]" value="<?php echo $category['category_id']; ?>" checked="checked" />
                      <?php } else { ?>
                        <input type="checkbox" name="selected[]" value="<?php echo $category['category_id']; ?>" />
                      <?php } ?>
                    </td>
                    <td><?php echo $category['name']; ?></td>
                    <td>
                      <?php if($category['trend_id'] != 0 and $category['trend_id'] != false){ ?>
                      <a href="#" class="eslestirme" data-type="typeaheadjs" data-pk="<?php echo $category['category_id']; ?>" data-value="<?php echo $category['trend_id'].' | '.$category['trend_name']; ?>"  data-emptytext="Kategori Eşleştirin" data-url="index.php?route=trendyol/category/eslestir&user_token=<?php echo $user_token; ?>" data-title="Lütfen Kategori Arayın"></a>
                      <?php } else { ?>
                      <a href="#" class="eslestirme" data-type="typeaheadjs"  data-emptytext="Kategori Eşleştirin" data-pk="<?php echo $category['category_id']; ?>" data-value="" data-url="index.php?route=trendyol/category/eslestir&user_token=<?php echo $user_token; ?>" data-title="Lütfen Kategori Arayın"></a>
                      <?php } ?>
                    </td>
                    <td class="attr_<?php echo $category['category_id']; ?>">
                      <?php if($category['trend_id'] == 0){ ?>Önce Kategoriyi Eşleştirin<?php } else { ?>
                      <a data-ocid="<?php echo $category['category_id']; ?>"  data-nnid="<?php echo $category['trend_id']; ?>" class="btn btn-xs btn-warning setattr">Özellikleri Ayarla</a>
                      <?php } ?>
                    </td>
                    <td class="kmsyntd_<?php echo $category['category_id']; ?>">
                      <?php if($category['trend_id'] != 0 or $category['trend_id'] != false){ ?>
                          <?php if($category['komisyon'] != 0){ ?>
                          <a href="#" class="komisyon" data-type="text"  data-emptytext="Kar Marjı" data-pk="<?php echo $category['category_id']; ?>" data-value="<?php echo $category['komisyon']; ?>" data-url="index.php?route=trendyol/category/category_komisyon&user_token=<?php echo $user_token; ?>" data-title="Kategori Komisyon Oranını Girin">%<?php echo $category['komisyon']; ?></a>
                          <?php } else { ?>
                          <a href="#" class="komisyon" data-type="text"  data-emptytext="Kar Marjı" data-pk="<?php echo $category['category_id']; ?>" data-value="" data-url="index.php?route=trendyol/category/category_komisyon&user_token=<?php echo $user_token; ?>" data-title="Kategori Komisyon Oranını Girin"></a>
                          <?php } ?>
                      <?php } else { ?>
                        - Lütfen Kategori Eşleştirin -
                      <?php } ?>
                    </td>
                  </tr>
                  <?php } ?>
                <?php } else { ?>
                <tr>
                  <td colspan="7"><center>Sonuç Bulunamadı</center></td>
                </tr>
                <?php } ?>
              </tbody>
          </table>
          <hr>
          <div class="row">
            <h4 class="col-lg-12 col-md-12 col-sm-12">TOPLU KATEGORİ EŞLEŞTİRME</h4>
            <p class="col-lg-12 col-md-12 col-sm-12">Bu alandan sayfada bulunan kategorileri toplu olarak eşleştirebilirsiniz, seçilen kategorileri eşleştirebilirsiniz</p>
          </div>
          <hr>
          
            <div class="row">
              <div class="col-md-7">
                <div class="form-group">
                  <label>Trendyol Kategorisi</label>
                  <input type="text" class="form-control input-sm" name="toplu_trendyolcategory">
                  <input type="hidden" name="toplu_trendyolcategoryid">
                </div>
              </div>
             
              <div class="col-md-3">
                <div class="form-group">
                  <label>Komisyon Oranı (%)</label>
                  <input type="int" name="toplu_komisyon" class="form-control input-sm" placeholder="Sadece Sayı">
                </div>
              </div>
              <div class="col-md-2">
                <button type="submit" class="btn btn-primary btn-sm" style="margin-top: 28px;">Seçilenleri Eşleştir</button>
              </div>
            </div>
          </form>
          <hr>
          <div class="row">
            <div class="col-sm-6 text-left"><?php echo $pagination; ?></div>
            <div class="col-sm-6 text-right"><?php echo $results; ?></div>
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
        <h4 class="modal-title" id="myModalLabel">Kategori Özelliklerini Ata</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer"></div>
    </div>
  </div>
</div>
<div class="loading" style="background: rgba(0,0,0,0.7); position: fixed; display: none; left: 0; top: 0; right: 0; bottom: 0; z-index: 1250;">
    <span style="text-align: center; margin-top: 250px; color: #fff; width: 100%; display: block;">
      <i class="fa fa-spinner fa-spin" style="font-size: 35px"></i><br><br>
      Lütfen bekleyin değerler getiriliyor...
    </span>
</div>
<script type="text/javascript">
  $('#button-filter').on('click', function() {
    var url = 'index.php?route=trendyol/category&user_token=<?php echo $user_token; ?>';
    var filter_status = $('select[name=\'filter_status\']').val();
    if (filter_status) {
      url += '&filter_status=' + encodeURIComponent(filter_status);
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

    var filter_komisyon = $('select[name=\'filter_komisyon\']').val();
    if (filter_komisyon) {
      url += '&filter_komisyon=' + encodeURIComponent(filter_komisyon);
    }

    location = url;
  });


    $(document).on('click', '.saveattr', function(){
     $.ajax({
        url: 'index.php?route=trendyol/category/attrsave&user_token=<?php echo $user_token; ?>',
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


  $(document).on('click','.setattr', function(e){
        $('.loading').fadeIn();
        $('body').addClass('modal-open');
        var ocid = $(this).data('ocid');
        var nnid = $(this).data('nnid');
        $("#attrmodal .modal-footer").html('<button type="button" class="btn btn-default" data-dismiss="modal">Vazgeç</button><button type="button" class="btn btn-primary saveattr">Değişiklikleri Kaydet</button>');
        $( "#attrmodal .modal-body" ).load( "index.php?route=trendyol/category/getattr&user_token=<?php echo $user_token; ?>&ocid="+ocid+"&nnid="+nnid, function() {
           $('#attrmodal').modal('show');
            $('.loading').fadeOut();
           e.preventDefault();
        });
    });


  $(document).ready(function(){
   
    $('.eslestirme').editable({
        mode : 'inline',
        typeahead: {
            limit: 200,
            remote: 'index.php?route=trendyol/category/trendyol_kategoriara&user_token=<?php echo $user_token; ?>&filter_name=%QUERY',
            displayKey: 'name',
            valueKey : 'name',
            display: function(item){ return item.name }
        }
    }).on('save', function(e, params) {
      console.log(params);
        if(params.newValue == ''){
          $.toast({heading: 'Başarılı',text: 'Eşleştirme Silindi!', position: 'top-right',loader: false,allowToastClose: false,showHideTransition: 'slide',icon: 'success'});
          $('.kmsyntd_'+params.response.opcategory).html('- Önce Kategoriyi Eşleştirin -');
        } else {
          $.toast({heading: 'Başarılı',text: params.newValue +' Başarıyla Eşleşti', position: 'top-right',loader: false,allowToastClose: false,showHideTransition: 'slide',icon: 'success'});
          $('.kmsyntd_'+params.response.opcategory).html('<a href="#" class="komisyon" data-type="text"  data-emptytext="Kar Marjı" data-pk="'+params.response.opcategory+'" data-value="" data-url="index.php?route=trendyol/category/category_komisyon&user_token=<?php echo $user_token; ?>" data-title="Kategori Komisyon Oranını Girin"></a>');
          $('.komisyon').editable({mode : 'inline', inputclass: 'intclass input-sm'});
        }
    });

    $('.komisyon').editable({mode : 'inline', inputclass: 'intclass input-sm'});
  });

// Category
$('input[name=\'filter_category\']').autocomplete({
  minLength: 100,
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

// toplu n11 kategori 
$('input[name=\'toplu_trendyolcategory\']').autocomplete({
  minLength: 30,
  'source': function(request, response) {
    $.ajax({
      url: 'index.php?route=trendyol/category/trendyol_kategoriara&user_token=<?php echo $user_token; ?>&filter_name=' +  encodeURIComponent(request),
      dataType: 'json',
      success: function(json) {
        response($.map(json, function(item) {
          return {
            label: item['name'],
            value: item['cid']
          }
        }));
      }
    });
  },
  'select': function(item) {
      $('input[name=toplu_trendyolcategory]').val(item['label']);
      $('input[name=toplu_trendyolcategoryid]').val(item['value']);
      e.preventDefault();
  }
}).focus(function(){            
    $('input[name=toplu_trendyolcategory]').val('');
    $('input[name=toplu_trendyolcategoryid]').val('');
});

  function starttool(url) {
      $.ajax({
        url: url,
        type: 'post',
        dataType: 'json',
        beforeSend: function() {
            $('.starttool').button('loading');
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
               $('.starttool').button('reset');
            }
        }
      });
  }
</script>
<?php echo $footer; ?>