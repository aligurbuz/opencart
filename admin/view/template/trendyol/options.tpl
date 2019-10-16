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
                  <h4 class="col-lg-12 col-md-12 col-sm-12">SEÇENEK İŞLEMLERİ</h4>
                  <p class="col-lg-12 col-md-12 col-sm-12">Bu sayfadan opencart seçenekleriniz ile trendyol seçeneklerinizi eşitlemelisiniz, eşitleme yapmadığınız takdirde ürünleriniz varyantlı olarak gitmemektedir.</p>
                </div>
              </div>
          </div>
          <hr>
          <table class="table table-bordered">
              <thead>
                <th>SİTE SEÇENEK</th>
                <th>TRENDYOL SEÇENEK</th>
                <th>DEĞERLERİ EŞLEŞTİRİN</th>
              </thead>
              <tbody>
                <?php if($options){ ?>
                  <?php foreach($options as $option){ ?>
                  <tr>
                    <td><?php echo $option['name']; ?></td>
                    <td>
                      <?php if($option['trend_id'] != 0 and $option['trend_id'] != false){ ?>
                      <a href="#" class="eslestirme" data-type="typeaheadjs" data-pk="<?php echo $option['option_id']; ?>" data-value="<?php echo $option['trend_id'].' | '.$option['trend_name']; ?>"  data-emptytext="Seçenek Eşleştirin" data-url="index.php?route=trendyol/options/optioneslestir&user_token=<?php echo $user_token; ?>" data-title="Lütfen Seçenek Arayın"></a>
                      <?php } else { ?>
                      <a href="#" class="eslestirme" data-type="typeaheadjs"  data-emptytext="Seçenek Eşleştirin" data-pk="<?php echo $option['option_id']; ?>" data-value="" data-url="index.php?route=trendyol/options/optioneslestir&user_token=<?php echo $user_token; ?>" data-title="Lütfen Seçenek Arayın"></a>
                      <?php } ?>
                    </td>
                    <td class="option_<?php echo $option['option_id']; ?>">
                      <?php if($option['trend_id'] == 0 OR $option['trend_id'] == false){ ?>Önce Seçenek Eşleştirin<?php } else { ?>
                      <a data-ocid="<?php echo $option['option_id']; ?>"  data-nnid="<?php echo $option['trend_id']; ?>" class="btn btn-xs btn-warning setopval">Değerleri Eşitle</a>
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
<div class="modal fade" id="oppmodal" tabindex="-1" role="dialog" aria-labelledby="attrmodallabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Seçenek Değerlerini Eşitle</h4>
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
  $(document).ready(function(){
    $('.eslestirme').editable({
        mode : 'inline',
        typeahead: {
            limit: 200,
            remote: 'index.php?route=trendyol/options/trendyol_optionara&user_token=<?php echo $user_token; ?>&filter_name=%QUERY',
            displayKey: 'name',
            valueKey : 'name',
            display: function(item){ return item.name }
        }
    }).on('save', function(e, params) {
      console.log(params);
        if(params.newValue == ''){
          $.toast({heading: 'Başarılı',text: 'Eşleştirme Silindi!', position: 'top-right',loader: false,allowToastClose: false,showHideTransition: 'slide',icon: 'success'});
          $('.option_'+params.response.oc_optionid).html('- Önce Seçenek Eşleştirin -');
        } else {
          $.toast({heading: 'Başarılı',text: params.newValue +' Başarıyla Eşleşti', position: 'top-right',loader: false,allowToastClose: false,showHideTransition: 'slide',icon: 'success'});
          $('.option_'+params.response.oc_optionid).html('<a data-ocid="'+params.response.oc_optionid+'"  data-nnid="'+params.response.trend_id+'" class="btn btn-xs btn-warning setopval">Değerleri Eşitle</a>');
        }
    });
  });

  $(document).on('click', '.saveattr', function(){
     $.ajax({
        url: 'index.php?route=trendyol/options/opvalsave&user_token=<?php echo $user_token; ?>',
        type: 'post',
        dataType: 'json',
        data : $('#opvalform').serialize(),
        success: function(json) {
           if(json.status == 1){
              $('#oppmodal').modal('hide');
              $('#oppmodal .modal-body').html('');
              $.toast({heading: 'Başarılı',text: json.msg, position: 'top-right',loader: false,allowToastClose: false,showHideTransition: 'slide',icon: 'success'});
           }
        }
      });
  });


  $(document).on('click','.setopval', function(e){
        $('.loading').fadeIn();
        $('body').addClass('modal-open');
        var ocid = $(this).data('ocid');
        var nnid = $(this).data('nnid');
        $("#oppmodal .modal-footer").html('<button type="button" class="btn btn-default" data-dismiss="modal">Vazgeç</button><button type="button" class="btn btn-primary saveattr">Değişiklikleri Kaydet</button>');
        $( "#oppmodal .modal-body" ).load( "index.php?route=trendyol/options/getopvals&user_token=<?php echo $user_token; ?>&ocid="+ocid+"&nnid="+nnid, function() {
            $('#oppmodal').modal('show');
            $('.loading').fadeOut();
           e.preventDefault();
        });
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