<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* @PrestaShop/Admin/Sell/Customer/index.html.twig */
class __TwigTemplate_9f565730240154dafc8986ffc0af21af4db127cdccab13627388619d358a4f97 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'content' => [$this, 'block_content'],
            'employee_helper_card' => [$this, 'block_employee_helper_card'],
            'customers_kpis' => [$this, 'block_customers_kpis'],
            'customers_listing' => [$this, 'block_customers_listing'],
            'customer_required_fields_form' => [$this, 'block_customer_required_fields_form'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 29
        return "PrestaShopBundle:Admin:layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 26
        $context["enableSidebar"] = true;
        // line 27
        $context["layoutTitle"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Manage your Customers", [], "Admin.Orderscustomers.Feature");
        // line 29
        $this->parent = $this->loadTemplate("PrestaShopBundle:Admin:layout.html.twig", "@PrestaShop/Admin/Sell/Customer/index.html.twig", 29);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 31
    public function block_content($context, array $blocks = [])
    {
        // line 32
        echo "  ";
        $this->displayBlock('employee_helper_card', $context, $blocks);
        // line 39
        echo "
  ";
        // line 40
        $this->displayBlock('customers_kpis', $context, $blocks);
        // line 54
        echo "
  ";
        // line 55
        $this->displayBlock('customers_listing', $context, $blocks);
        // line 78
        echo "
  ";
        // line 79
        $this->displayBlock('customer_required_fields_form', $context, $blocks);
    }

    // line 32
    public function block_employee_helper_card($context, array $blocks = [])
    {
        // line 33
        echo "    <div class=\"row\">
      <div class=\"col\">
        ";
        // line 35
        $this->loadTemplate("@PrestaShop/Admin/Sell/Customer/Blocks/showcase_card.html.twig", "@PrestaShop/Admin/Sell/Customer/index.html.twig", 35)->display($context);
        // line 36
        echo "      </div>
    </div>
  ";
    }

    // line 40
    public function block_customers_kpis($context, array $blocks = [])
    {
        // line 41
        echo "    <div class=\"row\">
      <div class=\"col-md-12\">
        <div class=\"card card-kpis\">
          <div class=\"row\">
            ";
        // line 45
        echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment(Symfony\Bridge\Twig\Extension\HttpKernelExtension::controller("PrestaShopBundle:Admin\\Common:renderKpiRow", ["kpiRow" =>         // line 47
($context["customersKpi"] ?? null)]));
        // line 48
        echo "
          </div>
        </div>
      </div>
    </div>
  ";
    }

    // line 55
    public function block_customers_listing($context, array $blocks = [])
    {
        // line 56
        echo "    ";
        if ( !($context["isSingleShopContext"] ?? null)) {
            // line 57
            echo "      <div class=\"row\">
        <div class=\"col-md-12\">
          <div class=\"alert alert-info\" role=\"alert\">
            <p class=\"alert-text\">
              ";
            // line 61
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("You have to select a shop if you want to create a customer.", [], "Admin.Orderscustomers.Notification"), "html", null, true);
            echo "
            </p>
          </div>
        </div>
      </div>
    ";
        }
        // line 67
        echo "
    <div class=\"row\">
      <div class=\"col-12\">
        ";
        // line 70
        $this->loadTemplate("@PrestaShop/Admin/Sell/Customer/index.html.twig", "@PrestaShop/Admin/Sell/Customer/index.html.twig", 70, "1004035219")->display(twig_array_merge($context, ["grid" => ($context["customerGrid"] ?? null)]));
        // line 75
        echo "      </div>
    </div>
  ";
    }

    // line 79
    public function block_customer_required_fields_form($context, array $blocks = [])
    {
        // line 80
        echo "    <div class=\"row\">
      <div class=\"col-md-12\">
        <p>
          <button class=\"btn btn-primary\"
                  type=\"button\"
                  data-toggle=\"collapse\"
                  data-target=\"#customerRequiredFieldsContainer\"
                  aria-expanded=\"false\"
                  aria-controls=\"customerRequiredFieldsContainer\"
          >
            <i class=\"material-icons\">add_circle</i>
            ";
        // line 91
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Set required fields for this section", [], "Admin.Orderscustomers.Feature"), "html", null, true);
        echo "
          </button>
        </p>
      </div>

      <div class=\"col-md-12\">
        ";
        // line 97
        $this->loadTemplate("@PrestaShop/Admin/Sell/Customer/Blocks/Index/required_fields.html.twig", "@PrestaShop/Admin/Sell/Customer/index.html.twig", 97)->display($context);
        // line 98
        echo "      </div>
    </div>
  ";
    }

    // line 103
    public function block_javascripts($context, array $blocks = [])
    {
        // line 104
        echo "  ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

  ";
        // line 106
        $this->loadTemplate("@PrestaShop/Admin/Sell/Customer/Blocks/javascript.html.twig", "@PrestaShop/Admin/Sell/Customer/index.html.twig", 106)->display($context);
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Customer/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  184 => 106,  178 => 104,  175 => 103,  169 => 98,  167 => 97,  158 => 91,  145 => 80,  142 => 79,  136 => 75,  134 => 70,  129 => 67,  120 => 61,  114 => 57,  111 => 56,  108 => 55,  99 => 48,  97 => 47,  96 => 45,  90 => 41,  87 => 40,  81 => 36,  79 => 35,  75 => 33,  72 => 32,  68 => 79,  65 => 78,  63 => 55,  60 => 54,  58 => 40,  55 => 39,  52 => 32,  49 => 31,  44 => 29,  42 => 27,  40 => 26,  34 => 29,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Customer/index.html.twig", "/var/www/html/src/PrestaShopBundle/Resources/views/Admin/Sell/Customer/index.html.twig");
    }
}


/* @PrestaShop/Admin/Sell/Customer/index.html.twig */
class __TwigTemplate_9f565730240154dafc8986ffc0af21af4db127cdccab13627388619d358a4f97___1004035219 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'grid_panel_extra_content' => [$this, 'block_grid_panel_extra_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 70
        return "@PrestaShop/Admin/Common/Grid/grid_panel.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/Common/Grid/grid_panel.html.twig", "@PrestaShop/Admin/Sell/Customer/index.html.twig", 70);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 71
    public function block_grid_panel_extra_content($context, array $blocks = [])
    {
        // line 72
        echo "            ";
        $this->loadTemplate("@PrestaShop/Admin/Sell/Customer/Blocks/delete_modal.html.twig", "@PrestaShop/Admin/Sell/Customer/index.html.twig", 72)->display($context);
        // line 73
        echo "          ";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Customer/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  248 => 73,  245 => 72,  242 => 71,  232 => 70,  184 => 106,  178 => 104,  175 => 103,  169 => 98,  167 => 97,  158 => 91,  145 => 80,  142 => 79,  136 => 75,  134 => 70,  129 => 67,  120 => 61,  114 => 57,  111 => 56,  108 => 55,  99 => 48,  97 => 47,  96 => 45,  90 => 41,  87 => 40,  81 => 36,  79 => 35,  75 => 33,  72 => 32,  68 => 79,  65 => 78,  63 => 55,  60 => 54,  58 => 40,  55 => 39,  52 => 32,  49 => 31,  44 => 29,  42 => 27,  40 => 26,  34 => 29,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Customer/index.html.twig", "/var/www/html/src/PrestaShopBundle/Resources/views/Admin/Sell/Customer/index.html.twig");
    }
}
