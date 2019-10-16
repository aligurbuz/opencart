<?php echo $header; ?><?php echo $column_left; ?>
<form method="post" id="step1form">
<div id="content">
  <div class="page-header">
    <div class="container-fluid"></div>
  </div>
  <div class="container-fluid" id="content">
  <div class="col-md-8 col-centered">
  <center><img src="view/template/trendyol/asset/istn112.png" style="margin-bottom: 20px;"></center>
  <div class="panel panel-default">
        <div class="panel-heading" style="font-weight: bold; font-size: 14px;"><?php echo $heading_title; ?></div>
        <div class="panel-body install-panel">
              <center><i class="fa fa-spinner fa-spin"></i> Kategoriler İndiriliyor Bekleyiniz...</center>
          </div>
        </div>
  </div>
</div>
</div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
      starttool('index.php?route=trendyol/category/downloadcategory&user_token=<?php echo $user_token; ?>');
  });

   function starttool(url) {
      $.ajax({
        url: url,
        type: 'post',
        dataType: 'json',
        success: function(json) {
            if (json.status == 0) {
                $('.install-panel').prepend('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> ' + json.msg + '</div>');
            }
            if (json.status == 1){
                $('.install-panel').prepend('<div class="alert alert-success"><i class="fa fa-check-circle"></i>  ' + json.msg + '</div>');
            }
            if(json['next']){
                starttool(json['next']);
            } else {
               window.location.href = "index.php?route=trendyol/install/step4&user_token=<?php echo $user_token; ?>"; 
            }
        }
      });
  }
</script>
<?php echo $footer; ?>
