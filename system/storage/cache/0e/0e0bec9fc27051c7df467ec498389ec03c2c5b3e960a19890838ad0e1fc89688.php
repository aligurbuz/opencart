<?php

/* design/theme_history.twig */
class __TwigTemplate_e4361299e6e2c64c239fa3cd60904da97541e006e21b1d5bd3d9482bb4e17f02 extends Twig_Template
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
        <td class=\"text-left\">";
        // line 5
        echo (isset($context["column_store"]) ? $context["column_store"] : null);
        echo "</td>
        <td class=\"text-left\">";
        // line 6
        echo (isset($context["column_route"]) ? $context["column_route"] : null);
        echo "</td>
        <td class=\"text-left\">";
        // line 7
        echo (isset($context["column_theme"]) ? $context["column_theme"] : null);
        echo "</td>
        <td class=\"text-left\">";
        // line 8
        echo (isset($context["column_date_added"]) ? $context["column_date_added"] : null);
        echo "</td>
        <td class=\"text-right\">";
        // line 9
        echo (isset($context["column_action"]) ? $context["column_action"] : null);
        echo "</td>
      </tr>
    </thead>
    <tbody>
    ";
        // line 13
        if ((isset($context["histories"]) ? $context["histories"] : null)) {
            // line 14
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["histories"]) ? $context["histories"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["history"]) {
                // line 15
                echo "    <tr>
      <td class=\"text-left\">";
                // line 16
                echo $this->getAttribute($context["history"], "store", array());
                echo "
      <input type=\"hidden\" name=\"store_id\" value=\"";
                // line 17
                echo $this->getAttribute($context["history"], "store_id", array());
                echo "\" /></td>
      <td class=\"text-left\">";
                // line 18
                echo $this->getAttribute($context["history"], "route", array());
                echo "
      <input type=\"hidden\" name=\"path\" value=\"";
                // line 19
                echo $this->getAttribute($context["history"], "route", array());
                echo "\" /></td>
      <td class=\"text-left\">";
                // line 20
                echo $this->getAttribute($context["history"], "theme", array());
                echo "</td>
      <td class=\"text-left\">";
                // line 21
                echo $this->getAttribute($context["history"], "date_added", array());
                echo "</td>
      <td class=\"text-right\"><a href=\"";
                // line 22
                echo $this->getAttribute($context["history"], "edit", array());
                echo "\" data-toggle=\"tooltip\" title=\"";
                echo (isset($context["button_edit"]) ? $context["button_edit"] : null);
                echo "\" class=\"btn btn-primary\"><i class=\"fa fa-pencil\"></i></a> <a href=\"";
                echo $this->getAttribute($context["history"], "delete", array());
                echo "\" data-loading-text=\"";
                echo (isset($context["text_loading"]) ? $context["text_loading"] : null);
                echo "\" data-toggle=\"tooltip\" title=\"";
                echo (isset($context["button_delete"]) ? $context["button_delete"] : null);
                echo "\" class=\"btn btn-danger\"><i class=\"fa fa fa-trash-o\"></i></a></td>
    </tr>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['history'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 25
            echo "    ";
        } else {
            // line 26
            echo "    <tr>
      <td class=\"text-center\" colspan=\"5\">";
            // line 27
            echo (isset($context["text_no_results"]) ? $context["text_no_results"] : null);
            echo "</td>
    </tr>
    ";
        }
        // line 30
        echo "    </tbody>
  </table>
</div>
<div class=\"row\">
  <div class=\"col-sm-6 text-left\">";
        // line 34
        echo (isset($context["pagination"]) ? $context["pagination"] : null);
        echo "</div>
  <div class=\"col-sm-6 text-right\">";
        // line 35
        echo (isset($context["results"]) ? $context["results"] : null);
        echo "</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "design/theme_history.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  121 => 35,  117 => 34,  111 => 30,  105 => 27,  102 => 26,  99 => 25,  82 => 22,  78 => 21,  74 => 20,  70 => 19,  66 => 18,  62 => 17,  58 => 16,  55 => 15,  50 => 14,  48 => 13,  41 => 9,  37 => 8,  33 => 7,  29 => 6,  25 => 5,  19 => 1,);
    }
}
/* <div class="table-responsive">*/
/*   <table class="table table-bordered">*/
/*     <thead>*/
/*       <tr>*/
/*         <td class="text-left">{{ column_store }}</td>*/
/*         <td class="text-left">{{ column_route }}</td>*/
/*         <td class="text-left">{{ column_theme }}</td>*/
/*         <td class="text-left">{{ column_date_added }}</td>*/
/*         <td class="text-right">{{ column_action }}</td>*/
/*       </tr>*/
/*     </thead>*/
/*     <tbody>*/
/*     {% if histories %}*/
/*     {% for history in histories %}*/
/*     <tr>*/
/*       <td class="text-left">{{ history.store }}*/
/*       <input type="hidden" name="store_id" value="{{ history.store_id }}" /></td>*/
/*       <td class="text-left">{{ history.route }}*/
/*       <input type="hidden" name="path" value="{{ history.route }}" /></td>*/
/*       <td class="text-left">{{ history.theme }}</td>*/
/*       <td class="text-left">{{ history.date_added }}</td>*/
/*       <td class="text-right"><a href="{{ history.edit }}" data-toggle="tooltip" title="{{ button_edit }}" class="btn btn-primary"><i class="fa fa-pencil"></i></a> <a href="{{ history.delete }}" data-loading-text="{{ text_loading }}" data-toggle="tooltip" title="{{ button_delete }}" class="btn btn-danger"><i class="fa fa fa-trash-o"></i></a></td>*/
/*     </tr>*/
/*     {% endfor %}*/
/*     {% else %}*/
/*     <tr>*/
/*       <td class="text-center" colspan="5">{{ text_no_results }}</td>*/
/*     </tr>*/
/*     {% endif %}*/
/*     </tbody>*/
/*   </table>*/
/* </div>*/
/* <div class="row">*/
/*   <div class="col-sm-6 text-left">{{ pagination }}</div>*/
/*   <div class="col-sm-6 text-right">{{ results }}</div>*/
/* </div>*/
/* */
