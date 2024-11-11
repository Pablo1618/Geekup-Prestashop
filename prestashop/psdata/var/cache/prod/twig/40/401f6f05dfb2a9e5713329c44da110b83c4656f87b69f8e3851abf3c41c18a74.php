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

/* @PrestaShop/Admin/Sell/Catalog/Manufacturer/index.html.twig */
class __TwigTemplate_e83dd7c4cbf942ce8706e900d9d2b9942718b97779b9fc70ba5993295b07e4c3 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'content' => [$this, 'block_content'],
            'manufacturers_listing' => [$this, 'block_manufacturers_listing'],
            'manufacturers_address_listing' => [$this, 'block_manufacturers_address_listing'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 26
        return "PrestaShopBundle:Admin:layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 28
        $context["layoutHeaderToolbarBtn"] = ["add_manufacturer" => ["href" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_manufacturers_create"), "desc" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Add new brand", [], "Admin.Catalog.Feature"), "icon" => "add_circle_outline"], "add_manufacturer_address" => ["href" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_manufacturer_addresses_create"), "desc" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Add new brand address", [], "Admin.Catalog.Feature"), "icon" => "add_circle_outline"]];
        // line 26
        $this->parent = $this->loadTemplate("PrestaShopBundle:Admin:layout.html.twig", "@PrestaShop/Admin/Sell/Catalog/Manufacturer/index.html.twig", 26);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 42
    public function block_content($context, array $blocks = [])
    {
        // line 43
        echo "  ";
        $this->displayBlock('manufacturers_listing', $context, $blocks);
        // line 51
        echo "
  ";
        // line 52
        $this->displayBlock('manufacturers_address_listing', $context, $blocks);
    }

    // line 43
    public function block_manufacturers_listing($context, array $blocks = [])
    {
        // line 44
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["ps"] ?? null), "infotip", [0 => ($context["settingsTipMessage"] ?? null), 1 => true], "method"), "html", null, true);
        echo "
    <div class=\"row\">
      <div class=\"col\">
        ";
        // line 47
        $this->loadTemplate("@PrestaShop/Admin/Common/Grid/grid_panel.html.twig", "@PrestaShop/Admin/Sell/Catalog/Manufacturer/index.html.twig", 47)->display(twig_array_merge($context, ["grid" => ($context["manufacturerGrid"] ?? null)]));
        // line 48
        echo "      </div>
    </div>
  ";
    }

    // line 52
    public function block_manufacturers_address_listing($context, array $blocks = [])
    {
        // line 53
        echo "    <div class=\"row\">
      <div class=\"col\">
        ";
        // line 55
        $this->loadTemplate("@PrestaShop/Admin/Common/Grid/grid_panel.html.twig", "@PrestaShop/Admin/Sell/Catalog/Manufacturer/index.html.twig", 55)->display(twig_array_merge($context, ["grid" => ($context["manufacturerAddressGrid"] ?? null)]));
        // line 56
        echo "      </div>
    </div>
  ";
    }

    // line 61
    public function block_javascripts($context, array $blocks = [])
    {
        // line 62
        echo "  ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

  <script src=\"";
        // line 64
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/default/js/bundle/pagination.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 65
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/new-theme/public/manufacturer.bundle.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Catalog/Manufacturer/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  104 => 65,  100 => 64,  94 => 62,  91 => 61,  85 => 56,  83 => 55,  79 => 53,  76 => 52,  70 => 48,  68 => 47,  61 => 44,  58 => 43,  54 => 52,  51 => 51,  48 => 43,  45 => 42,  40 => 26,  38 => 28,  32 => 26,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Catalog/Manufacturer/index.html.twig", "/var/www/html/src/PrestaShopBundle/Resources/views/Admin/Sell/Catalog/Manufacturer/index.html.twig");
    }
}
