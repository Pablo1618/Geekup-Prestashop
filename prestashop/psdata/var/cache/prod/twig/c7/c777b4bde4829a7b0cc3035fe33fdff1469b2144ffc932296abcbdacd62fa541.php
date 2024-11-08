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

/* @PrestaShop/Admin/Configure/ShopParameters/product_preferences.html.twig */
class __TwigTemplate_35f072df5d2b16c4c758530abd08b49ffae5564a442d2a1f6313a6d49e41fa1c extends \Twig\Template
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
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/layout.html.twig", "@PrestaShop/Admin/Configure/ShopParameters/product_preferences.html.twig", 25);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 28
    public function block_content($context, array $blocks = [])
    {
        // line 29
        echo "  ";
        // line 30
        echo "  ";
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["generalForm"] ?? null), 'form_start', ["attr" => ["class" => "form", "id" => "product_general_form"], "action" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_product_preferences_general_save")]);
        echo "
    ";
        // line 31
        $this->loadTemplate("@PrestaShop/Admin/Configure/ShopParameters/Blocks/product_preferences_general.html.twig", "@PrestaShop/Admin/Configure/ShopParameters/product_preferences.html.twig", 31)->display($context);
        // line 32
        echo "  ";
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["generalForm"] ?? null), 'form_end');
        echo "

  ";
        // line 35
        echo "  ";
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["pageForm"] ?? null), 'form_start', ["attr" => ["class" => "form", "id" => "product_page_form"], "action" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_product_preferences_page_save")]);
        echo "
    ";
        // line 36
        $this->loadTemplate("@PrestaShop/Admin/Configure/ShopParameters/Blocks/product_preferences_page.html.twig", "@PrestaShop/Admin/Configure/ShopParameters/product_preferences.html.twig", 36)->display($context);
        // line 37
        echo "  ";
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["pageForm"] ?? null), 'form_end');
        echo "

  ";
        // line 40
        echo "  ";
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["stockForm"] ?? null), 'form_start', ["attr" => ["class" => "form", "id" => "product_stock_form"], "action" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_product_preferences_stock_save")]);
        echo "
    ";
        // line 41
        $this->loadTemplate("@PrestaShop/Admin/Configure/ShopParameters/Blocks/product_preferences_stock.html.twig", "@PrestaShop/Admin/Configure/ShopParameters/product_preferences.html.twig", 41)->display($context);
        // line 42
        echo "  ";
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["stockForm"] ?? null), 'form_end');
        echo "

  ";
        // line 45
        echo "  ";
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["paginationForm"] ?? null), 'form_start', ["attr" => ["class" => "form", "id" => "product_pagination_form"], "action" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_product_preferences_pagination_save")]);
        echo "
    ";
        // line 46
        $this->loadTemplate("@PrestaShop/Admin/Configure/ShopParameters/Blocks/product_preferences_pagination.html.twig", "@PrestaShop/Admin/Configure/ShopParameters/product_preferences.html.twig", 46)->display($context);
        // line 47
        echo "  ";
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["paginationForm"] ?? null), 'form_end');
        echo "
";
    }

    // line 50
    public function block_javascripts($context, array $blocks = [])
    {
        // line 51
        echo "  ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

  <script src=\"";
        // line 53
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/new-theme/public/product_preferences.bundle.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Configure/ShopParameters/product_preferences.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  107 => 53,  101 => 51,  98 => 50,  91 => 47,  89 => 46,  84 => 45,  78 => 42,  76 => 41,  71 => 40,  65 => 37,  63 => 36,  58 => 35,  52 => 32,  50 => 31,  45 => 30,  43 => 29,  40 => 28,  30 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Configure/ShopParameters/product_preferences.html.twig", "/var/www/html/src/PrestaShopBundle/Resources/views/Admin/Configure/ShopParameters/product_preferences.html.twig");
    }
}
