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

/* @PrestaShop/Admin/Improve/Payment/Preferences/payment_preferences.html.twig */
class __TwigTemplate_dd9946c25b9aef566bd22e406cd99b126105f7da3a43025d86701a5db3ecabe8 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'content' => [$this, 'block_content'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 25
        return "@PrestaShop/Admin/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/layout.html.twig", "@PrestaShop/Admin/Improve/Payment/Preferences/payment_preferences.html.twig", 25);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 28
    public function block_content($context, array $blocks = [])
    {
        // line 29
        echo "  <div class=\"container\">
    <div class=\"row\">
      <div class=\"col\">
        ";
        // line 32
        if ( !($context["isSingleShopContext"] ?? null)) {
            // line 33
            echo "          <div class=\"alert alert-warning\" role=\"alert\">
            <p class=\"alert-text\">
              ";
            // line 35
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Note that this page is available in a single shop context only. Switch context to work on it.", [], "Admin.Notifications.Info"), "html", null, true);
            echo "
            </p>
          </div>
        ";
        } elseif ((        // line 38
($context["paymentModulesCount"] ?? null) == 0)) {
            // line 39
            echo "          <div class=\"alert alert-warning\" role=\"alert\">
            <p class=\"alert-text\">
              ";
            // line 41
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("No payment module installed", [], "Admin.Payment.Notification"), "html", null, true);
            echo "
            </p>
          </div>
        ";
        } else {
            // line 45
            echo "          <div class=\"alert alert-info\" role=\"alert\">
            <p class=\"alert-text\">
              ";
            // line 47
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("This is where you decide what payment modules are available for different variations like your customers' currency, group, and country.", [], "Admin.Payment.Help"), "html", null, true);
            echo "
            </p>
            <p class=\"alert-text\">
              ";
            // line 50
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("A check mark indicates you want the payment module available.", [], "Admin.Payment.Help"), "html", null, true);
            echo "
              ";
            // line 51
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("If it is not checked then this means that the payment module is disabled.", [], "Admin.Payment.Help"), "html", null, true);
            echo "
            </p>
          </div>

          ";
            // line 55
            $this->loadTemplate("@PrestaShop/Admin/Improve/Payment/Preferences/Blocks/payment_preferences_form_block.html.twig", "@PrestaShop/Admin/Improve/Payment/Preferences/payment_preferences.html.twig", 55)->display($context);
            // line 56
            echo "        ";
        }
        // line 57
        echo "      </div>
    </div>
  </div>
";
    }

    // line 62
    public function block_javascripts($context, array $blocks = [])
    {
        // line 63
        echo "  ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

  <script src=\"";
        // line 65
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/new-theme/public/payment_preferences.bundle.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Improve/Payment/Preferences/payment_preferences.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  115 => 65,  109 => 63,  106 => 62,  99 => 57,  96 => 56,  94 => 55,  87 => 51,  83 => 50,  77 => 47,  73 => 45,  66 => 41,  62 => 39,  60 => 38,  54 => 35,  50 => 33,  48 => 32,  43 => 29,  40 => 28,  30 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Improve/Payment/Preferences/payment_preferences.html.twig", "/var/www/html/src/PrestaShopBundle/Resources/views/Admin/Improve/Payment/Preferences/payment_preferences.html.twig");
    }
}
