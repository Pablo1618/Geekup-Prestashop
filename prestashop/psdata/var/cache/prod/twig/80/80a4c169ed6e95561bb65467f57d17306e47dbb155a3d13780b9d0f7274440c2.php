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

/* @PrestaShop/Admin/Stock/overview.html.twig */
class __TwigTemplate_8d8ba59e9955e6eb616189d1506a2ce9da03242c5035742ee8b2ed898287d2b2 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'stylesheets' => [$this, 'block_stylesheets'],
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
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/layout.html.twig", "@PrestaShop/Admin/Stock/overview.html.twig", 25);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 27
    public function block_stylesheets($context, array $blocks = [])
    {
        // line 28
        echo "  <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/new-theme/public/stock_page.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\">
";
    }

    // line 31
    public function block_content($context, array $blocks = [])
    {
        // line 32
        echo "
    ";
        // line 33
        if (($context["is_shop_context"] ?? null)) {
            // line 34
            echo "        <div id=\"stock-app\"></div>

    ";
        } else {
            // line 37
            echo "        <div class=\"col-md-12\">
            <div class=\"alert alert-danger\" role=\"alert\">
                <p class=\"alert-text\">";
            // line 39
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("You can't manage your stock in this shop context: select a shop instead of a group of shops.", [], "Admin.Catalog.Notification"), "html", null, true);
            echo "</p>
            </div>
        </div>
    ";
        }
        // line 43
        echo "
";
    }

    // line 46
    public function block_javascripts($context, array $blocks = [])
    {
        // line 47
        echo "
    ";
        // line 48
        if (($context["is_shop_context"] ?? null)) {
            // line 49
            echo "        ";
            $this->displayParentBlock("javascripts", $context, $blocks);
            echo "

        ";
            // line 51
            $context["productId"] = (($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? null), "request", []), "query", []), "get", [0 => "productId"], "method")) ? ($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? null), "request", []), "query", []), "get", [0 => "productId"], "method")) : (false));
            // line 52
            echo "        <script>
            var data = {
                baseUrl: '";
            // line 54
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "request", []), "getBasePath", [], "method"), "html", null, true);
            echo "',
                catalogUrl: '";
            // line 55
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("admin_product_catalog");
            echo "',
                stockUrl: '";
            // line 56
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("admin_stock_overview");
            echo "',
                stockExportUrl: '";
            // line 57
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("api_stock_list_products_export");
            echo "',
                stockImportUrl: '";
            // line 58
            echo $this->env->getExtension('PrestaShopBundle\Twig\LayoutExtension')->getAdminLink("AdminImport");
            echo "',
                apiStockUrl: '";
            // line 59
            ((($context["productId"] ?? null)) ? (print (twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("api_stock_list_product_combinations", ["productId" => ($context["productId"] ?? null)]), "html", null, true))) : (print ($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("api_stock_list_products"))));
            echo "',
                apiMovementsUrl: '";
            // line 60
            ((($context["productId"] ?? null)) ? (print (twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("api_stock_product_list_movements", ["productId" => ($context["productId"] ?? null)]), "html", null, true))) : (print ($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("api_stock_list_movements"))));
            echo "',
                employeesUrl: '";
            // line 61
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("api_stock_list_movements_employees");
            echo "',
                suppliersUrl: '";
            // line 62
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("api_stock_list_suppliers");
            echo "',
                categoriesUrl: '";
            // line 63
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("api_stock_list_categories");
            echo "',
                movementsTypesUrl: '";
            // line 64
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("api_stock_list_movements_types", ["grouped" => true]);
            echo "',
                translationUrl: '";
            // line 65
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("api_i18n_translations_list", ["page" => "stock"]);
            echo "',
                locale: '";
            // line 66
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "request", []), "locale", []), "html", null, true);
            echo "'
            }
        </script>

        ";
            // line 70
            if (($context["webpack_server"] ?? null)) {
                // line 71
                echo "            <script src=\"http://localhost:8080/stock.bundle.js\"></script>
        ";
            } else {
                // line 73
                echo "            <script src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/new-theme/public/stock.bundle.js"), "html", null, true);
                echo "\"></script>
        ";
            }
            // line 75
            echo "    ";
        }
        // line 76
        echo "
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Stock/overview.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  170 => 76,  167 => 75,  161 => 73,  157 => 71,  155 => 70,  148 => 66,  144 => 65,  140 => 64,  136 => 63,  132 => 62,  128 => 61,  124 => 60,  120 => 59,  116 => 58,  112 => 57,  108 => 56,  104 => 55,  100 => 54,  96 => 52,  94 => 51,  88 => 49,  86 => 48,  83 => 47,  80 => 46,  75 => 43,  68 => 39,  64 => 37,  59 => 34,  57 => 33,  54 => 32,  51 => 31,  44 => 28,  41 => 27,  31 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Stock/overview.html.twig", "/var/www/html/src/PrestaShopBundle/Resources/views/Admin/Stock/overview.html.twig");
    }
}
