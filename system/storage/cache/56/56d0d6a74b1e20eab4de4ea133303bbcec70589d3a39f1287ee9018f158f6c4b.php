<?php

/* marketplace/marketplace_list.twig */
class __TwigTemplate_ac4f2344881f1da2ed11b188573afd4e31eca1fba9ec5c0360a4d6078d7c1d17 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo (isset($context["header"]) ? $context["header"] : null);
        echo (isset($context["column_left"]) ? $context["column_left"] : null);
        echo "
<div id=\"content\">
  <div class=\"page-header\">
    <div class=\"container-fluid\">
      <div class=\"pull-right\">";
        // line 5
        if ( !(isset($context["error_signature"]) ? $context["error_signature"] : null)) {
            // line 6
            echo "        <button type=\"button\" id=\"button-opencart\" data-toggle=\"tooltip\" title=\"";
            echo (isset($context["button_opencart"]) ? $context["button_opencart"] : null);
            echo "\" class=\"btn btn-info\"><i class=\"fa fa-cog\"></i></button>
        ";
        } else {
            // line 8
            echo "        <button type=\"button\" id=\"button-opencart\" data-toggle=\"tooltip\" title=\"";
            echo (isset($context["error_signature"]) ? $context["error_signature"] : null);
            echo "\"  data-placement=\"left\" class=\"btn btn-danger\"><i class=\"fa fa-exclamation-triangle\"></i></button>
        ";
        }
        // line 9
        echo "</div>
      <h1>";
        // line 10
        echo (isset($context["heading_title"]) ? $context["heading_title"] : null);
        echo "</h1>
      <ul class=\"breadcrumb\">
        ";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["breadcrumbs"]) ? $context["breadcrumbs"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 13
            echo "        <li><a href=\"";
            echo $this->getAttribute($context["breadcrumb"], "href", array());
            echo "\">";
            echo $this->getAttribute($context["breadcrumb"], "text", array());
            echo "</a></li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 15
        echo "      </ul>
    </div>
  </div>
  <div class=\"container-fluid\">
    <div class=\"panel panel-default\">
      <div class=\"panel-heading\">
        <h3 class=\"panel-title\"><i class=\"fa fa-puzzle-piece\"></i> ";
        // line 21
        echo (isset($context["text_list"]) ? $context["text_list"] : null);
        echo "</h3>
      </div>
      <div class=\"panel-body\">
        <div class=\"well\">
          <div class=\"input-group\" id=\"extension-filter\">
            <input type=\"text\" name=\"filter_search\" value=\"";
        // line 26
        echo (isset($context["filter_search"]) ? $context["filter_search"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["text_search"]) ? $context["text_search"] : null);
        echo "\" class=\"form-control\" />
            <div class=\"input-group-btn\">";
        // line 27
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["categories"]) ? $context["categories"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 28
            echo "              ";
            if (($this->getAttribute($context["category"], "value", array()) == (isset($context["filter_category"]) ? $context["filter_category"] : null))) {
                // line 29
                echo "              <button type=\"button\" class=\"btn btn-default dropdown-toggle\" data-toggle=\"dropdown\">";
                echo (isset($context["text_category"]) ? $context["text_category"] : null);
                echo " (";
                echo $this->getAttribute($context["category"], "text", array());
                echo ") <span class=\"caret\"></span></button>
              ";
            }
            // line 31
            echo "              ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 32
        echo "              <ul class=\"dropdown-menu\">
                ";
        // line 33
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["categories"]) ? $context["categories"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 34
            echo "                <li><a href=\"";
            echo $this->getAttribute($context["category"], "href", array());
            echo "\">";
            echo $this->getAttribute($context["category"], "text", array());
            echo "</a></li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "              </ul>
              <input type=\"hidden\" name=\"filter_category_id\" value=\"";
        // line 37
        echo (isset($context["filter_category_id"]) ? $context["filter_category_id"] : null);
        echo "\" class=\"form-control\" />
              <input type=\"hidden\" name=\"filter_download_id\" value=\"";
        // line 38
        echo (isset($context["filter_download_id"]) ? $context["filter_download_id"] : null);
        echo "\" class=\"form-control\" />
              <input type=\"hidden\" name=\"filter_rating\" value=\"";
        // line 39
        echo (isset($context["filter_rating"]) ? $context["filter_rating"] : null);
        echo "\" class=\"form-control\" />
              <input type=\"hidden\" name=\"filter_license\" value=\"";
        // line 40
        echo (isset($context["filter_license"]) ? $context["filter_license"] : null);
        echo "\" class=\"form-control\" />
              <input type=\"hidden\" name=\"filter_partner\" value=\"";
        // line 41
        echo (isset($context["filter_partner"]) ? $context["filter_partner"] : null);
        echo "\" class=\"form-control\" />
              <input type=\"hidden\" name=\"sort\" value=\"";
        // line 42
        echo (isset($context["sort"]) ? $context["sort"] : null);
        echo "\" class=\"form-control\" />
              <button type=\"button\" id=\"button-filter\" class=\"btn btn-primary\"><i class=\"fa fa-filter\"></i></button>
            </div>
          </div>
        </div>
        <div class=\"row\">
          <div class=\"col-sm-9 col-xs-7\">
            <div class=\"btn-group\">";
        // line 49
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["licenses"]) ? $context["licenses"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["license"]) {
            // line 50
            echo "              ";
            if (($this->getAttribute($context["license"], "value", array()) == (isset($context["filter_license"]) ? $context["filter_license"] : null))) {
                echo "<a href=\"";
                echo $this->getAttribute($context["license"], "href", array());
                echo "\" class=\"btn btn-default active\">";
                echo $this->getAttribute($context["license"], "text", array());
                echo "</a>";
            } else {
                echo "<a href=\"";
                echo $this->getAttribute($context["license"], "href", array());
                echo "\" class=\"btn btn-default\">";
                echo $this->getAttribute($context["license"], "text", array());
                echo "</a>";
            }
            // line 51
            echo "              ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['license'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "</div>
          </div>
          <div class=\"col-sm-3 col-xs-5\">
            <div class=\"input-group pull-right\">
              <div class=\"input-group-addon\"><i class=\"fa fa-sort-amount-asc\"></i></div>
              <select onchange=\"location = this.value;\" class=\"form-control\">
                
              
            
              
                  ";
        // line 61
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($context["sorts"]);
        foreach ($context['_seq'] as $context["_key"] => $context["sorts"]) {
            // line 62
            echo "                  ";
            if (($this->getAttribute($context["sorts"], "value", array()) == (isset($context["sort"]) ? $context["sort"] : null))) {
                // line 63
                echo "                
              
            
              
                <option value=\"";
                // line 67
                echo $this->getAttribute($context["sorts"], "href", array());
                echo "\" selected=\"selected\">";
                echo $this->getAttribute($context["sorts"], "text", array());
                echo "</option>
                
              
            
              
                  ";
            } else {
                // line 73
                echo "                
              
            
              
                <option value=\"";
                // line 77
                echo $this->getAttribute($context["sorts"], "href", array());
                echo "\">";
                echo $this->getAttribute($context["sorts"], "text", array());
                echo "</option>
                
              
            
              
                  ";
            }
            // line 83
            echo "                  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sorts'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 84
        echo "              
            
          
            
              </select>
            </div>
          </div>
        </div>
        <br />
        <div id=\"extension-list\">";
        // line 93
        if ((isset($context["promotions"]) ? $context["promotions"] : null)) {
            // line 94
            echo "          <h3>Featured</h3>
          <div class=\"row\">";
            // line 95
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["promotions"]) ? $context["promotions"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["extension"]) {
                // line 96
                echo "            ";
                if ($context["extension"]) {
                    // line 97
                    echo "            <div class=\"col-lg-3 col-md-4 col-sm-6 col-xs-12\">
              <section>
                <div class=\"extension-preview\"><a href=\"";
                    // line 99
                    echo $this->getAttribute($context["extension"], "href", array());
                    echo "\">
                  <div class=\"extension-description\"></div>
                  <img src=\"";
                    // line 101
                    echo $this->getAttribute($context["extension"], "image", array());
                    echo "\" alt=\"";
                    echo $this->getAttribute($context["extension"], "name", array());
                    echo "\" title=\"";
                    echo $this->getAttribute($context["extension"], "name", array());
                    echo "\" class=\"img-responsive\" /></a></div>
                <div class=\"extension-name\">
                  <h4><a href=\"";
                    // line 103
                    echo $this->getAttribute($context["extension"], "href", array());
                    echo "\">";
                    echo $this->getAttribute($context["extension"], "name", array());
                    echo "</a></h4>
                  ";
                    // line 104
                    echo $this->getAttribute($context["extension"], "price", array());
                    echo "</div>
                <div class=\"extension-rate\">
                  <div class=\"row\">
                    <div class=\"col-xs-6\">";
                    // line 107
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(range(1, 5));
                    foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                        // line 108
                        echo "                      ";
                        if (($this->getAttribute($context["extension"], "rating", array()) >= $context["i"])) {
                            echo "<i class=\"fa fa-star\"></i>";
                        } else {
                            echo "<i class=\"fa fa-star-o\"></i>";
                        }
                        // line 109
                        echo "                      ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    echo "</div>
                    <div class=\"col-xs-6\">
                      <div class=\"text-right\">";
                    // line 111
                    echo $this->getAttribute($context["extension"], "rating_total", array());
                    echo " ";
                    echo (isset($context["text_reviews"]) ? $context["text_reviews"] : null);
                    echo "</div>
                    </div>
                  </div>
                </div>
              </section>
            </div>
            ";
                }
                // line 118
                echo "            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['extension'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo "</div>
          <hr />
          ";
        }
        // line 121
        echo "          
          ";
        // line 122
        if ((isset($context["extensions"]) ? $context["extensions"] : null)) {
            // line 123
            echo "          <div class=\"row\"> ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["extensions"]) ? $context["extensions"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["extension"]) {
                // line 124
                echo "            
            ";
                // line 125
                if ($context["extension"]) {
                    // line 126
                    echo "            <div class=\"col-lg-3 col-md-4 col-sm-6 col-xs-12\">
              <section>
                <div class=\"extension-preview\"><a href=\"";
                    // line 128
                    echo $this->getAttribute($context["extension"], "href", array());
                    echo "\">
                  <div class=\"extension-description\"></div>
                  <img src=\"";
                    // line 130
                    echo $this->getAttribute($context["extension"], "image", array());
                    echo "\" alt=\"";
                    echo $this->getAttribute($context["extension"], "name", array());
                    echo "\" title=\"";
                    echo $this->getAttribute($context["extension"], "name", array());
                    echo "\" class=\"img-responsive\" /></a></div>
                <div class=\"extension-name\">
                  <h4><a href=\"";
                    // line 132
                    echo $this->getAttribute($context["extension"], "href", array());
                    echo "\">";
                    echo $this->getAttribute($context["extension"], "name", array());
                    echo "</a></h4>
                  ";
                    // line 133
                    echo $this->getAttribute($context["extension"], "price", array());
                    echo "</div>
                <div class=\"extension-rate\">
                  <div class=\"row\">
                    <div class=\"col-xs-6\">";
                    // line 136
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(range(1, 5));
                    foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                        // line 137
                        echo "                      ";
                        if (($this->getAttribute($context["extension"], "rating", array()) >= $context["i"])) {
                            echo "<i class=\"fa fa-star\"></i>";
                        } else {
                            echo "<i class=\"fa fa-star-o\"></i>";
                        }
                        // line 138
                        echo "                      ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    echo "</div>
                    <div class=\"col-xs-6\">
                      <div class=\"text-right\">";
                    // line 140
                    echo $this->getAttribute($context["extension"], "rating_total", array());
                    echo " ";
                    echo (isset($context["text_reviews"]) ? $context["text_reviews"] : null);
                    echo "</div>
                    </div>
                  </div>
                </div>
              </section>
            </div>
            ";
                }
                // line 147
                echo "            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['extension'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo " </div>
          ";
        } else {
            // line 149
            echo "          <p class=\"text-center\">";
            echo (isset($context["text_no_results"]) ? $context["text_no_results"] : null);
            echo "</p>
          ";
        }
        // line 150
        echo " </div>
        <div class=\"row\">
          <div class=\"col-sm-12 text-center\">";
        // line 152
        echo (isset($context["pagination"]) ? $context["pagination"] : null);
        echo "</div>
        </div>
      </div>
    </div>
  </div>

<script type=\"text/javascript\"><!--
\$('#button-opencart').on('click', function(e) {
\t\$('#modal-opencart').remove();
\t
\t\$.ajax({
\t\turl: 'index.php?route=marketplace/api&user_token=";
        // line 163
        echo (isset($context["user_token"]) ? $context["user_token"] : null);
        echo "',
\t\tdataType: 'html',
\t\tbeforeSend: function() {
\t\t\t\$('#button-opencart').button('loading');
\t\t},
\t\tcomplete: function() {
\t\t\t\$('#button-opencart').button('reset');
\t\t},
\t\tsuccess: function(html) {
\t\t\t\$('body').append('<div id=\"modal-opencart\" class=\"modal\">' + html + '</div>');
\t\t\t
\t\t\t\$('#modal-opencart').modal('show');
\t\t},
\t\terror: function(xhr, ajaxOptions, thrownError) {
\t\t\talert(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
\t\t}
\t});
});
//--></script> 
<script type=\"text/javascript\"><!--
\$('#button-filter').on('click', function(e) {
\tvar url = 'index.php?route=marketplace/marketplace&user_token=";
        // line 184
        echo (isset($context["user_token"]) ? $context["user_token"] : null);
        echo "';

\tvar input = \$('#extension-filter :input');

\tfor (i = 0; i < input.length; i++) {
\t\tif (\$(input[i]).val() != '' && \$(input[i]).val() != null) {
\t\t\turl += '&' + \$(input[i]).attr('name') + '=' + \$(input[i]).val()
\t\t}
\t}

\tlocation = url;
});

\$('input[name=\"filter_search\"]').keydown(function(e) {
\tif (e.keyCode == 13) {
\t\te.preventDefault();

\t\t\$('#button-filter').trigger('click');
\t}
});
//--></script></div>
";
        // line 205
        echo (isset($context["footer"]) ? $context["footer"] : null);
        echo " ";
    }

    public function getTemplateName()
    {
        return "marketplace/marketplace_list.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  494 => 205,  470 => 184,  446 => 163,  432 => 152,  428 => 150,  422 => 149,  413 => 147,  401 => 140,  392 => 138,  385 => 137,  381 => 136,  375 => 133,  369 => 132,  360 => 130,  355 => 128,  351 => 126,  349 => 125,  346 => 124,  341 => 123,  339 => 122,  336 => 121,  326 => 118,  314 => 111,  305 => 109,  298 => 108,  294 => 107,  288 => 104,  282 => 103,  273 => 101,  268 => 99,  264 => 97,  261 => 96,  257 => 95,  254 => 94,  252 => 93,  241 => 84,  235 => 83,  224 => 77,  218 => 73,  207 => 67,  201 => 63,  198 => 62,  194 => 61,  177 => 51,  162 => 50,  158 => 49,  148 => 42,  144 => 41,  140 => 40,  136 => 39,  132 => 38,  128 => 37,  125 => 36,  114 => 34,  110 => 33,  107 => 32,  101 => 31,  93 => 29,  90 => 28,  86 => 27,  80 => 26,  72 => 21,  64 => 15,  53 => 13,  49 => 12,  44 => 10,  41 => 9,  35 => 8,  29 => 6,  27 => 5,  19 => 1,);
    }
}
/* {{ header }}{{ column_left }}*/
/* <div id="content">*/
/*   <div class="page-header">*/
/*     <div class="container-fluid">*/
/*       <div class="pull-right">{% if not error_signature %}*/
/*         <button type="button" id="button-opencart" data-toggle="tooltip" title="{{ button_opencart }}" class="btn btn-info"><i class="fa fa-cog"></i></button>*/
/*         {% else %}*/
/*         <button type="button" id="button-opencart" data-toggle="tooltip" title="{{ error_signature }}"  data-placement="left" class="btn btn-danger"><i class="fa fa-exclamation-triangle"></i></button>*/
/*         {% endif %}</div>*/
/*       <h1>{{ heading_title }}</h1>*/
/*       <ul class="breadcrumb">*/
/*         {% for breadcrumb in breadcrumbs %}*/
/*         <li><a href="{{ breadcrumb.href }}">{{ breadcrumb.text }}</a></li>*/
/*         {% endfor %}*/
/*       </ul>*/
/*     </div>*/
/*   </div>*/
/*   <div class="container-fluid">*/
/*     <div class="panel panel-default">*/
/*       <div class="panel-heading">*/
/*         <h3 class="panel-title"><i class="fa fa-puzzle-piece"></i> {{ text_list }}</h3>*/
/*       </div>*/
/*       <div class="panel-body">*/
/*         <div class="well">*/
/*           <div class="input-group" id="extension-filter">*/
/*             <input type="text" name="filter_search" value="{{ filter_search }}" placeholder="{{ text_search }}" class="form-control" />*/
/*             <div class="input-group-btn">{% for category in categories %}*/
/*               {% if category.value == filter_category %}*/
/*               <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">{{ text_category }} ({{ category.text }}) <span class="caret"></span></button>*/
/*               {% endif %}*/
/*               {% endfor %}*/
/*               <ul class="dropdown-menu">*/
/*                 {% for category in categories %}*/
/*                 <li><a href="{{ category.href }}">{{ category.text }}</a></li>*/
/*                 {% endfor %}*/
/*               </ul>*/
/*               <input type="hidden" name="filter_category_id" value="{{ filter_category_id }}" class="form-control" />*/
/*               <input type="hidden" name="filter_download_id" value="{{ filter_download_id }}" class="form-control" />*/
/*               <input type="hidden" name="filter_rating" value="{{ filter_rating }}" class="form-control" />*/
/*               <input type="hidden" name="filter_license" value="{{ filter_license }}" class="form-control" />*/
/*               <input type="hidden" name="filter_partner" value="{{ filter_partner }}" class="form-control" />*/
/*               <input type="hidden" name="sort" value="{{ sort }}" class="form-control" />*/
/*               <button type="button" id="button-filter" class="btn btn-primary"><i class="fa fa-filter"></i></button>*/
/*             </div>*/
/*           </div>*/
/*         </div>*/
/*         <div class="row">*/
/*           <div class="col-sm-9 col-xs-7">*/
/*             <div class="btn-group">{% for license in licenses %}*/
/*               {% if license.value == filter_license %}<a href="{{ license.href }}" class="btn btn-default active">{{ license.text }}</a>{% else %}<a href="{{ license.href }}" class="btn btn-default">{{ license.text }}</a>{% endif %}*/
/*               {% endfor %}</div>*/
/*           </div>*/
/*           <div class="col-sm-3 col-xs-5">*/
/*             <div class="input-group pull-right">*/
/*               <div class="input-group-addon"><i class="fa fa-sort-amount-asc"></i></div>*/
/*               <select onchange="location = this.value;" class="form-control">*/
/*                 */
/*               */
/*             */
/*               */
/*                   {% for sorts in sorts %}*/
/*                   {% if sorts.value == sort %}*/
/*                 */
/*               */
/*             */
/*               */
/*                 <option value="{{ sorts.href }}" selected="selected">{{ sorts.text }}</option>*/
/*                 */
/*               */
/*             */
/*               */
/*                   {% else %}*/
/*                 */
/*               */
/*             */
/*               */
/*                 <option value="{{ sorts.href }}">{{ sorts.text }}</option>*/
/*                 */
/*               */
/*             */
/*               */
/*                   {% endif %}*/
/*                   {% endfor %}*/
/*               */
/*             */
/*           */
/*             */
/*               </select>*/
/*             </div>*/
/*           </div>*/
/*         </div>*/
/*         <br />*/
/*         <div id="extension-list">{% if promotions %}*/
/*           <h3>Featured</h3>*/
/*           <div class="row">{% for extension in promotions %}*/
/*             {% if extension %}*/
/*             <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">*/
/*               <section>*/
/*                 <div class="extension-preview"><a href="{{ extension.href }}">*/
/*                   <div class="extension-description"></div>*/
/*                   <img src="{{ extension.image }}" alt="{{ extension.name }}" title="{{ extension.name }}" class="img-responsive" /></a></div>*/
/*                 <div class="extension-name">*/
/*                   <h4><a href="{{ extension.href }}">{{ extension.name }}</a></h4>*/
/*                   {{ extension.price }}</div>*/
/*                 <div class="extension-rate">*/
/*                   <div class="row">*/
/*                     <div class="col-xs-6">{% for i in 1..5 %}*/
/*                       {% if extension.rating >= i %}<i class="fa fa-star"></i>{% else %}<i class="fa fa-star-o"></i>{% endif %}*/
/*                       {% endfor %}</div>*/
/*                     <div class="col-xs-6">*/
/*                       <div class="text-right">{{ extension.rating_total }} {{ text_reviews }}</div>*/
/*                     </div>*/
/*                   </div>*/
/*                 </div>*/
/*               </section>*/
/*             </div>*/
/*             {% endif %}*/
/*             {% endfor %}</div>*/
/*           <hr />*/
/*           {% endif %}*/
/*           */
/*           {% if extensions %}*/
/*           <div class="row"> {% for extension in extensions %}*/
/*             */
/*             {% if extension %}*/
/*             <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">*/
/*               <section>*/
/*                 <div class="extension-preview"><a href="{{ extension.href }}">*/
/*                   <div class="extension-description"></div>*/
/*                   <img src="{{ extension.image }}" alt="{{ extension.name }}" title="{{ extension.name }}" class="img-responsive" /></a></div>*/
/*                 <div class="extension-name">*/
/*                   <h4><a href="{{ extension.href }}">{{ extension.name }}</a></h4>*/
/*                   {{ extension.price }}</div>*/
/*                 <div class="extension-rate">*/
/*                   <div class="row">*/
/*                     <div class="col-xs-6">{% for i in 1..5 %}*/
/*                       {% if extension.rating >= i %}<i class="fa fa-star"></i>{% else %}<i class="fa fa-star-o"></i>{% endif %}*/
/*                       {% endfor %}</div>*/
/*                     <div class="col-xs-6">*/
/*                       <div class="text-right">{{ extension.rating_total }} {{ text_reviews }}</div>*/
/*                     </div>*/
/*                   </div>*/
/*                 </div>*/
/*               </section>*/
/*             </div>*/
/*             {% endif %}*/
/*             {% endfor %} </div>*/
/*           {% else %}*/
/*           <p class="text-center">{{ text_no_results }}</p>*/
/*           {% endif %} </div>*/
/*         <div class="row">*/
/*           <div class="col-sm-12 text-center">{{ pagination }}</div>*/
/*         </div>*/
/*       </div>*/
/*     </div>*/
/*   </div>*/
/* */
/* <script type="text/javascript"><!--*/
/* $('#button-opencart').on('click', function(e) {*/
/* 	$('#modal-opencart').remove();*/
/* 	*/
/* 	$.ajax({*/
/* 		url: 'index.php?route=marketplace/api&user_token={{ user_token }}',*/
/* 		dataType: 'html',*/
/* 		beforeSend: function() {*/
/* 			$('#button-opencart').button('loading');*/
/* 		},*/
/* 		complete: function() {*/
/* 			$('#button-opencart').button('reset');*/
/* 		},*/
/* 		success: function(html) {*/
/* 			$('body').append('<div id="modal-opencart" class="modal">' + html + '</div>');*/
/* 			*/
/* 			$('#modal-opencart').modal('show');*/
/* 		},*/
/* 		error: function(xhr, ajaxOptions, thrownError) {*/
/* 			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);*/
/* 		}*/
/* 	});*/
/* });*/
/* //--></script> */
/* <script type="text/javascript"><!--*/
/* $('#button-filter').on('click', function(e) {*/
/* 	var url = 'index.php?route=marketplace/marketplace&user_token={{ user_token }}';*/
/* */
/* 	var input = $('#extension-filter :input');*/
/* */
/* 	for (i = 0; i < input.length; i++) {*/
/* 		if ($(input[i]).val() != '' && $(input[i]).val() != null) {*/
/* 			url += '&' + $(input[i]).attr('name') + '=' + $(input[i]).val()*/
/* 		}*/
/* 	}*/
/* */
/* 	location = url;*/
/* });*/
/* */
/* $('input[name="filter_search"]').keydown(function(e) {*/
/* 	if (e.keyCode == 13) {*/
/* 		e.preventDefault();*/
/* */
/* 		$('#button-filter').trigger('click');*/
/* 	}*/
/* });*/
/* //--></script></div>*/
/* {{ footer }} */
