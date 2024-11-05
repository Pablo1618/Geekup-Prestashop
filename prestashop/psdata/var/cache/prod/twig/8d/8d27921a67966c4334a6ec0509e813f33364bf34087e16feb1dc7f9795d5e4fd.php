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

/* @PrestaShop/Admin/Improve/International/Translations/translations_settings.html.twig */
class __TwigTemplate_4e284c4daf56c8b1b68610a00a6edeb4bc8f22f376e6fa14d392741c767230d7 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'content' => [$this, 'block_content'],
            'translations_kpis_row' => [$this, 'block_translations_kpis_row'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 26
        return "@PrestaShop/Admin/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/layout.html.twig", "@PrestaShop/Admin/Improve/International/Translations/translations_settings.html.twig", 26);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 29
    public function block_content($context, array $blocks = [])
    {
        // line 30
        echo "  <div class=\"row justify-content-center\">
    <div class=\"col-xl-12\">
      <div class=\"card card-kpis\">
        ";
        // line 33
        $this->displayBlock('translations_kpis_row', $context, $blocks);
        // line 41
        echo "      </div>
    </div>

    <div class=\"col-xl-12\">
      ";
        // line 45
        $this->loadTemplate("@PrestaShop/Admin/Improve/International/Translations/Blocks/modify_translations.html.twig", "@PrestaShop/Admin/Improve/International/Translations/translations_settings.html.twig", 45)->display($context);
        // line 46
        echo "    </div>

    <div class=\"col-xl-12\">
      ";
        // line 49
        $this->loadTemplate("@PrestaShop/Admin/Improve/International/Translations/Blocks/add_update_language.html.twig", "@PrestaShop/Admin/Improve/International/Translations/translations_settings.html.twig", 49)->display($context);
        // line 50
        echo "    </div>

    <div class=\"col-xl-12\">
      ";
        // line 53
        $this->loadTemplate("@PrestaShop/Admin/Improve/International/Translations/Blocks/export_language.html.twig", "@PrestaShop/Admin/Improve/International/Translations/translations_settings.html.twig", 53)->display($context);
        // line 54
        echo "    </div>

    <div class=\"col-xl-12\">
      ";
        // line 57
        $this->loadTemplate("@PrestaShop/Admin/Improve/International/Translations/Blocks/copy_language.html.twig", "@PrestaShop/Admin/Improve/International/Translations/translations_settings.html.twig", 57)->display($context);
        // line 58
        echo "    </div>
  </div>
";
    }

    // line 33
    public function block_translations_kpis_row($context, array $blocks = [])
    {
        // line 34
        echo "          <div class=\"row\">
            ";
        // line 35
        echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment(Symfony\Bridge\Twig\Extension\HttpKernelExtension::controller("PrestaShopBundle:Admin\\Common:renderKpiRow", ["kpiRow" =>         // line 37
($context["kpiRow"] ?? null)]));
        // line 38
        echo "
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
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/new-theme/public/translation_settings.bundle.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Improve/International/Translations/translations_settings.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  110 => 65,  104 => 63,  101 => 62,  95 => 38,  93 => 37,  92 => 35,  89 => 34,  86 => 33,  80 => 58,  78 => 57,  73 => 54,  71 => 53,  66 => 50,  64 => 49,  59 => 46,  57 => 45,  51 => 41,  49 => 33,  44 => 30,  41 => 29,  31 => 26,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Improve/International/Translations/translations_settings.html.twig", "/var/www/html/src/PrestaShopBundle/Resources/views/Admin/Improve/International/Translations/translations_settings.html.twig");
    }
}
