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

/* @PrestaShop/Admin/Sell/Catalog/Monitoring/Blocks/showcase_card.html.twig */
class __TwigTemplate_c19b73f322a78d18032f7885976655b55e23c111b7209af41bc0939881ac45c7 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 25
        echo "
";
        // line 26
        if ( !($context["isShowcaseCardClosed"] ?? null)) {
            // line 27
            echo "  <div id=\"monitoringShowcaseCard\" class=\"helper-card card\">
    <div class=\"helper-card__left helper-card__monitoring shape-one\">
      <img src=\"";
            // line 29
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/new-theme/public/helper-card/monitoring@3x.png"), "html", null, true);
            echo "\" class=\"img-fluid img-rtl\">
    </div>
    <div class=\"helper-card__right\">
      <h2>";
            // line 32
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Focus on your catalog", [], "Admin.Catalog.Feature"), "html", null, true);
            echo "</h2>
      <p>";
            // line 33
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Empty categories, disabled products, items that lack image or price... check the monitoring section to optimize your products management and make sure you forgot nothing.", [], "Admin.Catalog.Feature"), "html", null, true);
            echo "</p>
      <a class=\"btn btn-outline-secondary\"
         href=\"";
            // line 35
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('documentation_link')->getCallable(), ["monitoring"]), "html", null, true);
            echo "\"
         target=\"_blank\"
      >
        ";
            // line 38
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Learn more", [], "Admin.Actions"), "html", null, true);
            echo "
      </a>
    </div>
    <i class=\"showcase-card__close material-icons js-remove-helper-block\"
       data-card-name=\"";
            // line 42
            echo twig_escape_filter($this->env, ($context["showcaseCardName"] ?? null), "html", null, true);
            echo "\"
       data-close-url=\"";
            // line 43
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_close_showcase_card");
            echo "\"
    >
      close
    </i>
  </div>
";
        }
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Catalog/Monitoring/Blocks/showcase_card.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  71 => 43,  67 => 42,  60 => 38,  54 => 35,  49 => 33,  45 => 32,  39 => 29,  35 => 27,  33 => 26,  30 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Catalog/Monitoring/Blocks/showcase_card.html.twig", "/var/www/html/src/PrestaShopBundle/Resources/views/Admin/Sell/Catalog/Monitoring/Blocks/showcase_card.html.twig");
    }
}
