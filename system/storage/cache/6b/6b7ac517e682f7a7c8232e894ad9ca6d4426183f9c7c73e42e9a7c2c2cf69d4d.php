<?php

/* customer/customer_approval_list.twig */
class __TwigTemplate_606a7cea2c5372c0e6962bb8b152a1bb10adf740ce57abf84fdffd7ecf8c825c extends Twig_Template
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
  <table class=\"table table-bordered table-hover\">
    <thead>
      <tr>
        <td class=\"text-left\">";
        // line 5
        echo (isset($context["column_name"]) ? $context["column_name"] : null);
        echo "</td>
        <td class=\"text-left\">";
        // line 6
        echo (isset($context["column_email"]) ? $context["column_email"] : null);
        echo "</td>
        <td class=\"text-left\">";
        // line 7
        echo (isset($context["column_customer_group"]) ? $context["column_customer_group"] : null);
        echo "</td>
        <td class=\"text-left\">";
        // line 8
        echo (isset($context["column_type"]) ? $context["column_type"] : null);
        echo "</td>
        <td class=\"text-left\">";
        // line 9
        echo (isset($context["column_date_added"]) ? $context["column_date_added"] : null);
        echo "</td>
        <td class=\"text-right\">";
        // line 10
        echo (isset($context["column_action"]) ? $context["column_action"] : null);
        echo "</td>
      </tr>
    </thead>
    <tbody>
    ";
        // line 14
        if ((isset($context["customer_approvals"]) ? $context["customer_approvals"] : null)) {
            // line 15
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["customer_approvals"]) ? $context["customer_approvals"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["customer_approval"]) {
                // line 16
                echo "    <tr>
      <td class=\"text-left\">";
                // line 17
                echo $this->getAttribute($context["customer_approval"], "name", array());
                echo "</td>
      <td class=\"text-left\">";
                // line 18
                echo $this->getAttribute($context["customer_approval"], "email", array());
                echo "</td>
      <td class=\"text-left\">";
                // line 19
                echo $this->getAttribute($context["customer_approval"], "customer_group", array());
                echo "</td>
      <td class=\"text-left\">";
                // line 20
                echo $this->getAttribute($context["customer_approval"], "type", array());
                echo "</td>
      <td class=\"text-left\">";
                // line 21
                echo $this->getAttribute($context["customer_approval"], "date_added", array());
                echo "</td>
      <td class=\"text-right\"><a href=\"";
                // line 22
                echo $this->getAttribute($context["customer_approval"], "approve", array());
                echo "\" data-toggle=\"tooltip\" title=\"";
                echo (isset($context["button_approve"]) ? $context["button_approve"] : null);
                echo "\" class=\"btn btn-success\"><i class=\"fa fa-thumbs-o-up\"></i></a> <a href=\"";
                echo $this->getAttribute($context["customer_approval"], "deny", array());
                echo "\" data-toggle=\"tooltip\" title=\"";
                echo (isset($context["button_deny"]) ? $context["button_deny"] : null);
                echo "\" class=\"btn btn-danger\"><i class=\"fa fa-thumbs-o-down\"></i></a> <a href=\"";
                echo $this->getAttribute($context["customer_approval"], "edit", array());
                echo "\" data-toggle=\"tooltip\" title=\"";
                echo (isset($context["button_edit"]) ? $context["button_edit"] : null);
                echo "\" class=\"btn btn-primary\"><i class=\"fa fa-pencil\"></i></a></td>
    </tr>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['customer_approval'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 25
            echo "    ";
        } else {
            // line 26
            echo "    <tr>
      <td class=\"text-center\" colspan=\"6\">";
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
        return "customer/customer_approval_list.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 35,  119 => 34,  113 => 30,  107 => 27,  104 => 26,  101 => 25,  82 => 22,  78 => 21,  74 => 20,  70 => 19,  66 => 18,  62 => 17,  59 => 16,  54 => 15,  52 => 14,  45 => 10,  41 => 9,  37 => 8,  33 => 7,  29 => 6,  25 => 5,  19 => 1,);
    }
}
/* <div class="table-responsive">*/
/*   <table class="table table-bordered table-hover">*/
/*     <thead>*/
/*       <tr>*/
/*         <td class="text-left">{{ column_name }}</td>*/
/*         <td class="text-left">{{ column_email }}</td>*/
/*         <td class="text-left">{{ column_customer_group }}</td>*/
/*         <td class="text-left">{{ column_type }}</td>*/
/*         <td class="text-left">{{ column_date_added }}</td>*/
/*         <td class="text-right">{{ column_action }}</td>*/
/*       </tr>*/
/*     </thead>*/
/*     <tbody>*/
/*     {% if customer_approvals %}*/
/*     {% for customer_approval in customer_approvals %}*/
/*     <tr>*/
/*       <td class="text-left">{{ customer_approval.name }}</td>*/
/*       <td class="text-left">{{ customer_approval.email }}</td>*/
/*       <td class="text-left">{{ customer_approval.customer_group }}</td>*/
/*       <td class="text-left">{{ customer_approval.type }}</td>*/
/*       <td class="text-left">{{ customer_approval.date_added }}</td>*/
/*       <td class="text-right"><a href="{{ customer_approval.approve }}" data-toggle="tooltip" title="{{ button_approve }}" class="btn btn-success"><i class="fa fa-thumbs-o-up"></i></a> <a href="{{ customer_approval.deny }}" data-toggle="tooltip" title="{{ button_deny }}" class="btn btn-danger"><i class="fa fa-thumbs-o-down"></i></a> <a href="{{ customer_approval.edit }}" data-toggle="tooltip" title="{{ button_edit }}" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>*/
/*     </tr>*/
/*     {% endfor %}*/
/*     {% else %}*/
/*     <tr>*/
/*       <td class="text-center" colspan="6">{{ text_no_results }}</td>*/
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
