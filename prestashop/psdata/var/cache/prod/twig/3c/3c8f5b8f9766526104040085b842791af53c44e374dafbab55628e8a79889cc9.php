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

/* @PrestaShop/Admin/Improve/Payment/PaymentMethods/payment_methods.html.twig */
class __TwigTemplate_ca9804737086fc74f581ea3918454696060b956d17e0b7deb9fcebde779b60e4 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 25
        return "@PrestaShop/Admin/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/layout.html.twig", "@PrestaShop/Admin/Improve/Payment/PaymentMethods/payment_methods.html.twig", 25);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 28
    public function block_content($context, array $blocks = [])
    {
        // line 29
        echo "  <div class=\"container\">

    ";
        // line 31
        if ((twig_length_filter($this->env, ($context["paymentModules"] ?? null)) < 2)) {
            // line 32
            echo "      <div class=\"card-block row alert-block\">
        <div class=\"card-text\">
          <div class=\"row\">
            <div class=\"col-sm\">
              <div class=\"alert alert-info\" role=\"alert\">
                <div class=\"alert-text\">
                  ";
            // line 38
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("We recommend providing at least two different payment methods. Only one payment method could be problematic if this option cannot be used by a customer because it will prevent him/her from ordering.", [], "Admin.Payment.Notification"), "html", null, true);
            echo "
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    ";
        }
        // line 46
        echo "
    <div class=\"row\">
      <div class=\"col\">
        ";
        // line 49
        if (($context["isSingleShopContext"] ?? null)) {
            // line 50
            echo "          <div class=\"card\">
            <h3 class=\"card-header\">
              <i class=\"material-icons\">credit_card</i> ";
            // line 52
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Active payment", [], "Admin.Payment.Feature"), "html", null, true);
            echo "
            </h3>
            <div class=\"card-block\">
              ";
            // line 55
            $this->loadTemplate("@PrestaShop/Admin/Improve/Payment/PaymentMethods/Blocks/payment_modules_list.html.twig", "@PrestaShop/Admin/Improve/Payment/PaymentMethods/payment_methods.html.twig", 55)->display($context);
            // line 56
            echo "            </div>
          </div>
        ";
        } else {
            // line 59
            echo "          <div class=\"alert alert-warning\" role=\"alert\">
            <p class=\"alert-text\">";
            // line 60
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("You have more than one shop and must select one to configure payment.", [], "Admin.Payment.Notification"), "html", null, true);
            echo "</p>
          </div>
        ";
        }
        // line 63
        echo "      </div>
    </div>
  </div>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Improve/Payment/PaymentMethods/payment_methods.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  100 => 63,  94 => 60,  91 => 59,  86 => 56,  84 => 55,  78 => 52,  74 => 50,  72 => 49,  67 => 46,  56 => 38,  48 => 32,  46 => 31,  42 => 29,  39 => 28,  29 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Improve/Payment/PaymentMethods/payment_methods.html.twig", "/var/www/html/src/PrestaShopBundle/Resources/views/Admin/Improve/Payment/PaymentMethods/payment_methods.html.twig");
    }
}
