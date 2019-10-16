<?php 

$language_id = 2;
foreach($data['languages'] as $language) {
	if($language['language_id'] != 1) {
		$language_id = $language['language_id'];
	}
}

$output = array();
$output["gift_card_module"] = array (
  1 => 
  array (
    'title' => 
    array (
      1 => 'Gift card',
      $language_id => 'Gift card',
    ),
    'html' => 
    array (
      1 => '&lt;!DOCTYPE html&gt;
&lt;html lang=&quot;en&quot;&gt;
&lt;head&gt;
  &lt;meta charset=&quot;utf-8&quot;&gt;
  &lt;title&gt;Wokiee - Responsive OpenCart Theme&lt;/title&gt;
  &lt;meta name=&quot;keywords&quot; content=&quot;OpenCart Theme&quot;&gt;
  &lt;meta name=&quot;description&quot; content=&quot;Wokiee - Responsive OpenCart Theme&quot;&gt;
  &lt;meta name=&quot;author&quot; content=&quot;wokiee&quot;&gt;
  &lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1, shrink-to-fit=no&quot;&gt;
  &lt;link rel=&quot;stylesheet&quot; href=&quot;catalog/view/theme/wokiee/css/stylesheet.css&quot;&gt;
&lt;/head&gt;
&lt;body&gt;
&lt;div id=&quot;tt-pageContent&quot;&gt;
  &lt;div class=&quot;container&quot;&gt;
    &lt;div class=&quot;tt-gift-layout&quot;&gt;
      &lt;a class=&quot;tt-logo&quot; href=&quot;index.html&quot;&gt;&lt;img class=&quot;tt-retina&quot; src=&quot;image/catalog/wokiee/custom/logo.png&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
      &lt;h1 class=&quot;tt-title&quot;&gt;YOUR GIFT CARD&lt;/h1&gt;
      &lt;div class=&quot;tt-gift-box&quot;&gt;
        &lt;img src=&quot;image/catalog/wokiee/custom/gift-img-01.png&quot; alt=&quot;&quot;&gt;
        &lt;div class=&quot;tt-description&quot;&gt;
          &lt;div class=&quot;tt-sum&quot;&gt;$100&lt;/div&gt;
          &lt;div class=&quot;tt-code&quot;&gt;&lt;span&gt;A1B2 3C4D 5E6F 7G8H&lt;/span&gt;&lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
      &lt;p&gt;
        Use this code at checkout ti redeem you $25 gift card
      &lt;/p&gt;
      &lt;div class=&quot;tt-gift-dissembled&quot;&gt;
        &lt;img src=&quot;image/catalog/wokiee/custom/gift-img-02.png&quot; alt=&quot;&quot;&gt;
      &lt;/div&gt;
      &lt;a href=&quot;#&quot; class=&quot;btn btn-border tt-icon-right&quot;&gt;START SHOPPING &lt;i class=&quot;icon-e-20&quot;&gt;&lt;/i&gt;&lt;/a&gt;
      &lt;a href=&quot;index.html&quot; class=&quot;btn-link&quot;&gt;&lt;i class=&quot;icon-g-55&quot;&gt;&lt;/i&gt;CONTINUE SHOPPING&lt;/a&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;
&lt;/body&gt;
&lt;/html&gt;',
      $language_id => '&lt;!DOCTYPE html&gt;
&lt;html lang=&quot;en&quot;&gt;
&lt;head&gt;
  &lt;meta charset=&quot;utf-8&quot;&gt;
  &lt;title&gt;Wokiee - Responsive OpenCart Theme&lt;/title&gt;
  &lt;meta name=&quot;keywords&quot; content=&quot;OpenCart Theme&quot;&gt;
  &lt;meta name=&quot;description&quot; content=&quot;Wokiee - Responsive OpenCart Theme&quot;&gt;
  &lt;meta name=&quot;author&quot; content=&quot;wokiee&quot;&gt;
  &lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1, shrink-to-fit=no&quot;&gt;
  &lt;link rel=&quot;stylesheet&quot; href=&quot;catalog/view/theme/wokiee/css/stylesheet.css&quot;&gt;
&lt;/head&gt;
&lt;body&gt;
&lt;div id=&quot;tt-pageContent&quot;&gt;
  &lt;div class=&quot;container&quot;&gt;
    &lt;div class=&quot;tt-gift-layout&quot;&gt;
      &lt;a class=&quot;tt-logo&quot; href=&quot;index.html&quot;&gt;&lt;img class=&quot;tt-retina&quot; src=&quot;image/catalog/wokiee/custom/logo.png&quot; alt=&quot;&quot;&gt;&lt;/a&gt;
      &lt;h1 class=&quot;tt-title&quot;&gt;YOUR GIFT CARD&lt;/h1&gt;
      &lt;div class=&quot;tt-gift-box&quot;&gt;
        &lt;img src=&quot;image/catalog/wokiee/custom/gift-img-01.png&quot; alt=&quot;&quot;&gt;
        &lt;div class=&quot;tt-description&quot;&gt;
          &lt;div class=&quot;tt-sum&quot;&gt;$100&lt;/div&gt;
          &lt;div class=&quot;tt-code&quot;&gt;&lt;span&gt;A1B2 3C4D 5E6F 7G8H&lt;/span&gt;&lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
      &lt;p&gt;
        Use this code at checkout ti redeem you $25 gift card
      &lt;/p&gt;
      &lt;div class=&quot;tt-gift-dissembled&quot;&gt;
        &lt;img src=&quot;image/catalog/wokiee/custom/gift-img-02.png&quot; alt=&quot;&quot;&gt;
      &lt;/div&gt;
      &lt;a href=&quot;#&quot; class=&quot;btn btn-border tt-icon-right&quot;&gt;START SHOPPING &lt;i class=&quot;icon-e-20&quot;&gt;&lt;/i&gt;&lt;/a&gt;
      &lt;a href=&quot;index.html&quot; class=&quot;btn-link&quot;&gt;&lt;i class=&quot;icon-g-55&quot;&gt;&lt;/i&gt;CONTINUE SHOPPING&lt;/a&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;
&lt;/body&gt;
&lt;/html&gt;',
    ),
  ),
); 

$this->model_setting_setting->editSetting( "gift_card_module", $output );	

?>