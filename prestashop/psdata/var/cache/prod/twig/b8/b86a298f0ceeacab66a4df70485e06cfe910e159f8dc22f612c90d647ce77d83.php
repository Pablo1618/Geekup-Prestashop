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

/* @PrestaShop/Admin/Translations/overview.html.twig */
class __TwigTemplate_a49517a6286561c76f609a414454060c19b8d9b30efaf335ebcb67c2b818b2ef extends \Twig\Template
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
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/layout.html.twig", "@PrestaShop/Admin/Translations/overview.html.twig", 25);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 27
    public function block_content($context, array $blocks = [])
    {
        // line 28
        echo "    <div id=\"translations-app\"></div>
";
    }

    // line 31
    public function block_javascripts($context, array $blocks = [])
    {
        // line 32
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

    <script>
        var data = {
            baseUrl: '";
        // line 36
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "request", []), "getBasePath", [], "method"), "html", null, true);
        echo "',
            locale: '";
        // line 37
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? null), "request", []), "query", []), "get", [0 => "locale"], "method"), "html", null, true);
        echo "',
            type: '";
        // line 38
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? null), "request", []), "query", []), "get", [0 => "type"], "method"), "html", null, true);
        echo "',
            currentTheme: ";
        // line 39
        echo twig_jsonencode_filter($this->getAttribute(($context["theme"] ?? null), "name", []));
        echo ",
            selected: '";
        // line 40
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? null), "request", []), "query", []), "get", [0 => "selected"], "method"), "html", null, true);
        echo "',
            domainsTreeUrl: '";
        // line 41
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("api_translation_domains_tree", ["lang" => $this->getAttribute($this->getAttribute($this->getAttribute(        // line 42
($context["app"] ?? null), "request", []), "query", []), "get", [0 => "lang"], "method"), "type" => $this->getAttribute($this->getAttribute($this->getAttribute(        // line 43
($context["app"] ?? null), "request", []), "query", []), "get", [0 => "type"], "method"), "selected" => $this->getAttribute($this->getAttribute($this->getAttribute(        // line 44
($context["app"] ?? null), "request", []), "query", []), "get", [0 => "selected"], "method")]), "html", null, true);
        // line 45
        echo "',
            translationUrl: '";
        // line 46
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("api_i18n_translations_list", ["page" => "international"]);
        echo "',
            internationalUrl: '";
        // line 47
        echo $this->env->getExtension('PrestaShopBundle\Twig\LayoutExtension')->getAdminLink("AdminLocalization");
        echo "',
            translationsUrl: '";
        // line 48
        echo $this->env->getExtension('PrestaShopBundle\Twig\LayoutExtension')->getAdminLink("AdminTranslations");
        echo "'
        }
    </script>

    ";
        // line 52
        if (($context["webpack_server"] ?? null)) {
            // line 53
            echo "        <script src=\"http://localhost:8080/translations.bundle.js\"></script>
    ";
        } else {
            // line 55
            echo "        <script src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/new-theme/public/translations.bundle.js"), "html", null, true);
            echo "\"></script>
    ";
        }
        // line 57
        echo "
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Translations/overview.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  114 => 57,  108 => 55,  104 => 53,  102 => 52,  95 => 48,  91 => 47,  87 => 46,  84 => 45,  82 => 44,  81 => 43,  80 => 42,  79 => 41,  75 => 40,  71 => 39,  67 => 38,  63 => 37,  59 => 36,  51 => 32,  48 => 31,  43 => 28,  40 => 27,  30 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Translations/overview.html.twig", "/var/www/html/src/PrestaShopBundle/Resources/views/Admin/Translations/overview.html.twig");
    }
}
