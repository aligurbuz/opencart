<?php

/* marketplace/installer_history.twig */
class __TwigTemplate_d80f7c35ae4d7ee0bb627b1c639fbf5333cdf854c51368da1f8de6e79b7b189e extends Twig_Template
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
        echo "<div class=\"table-responsive\">
  <table class=\"table table-bordered\">
    <thead>
      <tr>
        <th>";
        // line 5
        echo (isset($context["column_filename"]) ? $context["column_filename"] : null);
        echo "</th>
        <th>";
        // line 6
        echo (isset($context["column_date_added"]) ? $context["column_date_added"] : null);
        echo "</th>
        <th class=\"text-right\">";
        // line 7
        echo (isset($context["column_action"]) ? $context["column_action"] : null);
        echo "</th>
      </tr>
    </thead>
    <tbody>
    
    ";
        // line 12
        if ((isset($context["histories"]) ? $context["histories"] : null)) {
            // line 13
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["histories"]) ? $context["histories"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["history"]) {
                // line 14
                echo "    <tr>
      <td>";
                // line 15
                echo $this->getAttribute($context["history"], "filename", array());
                echo "</td>
      <td>";
                // line 16
                echo $this->getAttribute($context["history"], "date_added", array());
                echo "</td>
      <td class=\"text-right\"><button type=\"button\" value=\"";
                // line 17
                echo $this->getAttribute($context["history"], "extension_install_id", array());
                echo "\" data-loading=\"";
                echo (isset($context["text_loading"]) ? $context["text_loading"] : null);
                echo "\" data-toggle=\"tooltip\" title=\"";
                echo (isset($context["button_uninstall"]) ? $context["button_uninstall"] : null);
                echo "\" class=\"btn btn-danger\"><i class=\"fa fa-trash-o\"></i></button></td>
    </tr>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['history'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 20
            echo "    ";
        } else {
            // line 21
            echo "    <tr>
      <td colspan=\"3\" class=\"text-center\">";
            // line 22
            echo (isset($context["text_no_results"]) ? $context["text_no_results"] : null);
            echo "</td>
    </tr>
    ";
        }
        // line 25
        echo "    </tbody>
    
  </table>
</div>
<div class=\"row\">
  <div class=\"col-sm-6 text-left\">";
        // line 30
        echo (isset($context["pagination"]) ? $context["pagination"] : null);
        echo "</div>
  <div class=\"col-sm-6 text-right\">";
        // line 31
        echo (isset($context["results"]) ? $context["results"] : null);
        echo "</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "marketplace/installer_history.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  95 => 31,  91 => 30,  84 => 25,  78 => 22,  75 => 21,  72 => 20,  59 => 17,  55 => 16,  51 => 15,  48 => 14,  43 => 13,  41 => 12,  33 => 7,  29 => 6,  25 => 5,  19 => 1,);
    }
}
/* <div class="table-responsive">*/
/*   <table class="table table-bordered">*/
/*     <thead>*/
/*       <tr>*/
/*         <th>{{ column_filename }}</th>*/
/*         <th>{{ column_date_added }}</th>*/
/*         <th class="text-right">{{ column_action }}</th>*/
/*       </tr>*/
/*     </thead>*/
/*     <tbody>*/
/*     */
/*     {% if histories %}*/
/*     {% for history in histories %}*/
/*     <tr>*/
/*       <td>{{ history.filename }}</td>*/
/*       <td>{{ history.date_added }}</td>*/
/*       <td class="text-right"><button type="button" value="{{ history.extension_install_id }}" data-loading="{{ text_loading }}" data-toggle="tooltip" title="{{ button_uninstall }}" class="btn btn-danger"><i class="fa fa-trash-o"></i></button></td>*/
/*     </tr>*/
/*     {% endfor %}*/
/*     {% else %}*/
/*     <tr>*/
/*       <td colspan="3" class="text-center">{{ text_no_results }}</td>*/
/*     </tr>*/
/*     {% endif %}*/
/*     </tbody>*/
/*     */
/*   </table>*/
/* </div>*/
/* <div class="row">*/
/*   <div class="col-sm-6 text-left">{{ pagination }}</div>*/
/*   <div class="col-sm-6 text-right">{{ results }}</div>*/
/* </div>*/
/* */
