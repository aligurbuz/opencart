<?php 

$language_id = 2;
foreach($data['languages'] as $language) {
	if($language['language_id'] != 1) {
		$language_id = $language['language_id'];
	}
}

$output = array();
$output["portfolio_module"] = array (
  1 => 
  array (
    'title' => 
    array (
      1 => 'Portfolio',
      $language_id => 'Portfolio',
    ),
    'html' => 
    array (
      1 => '&lt;div id=&quot;tt-pageContent&quot;&gt;
  &lt;div class=&quot;container-indent&quot;&gt;
    &lt;div class=&quot;container-fluid-custom&quot;&gt;
      &lt;h1 class=&quot;tt-title-subpages noborder&quot;&gt;PORTFOLIO&lt;/h1&gt;
      &lt;div class=&quot;tt-portfolio-masonry&quot;&gt;
        &lt;div class=&quot;tt-filter-nav&quot;&gt;
          &lt;div class=&quot;button active&quot; data-filter=&quot;*&quot;&gt;ALL&lt;/div&gt;
          &lt;div class=&quot;button&quot; data-filter=&quot;.sort-value-01&quot;&gt;WOMEN&lt;/div&gt;
          &lt;div class=&quot;button&quot; data-filter=&quot;.sort-value-02&quot;&gt;MEN &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class=&quot;tt-portfolio-content layout-default tt-grid-col-2  tt-add-item&quot;&gt;
          &lt;div class=&quot;element-item sort-value-01&quot;&gt;
            &lt;figure&gt;
              &lt;img src=&quot;image/catalog/wokiee/portfolio/portfolio-col-grid-four-img-01.jpg&quot; alt=&quot;&quot;&gt;
              &lt;figcaption&gt;
                &lt;h6 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;TITLE&lt;/a&gt;&lt;/h6&gt;
                &lt;p&gt;
                  Lorem ipsum dolor sit amet cons.
                &lt;/p&gt;
                &lt;a href=&quot;image/catalog/wokiee/portfolio/portfolio-col-grid-four-img-01.jpg&quot; class=&quot;tt-btn-zomm&quot;&gt;&lt;/a&gt;
              &lt;/figcaption&gt;
            &lt;/figure&gt;
          &lt;/div&gt;
          &lt;div class=&quot;element-item sort-value-02&quot;&gt;
            &lt;figure&gt;
              &lt;img src=&quot;image/catalog/wokiee/portfolio/portfolio-col-grid-four-img-02.jpg&quot; alt=&quot;&quot;&gt;
              &lt;figcaption&gt;
                &lt;h6 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;TITLE&lt;/a&gt;&lt;/h6&gt;
                &lt;p&gt;
                  Lorem ipsum dolor sit amet cons.
                &lt;/p&gt;
                &lt;a href=&quot;image/catalog/wokiee/portfolio/portfolio-col-grid-four-img-02.jpg&quot; class=&quot;tt-btn-zomm&quot;&gt;&lt;/a&gt;
              &lt;/figcaption&gt;
            &lt;/figure&gt;
          &lt;/div&gt;
          &lt;div class=&quot;element-item sort-value-02&quot;&gt;
            &lt;figure&gt;
              &lt;img src=&quot;image/catalog/wokiee/portfolio/portfolio-col-grid-four-img-03.jpg&quot; alt=&quot;&quot;&gt;
              &lt;figcaption&gt;
                &lt;h6 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;TITLE&lt;/a&gt;&lt;/h6&gt;
                &lt;p&gt;
                  Lorem ipsum dolor sit amet cons.
                &lt;/p&gt;
                &lt;a href=&quot;image/catalog/wokiee/portfolio/portfolio-col-grid-four-img-03.jpg&quot; class=&quot;tt-btn-zomm&quot;&gt;&lt;/a&gt;
              &lt;/figcaption&gt;
            &lt;/figure&gt;
          &lt;/div&gt;
          &lt;div class=&quot;element-item sort-value-01&quot;&gt;
            &lt;figure&gt;
              &lt;img src=&quot;image/catalog/wokiee/portfolio/portfolio-col-grid-four-img-04.jpg&quot; alt=&quot;&quot;&gt;
              &lt;figcaption&gt;
                &lt;h6 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;TITLE&lt;/a&gt;&lt;/h6&gt;
                &lt;p&gt;
                  Lorem ipsum dolor sit amet cons.
                &lt;/p&gt;
                &lt;a href=&quot;image/catalog/wokiee/portfolio/portfolio-col-grid-four-img-04.jpg&quot; class=&quot;tt-btn-zomm&quot;&gt;&lt;/a&gt;
              &lt;/figcaption&gt;
            &lt;/figure&gt;
          &lt;/div&gt;
          &lt;div class=&quot;element-item sort-value-02&quot;&gt;
            &lt;figure&gt;
              &lt;img src=&quot;image/catalog/wokiee/portfolio/portfolio-col-grid-four-img-05.jpg&quot; alt=&quot;&quot;&gt;
              &lt;figcaption&gt;
                &lt;h6 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;TITLE&lt;/a&gt;&lt;/h6&gt;
                &lt;p&gt;
                  Lorem ipsum dolor sit amet cons.
                &lt;/p&gt;
                &lt;a href=&quot;image/catalog/wokiee/portfolio/portfolio-col-grid-four-img-05.jpg&quot; class=&quot;tt-btn-zomm&quot;&gt;&lt;/a&gt;
              &lt;/figcaption&gt;
            &lt;/figure&gt;
          &lt;/div&gt;
          &lt;div class=&quot;element-item sort-value-02&quot;&gt;
            &lt;figure&gt;
              &lt;img src=&quot;image/catalog/wokiee/portfolio/portfolio-col-grid-four-img-07.jpg&quot; alt=&quot;&quot;&gt;
              &lt;figcaption&gt;
                &lt;h6 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;TITLE&lt;/a&gt;&lt;/h6&gt;
                &lt;p&gt;
                  Lorem ipsum dolor sit amet cons.
                &lt;/p&gt;
                &lt;a href=&quot;image/catalog/wokiee/portfolio/portfolio-col-grid-four-img-07.jpg&quot; class=&quot;tt-btn-zomm&quot;&gt;&lt;/a&gt;
              &lt;/figcaption&gt;
            &lt;/figure&gt;
          &lt;/div&gt;
          &lt;div class=&quot;element-item sort-value-01&quot;&gt;
            &lt;figure&gt;
              &lt;img src=&quot;image/catalog/wokiee/portfolio/portfolio-col-grid-four-img-08.jpg&quot; alt=&quot;&quot;&gt;
              &lt;figcaption&gt;
                &lt;h6 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;TITLE&lt;/a&gt;&lt;/h6&gt;
                &lt;p&gt;
                  Lorem ipsum dolor sit amet cons.
                &lt;/p&gt;
                &lt;a href=&quot;image/catalog/wokiee/portfolio/portfolio-col-grid-four-img-08.jpg&quot; class=&quot;tt-btn-zomm&quot;&gt;&lt;/a&gt;
              &lt;/figcaption&gt;
            &lt;/figure&gt;
          &lt;/div&gt;
          &lt;div class=&quot;element-item sort-value-01&quot;&gt;
            &lt;figure&gt;
              &lt;img src=&quot;image/catalog/wokiee/portfolio/portfolio-col-grid-four-img-06.jpg&quot; alt=&quot;&quot;&gt;
              &lt;figcaption&gt;
                &lt;h6 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;TITLE&lt;/a&gt;&lt;/h6&gt;
                &lt;p&gt;
                  Lorem ipsum dolor sit amet cons.
                &lt;/p&gt;
                &lt;a href=&quot;image/catalog/wokiee/portfolio/portfolio-col-grid-four-img-06.jpg&quot; class=&quot;tt-btn-zomm&quot;&gt;&lt;/a&gt;
              &lt;/figcaption&gt;
            &lt;/figure&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
      &lt;div class=&quot;text-center isotop_showmore_js&quot;&gt;
        &lt;a href=&quot;#&quot; class=&quot;btn btn-border&quot;&gt;LOAD MORE&lt;/a&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;',
      $language_id => '&lt;div id=&quot;tt-pageContent&quot;&gt;
  &lt;div class=&quot;container-indent&quot;&gt;
    &lt;div class=&quot;container-fluid-custom&quot;&gt;
      &lt;h1 class=&quot;tt-title-subpages noborder&quot;&gt;PORTFOLIO&lt;/h1&gt;
      &lt;div class=&quot;tt-portfolio-masonry&quot;&gt;
        &lt;div class=&quot;tt-filter-nav&quot;&gt;
          &lt;div class=&quot;button active&quot; data-filter=&quot;*&quot;&gt;ALL&lt;/div&gt;
          &lt;div class=&quot;button&quot; data-filter=&quot;.sort-value-01&quot;&gt;WOMEN&lt;/div&gt;
          &lt;div class=&quot;button&quot; data-filter=&quot;.sort-value-02&quot;&gt;MEN &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class=&quot;tt-portfolio-content layout-default tt-grid-col-2  tt-add-item&quot;&gt;
          &lt;div class=&quot;element-item sort-value-01&quot;&gt;
            &lt;figure&gt;
              &lt;img src=&quot;image/catalog/wokiee/portfolio/portfolio-col-grid-four-img-01.jpg&quot; alt=&quot;&quot;&gt;
              &lt;figcaption&gt;
                &lt;h6 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;TITLE&lt;/a&gt;&lt;/h6&gt;
                &lt;p&gt;
                  Lorem ipsum dolor sit amet cons.
                &lt;/p&gt;
                &lt;a href=&quot;image/catalog/wokiee/portfolio/portfolio-col-grid-four-img-01.jpg&quot; class=&quot;tt-btn-zomm&quot;&gt;&lt;/a&gt;
              &lt;/figcaption&gt;
            &lt;/figure&gt;
          &lt;/div&gt;
          &lt;div class=&quot;element-item sort-value-02&quot;&gt;
            &lt;figure&gt;
              &lt;img src=&quot;image/catalog/wokiee/portfolio/portfolio-col-grid-four-img-02.jpg&quot; alt=&quot;&quot;&gt;
              &lt;figcaption&gt;
                &lt;h6 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;TITLE&lt;/a&gt;&lt;/h6&gt;
                &lt;p&gt;
                  Lorem ipsum dolor sit amet cons.
                &lt;/p&gt;
                &lt;a href=&quot;image/catalog/wokiee/portfolio/portfolio-col-grid-four-img-02.jpg&quot; class=&quot;tt-btn-zomm&quot;&gt;&lt;/a&gt;
              &lt;/figcaption&gt;
            &lt;/figure&gt;
          &lt;/div&gt;
          &lt;div class=&quot;element-item sort-value-02&quot;&gt;
            &lt;figure&gt;
              &lt;img src=&quot;image/catalog/wokiee/portfolio/portfolio-col-grid-four-img-03.jpg&quot; alt=&quot;&quot;&gt;
              &lt;figcaption&gt;
                &lt;h6 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;TITLE&lt;/a&gt;&lt;/h6&gt;
                &lt;p&gt;
                  Lorem ipsum dolor sit amet cons.
                &lt;/p&gt;
                &lt;a href=&quot;image/catalog/wokiee/portfolio/portfolio-col-grid-four-img-03.jpg&quot; class=&quot;tt-btn-zomm&quot;&gt;&lt;/a&gt;
              &lt;/figcaption&gt;
            &lt;/figure&gt;
          &lt;/div&gt;
          &lt;div class=&quot;element-item sort-value-01&quot;&gt;
            &lt;figure&gt;
              &lt;img src=&quot;image/catalog/wokiee/portfolio/portfolio-col-grid-four-img-04.jpg&quot; alt=&quot;&quot;&gt;
              &lt;figcaption&gt;
                &lt;h6 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;TITLE&lt;/a&gt;&lt;/h6&gt;
                &lt;p&gt;
                  Lorem ipsum dolor sit amet cons.
                &lt;/p&gt;
                &lt;a href=&quot;image/catalog/wokiee/portfolio/portfolio-col-grid-four-img-04.jpg&quot; class=&quot;tt-btn-zomm&quot;&gt;&lt;/a&gt;
              &lt;/figcaption&gt;
            &lt;/figure&gt;
          &lt;/div&gt;
          &lt;div class=&quot;element-item sort-value-02&quot;&gt;
            &lt;figure&gt;
              &lt;img src=&quot;image/catalog/wokiee/portfolio/portfolio-col-grid-four-img-05.jpg&quot; alt=&quot;&quot;&gt;
              &lt;figcaption&gt;
                &lt;h6 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;TITLE&lt;/a&gt;&lt;/h6&gt;
                &lt;p&gt;
                  Lorem ipsum dolor sit amet cons.
                &lt;/p&gt;
                &lt;a href=&quot;image/catalog/wokiee/portfolio/portfolio-col-grid-four-img-05.jpg&quot; class=&quot;tt-btn-zomm&quot;&gt;&lt;/a&gt;
              &lt;/figcaption&gt;
            &lt;/figure&gt;
          &lt;/div&gt;
          &lt;div class=&quot;element-item sort-value-02&quot;&gt;
            &lt;figure&gt;
              &lt;img src=&quot;image/catalog/wokiee/portfolio/portfolio-col-grid-four-img-07.jpg&quot; alt=&quot;&quot;&gt;
              &lt;figcaption&gt;
                &lt;h6 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;TITLE&lt;/a&gt;&lt;/h6&gt;
                &lt;p&gt;
                  Lorem ipsum dolor sit amet cons.
                &lt;/p&gt;
                &lt;a href=&quot;image/catalog/wokiee/portfolio/portfolio-col-grid-four-img-07.jpg&quot; class=&quot;tt-btn-zomm&quot;&gt;&lt;/a&gt;
              &lt;/figcaption&gt;
            &lt;/figure&gt;
          &lt;/div&gt;
          &lt;div class=&quot;element-item sort-value-01&quot;&gt;
            &lt;figure&gt;
              &lt;img src=&quot;image/catalog/wokiee/portfolio/portfolio-col-grid-four-img-08.jpg&quot; alt=&quot;&quot;&gt;
              &lt;figcaption&gt;
                &lt;h6 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;TITLE&lt;/a&gt;&lt;/h6&gt;
                &lt;p&gt;
                  Lorem ipsum dolor sit amet cons.
                &lt;/p&gt;
                &lt;a href=&quot;image/catalog/wokiee/portfolio/portfolio-col-grid-four-img-08.jpg&quot; class=&quot;tt-btn-zomm&quot;&gt;&lt;/a&gt;
              &lt;/figcaption&gt;
            &lt;/figure&gt;
          &lt;/div&gt;
          &lt;div class=&quot;element-item sort-value-01&quot;&gt;
            &lt;figure&gt;
              &lt;img src=&quot;image/catalog/wokiee/portfolio/portfolio-col-grid-four-img-06.jpg&quot; alt=&quot;&quot;&gt;
              &lt;figcaption&gt;
                &lt;h6 class=&quot;tt-title&quot;&gt;&lt;a href=&quot;#&quot;&gt;TITLE&lt;/a&gt;&lt;/h6&gt;
                &lt;p&gt;
                  Lorem ipsum dolor sit amet cons.
                &lt;/p&gt;
                &lt;a href=&quot;image/catalog/wokiee/portfolio/portfolio-col-grid-four-img-06.jpg&quot; class=&quot;tt-btn-zomm&quot;&gt;&lt;/a&gt;
              &lt;/figcaption&gt;
            &lt;/figure&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
      &lt;div class=&quot;text-center isotop_showmore_js&quot;&gt;
        &lt;a href=&quot;#&quot; class=&quot;btn btn-border&quot;&gt;LOAD MORE&lt;/a&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;',
    ),
  ),
); 

$this->model_setting_setting->editSetting( "portfolio_module", $output );	

?>