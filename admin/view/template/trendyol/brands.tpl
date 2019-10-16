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
                  <h4 class="col-lg-12 col-md-12 col-sm-12">MARKA İŞLEMLERİ</h4>
                  <p class="col-lg-12 col-md-12 col-sm-12">Bu sayfadan sitenizdeki markalarla trendyol.com markalarını eşleştirirsiniz, markaya iskonto tanımlaması yapabilirsiniz. Trendyol markaları trendyol.com'dan alınmakta olup, bulunmayan markalar için trendyol ile iletişime geçmelisiniz.</p>
                </div>
              </div>
              <div class="col-md-3">
                  <a class="btn btn-info btn-block pull-right starttool" onclick="starttool('index.php?route=trendyol/brands/downloadbrands&user_token=<?php echo $user_token; ?>')"><i class="fa fa-download"></i> TRENDYOL MARKALARINI İNDİR</a>
                  <a class="btn btn-primary btn-block pull-right" href="<?php echo $trendyol_markalari; ?>"><i class="fa fa-check"></i> TRENDYOL MARKALARINI GÖR</a>
              </div>
          </div>
          <hr>
          <div class="well">
                  <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Marka (Otm. Tamamlama)</label>
                          <input type="text" class="form-control input-sm" name="filter_manufacturer" value="<?php echo $filter_manufacturer; ?>">
                          <input type="hidden" name="filter_manufacturer_id" value="<?php echo $filter_manufacturer_id; ?>">
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
                      <div class="col-md-3"><button style="margin-top: 30px;" class="btn btn-primary btn-block btn-sm" id="button-filter">Markaları Getir</button></div>
                  </div>
                  
              </div>
          <table class="table table-bordered">
              <thead>
                <th>SİTE MARKA</th>
                <th>TRENDYOL MARKA</th>
                <th>KOMİSYON (%)</th>
              </thead>
              <tbody>
                <?php if($brands){ ?>
                  <?php foreach($brands as $brand){ ?>
                  <tr>
                    <td><?php echo $brand['name']; ?></td>
                    <td>
                      <?php if($brand['trend_id'] != 0 and $brand['trend_id'] != false){ ?>
                      <a href="#" class="eslestirme" data-type="typeaheadjs" data-pk="<?php echo $brand['manufacturer_id']; ?>" data-value="<?php echo $brand['trend_id'].' | '.$brand['trend_name']; ?>"  data-emptytext="Marka Eşleştirin" data-url="index.php?route=trendyol/brands/eslestir&user_token=<?php echo $user_token; ?>" data-title="Lütfen Kategori Arayın"></a>
                      <?php } else { ?>
                      <a href="#" class="eslestirme" data-type="typeaheadjs"  data-emptytext="Marka Eşleştirin" data-pk="<?php echo $brand['manufacturer_id']; ?>" data-value="" data-url="index.php?route=trendyol/brands/eslestir&user_token=<?php echo $user_token; ?>" data-title="Lütfen Marka Arayın"></a>
                      <?php } ?>
                    </td>
                    <td class="kmsyntd_<?php echo $brand['manufacturer_id']; ?>">
                      <?php if($brand['trend_id'] != 0 or $brand['trend_id'] != false){ ?>
                          <?php if($brand['komisyon'] != 0){ ?>
                          <a href="#" class="komisyon" data-type="text"  data-emptytext="Kar Marjı" data-pk="<?php echo $brand['manufacturer_id']; ?>" data-value="<?php echo $category['komisyon']; ?>" data-url="index.php?route=trendyol/brands/brand_komisyon&user_token=<?php echo $user_token; ?>" data-title="Kategori Komisyon Oranını Girin">%<?php echo $brand['komisyon']; ?></a>
                          <?php } else { ?>
                          <a href="#" class="komisyon" data-type="text"  data-emptytext="Kar Marjı" data-pk="<?php echo $brand['manufacturer_id']; ?>" data-value="" data-url="index.php?route=trendyol/brands/brand_komisyon&user_token=<?php echo $user_token; ?>" data-title="Kategori Komisyon Oranını Girin"></a>
                          <?php } ?>
                      <?php } else { ?>
                        - Lütfen Marka Eşleştirin -
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
    var url = 'index.php?route=trendyol/brands&user_token=<?php echo $user_token; ?>';
    var filter_status = $('select[name=\'filter_status\']').val();
    if (filter_status) {
      url += '&filter_status=' + encodeURIComponent(filter_status);
    }

    var filter_eslesme = $('select[name=\'filter_eslesme\']').val();
    if (filter_eslesme) {
      url += '&filter_eslesme=' + encodeURIComponent(filter_eslesme);
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

    var filter_komisyon = $('select[name=\'filter_komisyon\']').val();
    if (filter_komisyon) {
      url += '&filter_komisyon=' + encodeURIComponent(filter_komisyon);
    }

    location = url;
  });

  $(document).ready(function(){
   
    $('.eslestirme').editable({
        mode : 'inline',
        typeahead: {
            limit: 200,
            remote: 'index.php?route=trendyol/brands/trendyol_markaara&user_token=<?php echo $user_token; ?>&filter_name=%QUERY',
            displayKey: 'name',
            valueKey : 'name',
            display: function(item){ return item.name }
        }
    }).on('save', function(e, params) {
      console.log(params);
        if(params.newValue == ''){
          $.toast({heading: 'Başarılı',text: 'Eşleştirme Silindi!', position: 'top-right',loader: false,allowToastClose: false,showHideTransition: 'slide',icon: 'success'});
          $('.kmsyntd_'+params.response.ocbrand).html('- Önce Marka Eşleştirin -');
        } else {
          $.toast({heading: 'Başarılı',text: params.newValue +' Başarıyla Eşleşti', position: 'top-right',loader: false,allowToastClose: false,showHideTransition: 'slide',icon: 'success'});
          $('.kmsyntd_'+params.response.ocbrand).html('<a href="#" class="komisyon" data-type="text"  data-emptytext="Kar Marjı" data-pk="'+params.response.ocbrand+'" data-value="" data-url="index.php?route=trendyol/brands/brand_komisyon&user_token=<?php echo $user_token; ?>" data-title="Marka Komisyon Oranını Girin"></a>');
          $('.komisyon').editable({mode : 'inline', inputclass: 'intclass input-sm'});
        }
    });

    $('.komisyon').editable({mode : 'inline', inputclass: 'intclass input-sm'});
  });

// Category
$('input[name=\'filter_manufacturer\']').autocomplete({
  minLength: 100,
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
    $('input[name=filter_manufacturer]').val(item['label']);
    $('input[name=filter_manufacturer_id]').val(item['value']);
  }
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