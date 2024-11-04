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

/* @PrestaShop/Admin/Sell/Catalog/Monitoring/index.html.twig */
class __TwigTemplate_63e103fb653709cd0edcc6aea55af4056e084c3559247ca84c7f4f2fe628f55f extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'content' => [$this, 'block_content'],
            'monitoring_showcase_card' => [$this, 'block_monitoring_showcase_card'],
            'empty_categories_listing' => [$this, 'block_empty_categories_listing'],
            'no_qty_product_with_combinations_listing' => [$this, 'block_no_qty_product_with_combinations_listing'],
            'no_qty_product_without_combinations_listing' => [$this, 'block_no_qty_product_without_combinations_listing'],
            'disabled_product_listing' => [$this, 'block_disabled_product_listing'],
            'product_without_image_listing' => [$this, 'block_product_without_image_listing'],
            'product_without_description_listing' => [$this, 'block_product_without_description_listing'],
            'product_without_price_listing' => [$this, 'block_product_without_price_listing'],
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
        $this->parent = $this->loadTemplate("PrestaShopBundle:Admin:layout.html.twig", "@PrestaShop/Admin/Sell/Catalog/Monitoring/index.html.twig", 26);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 28
    public function block_content($context, array $blocks = [])
    {
        // line 29
        echo "  ";
        $this->displayBlock('monitoring_showcase_card', $context, $blocks);
        // line 36
        echo "
  ";
        // line 37
        $this->displayBlock('empty_categories_listing', $context, $blocks);
        // line 64
        echo "
  ";
        // line 65
        $this->displayBlock('no_qty_product_with_combinations_listing', $context, $blocks);
        // line 72
        echo "
  ";
        // line 73
        $this->displayBlock('no_qty_product_without_combinations_listing', $context, $blocks);
        // line 80
        echo "
  ";
        // line 81
        $this->displayBlock('disabled_product_listing', $context, $blocks);
        // line 88
        echo "
  ";
        // line 89
        $this->displayBlock('product_without_image_listing', $context, $blocks);
        // line 96
        echo "
  ";
        // line 97
        $this->displayBlock('product_without_description_listing', $context, $blocks);
        // line 104
        echo "
  ";
        // line 105
        $this->displayBlock('product_without_price_listing', $context, $blocks);
        // line 112
        echo "
";
    }

    // line 29
    public function block_monitoring_showcase_card($context, array $blocks = [])
    {
        // line 30
        echo "    <div class=\"row\">
      <div class=\"col\">
        ";
        // line 32
        $this->loadTemplate("@PrestaShop/Admin/Sell/Catalog/Monitoring/Blocks/showcase_card.html.twig", "@PrestaShop/Admin/Sell/Catalog/Monitoring/index.html.twig", 32)->display($context);
        // line 33
        echo "      </div>
    </div>
  ";
    }

    // line 37
    public function block_empty_categories_listing($context, array $blocks = [])
    {
        // line 38
        echo "    <div class=\"row\">
      <div class=\"col\">
        ";
        // line 40
        $this->loadTemplate("@PrestaShop/Admin/Sell/Catalog/Monitoring/index.html.twig", "@PrestaShop/Admin/Sell/Catalog/Monitoring/index.html.twig", 40, "1386374704")->display(twig_array_merge($context, ["grid" => ($context["emptyCategoryGrid"] ?? null)]));
        // line 61
        echo "      </div>
    </div>
  ";
    }

    // line 65
    public function block_no_qty_product_with_combinations_listing($context, array $blocks = [])
    {
        // line 66
        echo "    <div class=\"row\">
      <div class=\"col\">
        ";
        // line 68
        $this->loadTemplate("@PrestaShop/Admin/Common/Grid/grid_panel.html.twig", "@PrestaShop/Admin/Sell/Catalog/Monitoring/index.html.twig", 68)->display(twig_array_merge($context, ["grid" => ($context["noQtyProductWithCombinationGrid"] ?? null)]));
        // line 69
        echo "      </div>
    </div>
  ";
    }

    // line 73
    public function block_no_qty_product_without_combinations_listing($context, array $blocks = [])
    {
        // line 74
        echo "    <div class=\"row\">
      <div class=\"col\">
        ";
        // line 76
        $this->loadTemplate("@PrestaShop/Admin/Common/Grid/grid_panel.html.twig", "@PrestaShop/Admin/Sell/Catalog/Monitoring/index.html.twig", 76)->display(twig_array_merge($context, ["grid" => ($context["noQtyProductWithoutCombinationGrid"] ?? null)]));
        // line 77
        echo "      </div>
    </div>
  ";
    }

    // line 81
    public function block_disabled_product_listing($context, array $blocks = [])
    {
        // line 82
        echo "    <div class=\"row\">
      <div class=\"col\">
        ";
        // line 84
        $this->loadTemplate("@PrestaShop/Admin/Common/Grid/grid_panel.html.twig", "@PrestaShop/Admin/Sell/Catalog/Monitoring/index.html.twig", 84)->display(twig_array_merge($context, ["grid" => ($context["disabledProductGrid"] ?? null)]));
        // line 85
        echo "      </div>
    </div>
  ";
    }

    // line 89
    public function block_product_without_image_listing($context, array $blocks = [])
    {
        // line 90
        echo "    <div class=\"row\">
      <div class=\"col\">
        ";
        // line 92
        $this->loadTemplate("@PrestaShop/Admin/Common/Grid/grid_panel.html.twig", "@PrestaShop/Admin/Sell/Catalog/Monitoring/index.html.twig", 92)->display(twig_array_merge($context, ["grid" => ($context["productWithoutImageGrid"] ?? null)]));
        // line 93
        echo "      </div>
    </div>
  ";
    }

    // line 97
    public function block_product_without_description_listing($context, array $blocks = [])
    {
        // line 98
        echo "    <div class=\"row\">
      <div class=\"col\">
        ";
        // line 100
        $this->loadTemplate("@PrestaShop/Admin/Common/Grid/grid_panel.html.twig", "@PrestaShop/Admin/Sell/Catalog/Monitoring/index.html.twig", 100)->display(twig_array_merge($context, ["grid" => ($context["productWithoutDescriptionGrid"] ?? null)]));
        // line 101
        echo "      </div>
    </div>
  ";
    }

    // line 105
    public function block_product_without_price_listing($context, array $blocks = [])
    {
        // line 106
        echo "    <div class=\"row\">
      <div class=\"col\">
        ";
        // line 108
        $this->loadTemplate("@PrestaShop/Admin/Common/Grid/grid_panel.html.twig", "@PrestaShop/Admin/Sell/Catalog/Monitoring/index.html.twig", 108)->display(twig_array_merge($context, ["grid" => ($context["productWithoutPriceGrid"] ?? null)]));
        // line 109
        echo "      </div>
    </div>
  ";
    }

    // line 115
    public function block_javascripts($context, array $blocks = [])
    {
        // line 116
        echo "  ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

  <script src=\"";
        // line 118
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/default/js/bundle/pagination.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 119
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/new-theme/public/monitoring.bundle.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Catalog/Monitoring/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  227 => 119,  223 => 118,  217 => 116,  214 => 115,  208 => 109,  206 => 108,  202 => 106,  199 => 105,  193 => 101,  191 => 100,  187 => 98,  184 => 97,  178 => 93,  176 => 92,  172 => 90,  169 => 89,  163 => 85,  161 => 84,  157 => 82,  154 => 81,  148 => 77,  146 => 76,  142 => 74,  139 => 73,  133 => 69,  131 => 68,  127 => 66,  124 => 65,  118 => 61,  116 => 40,  112 => 38,  109 => 37,  103 => 33,  101 => 32,  97 => 30,  94 => 29,  89 => 112,  87 => 105,  84 => 104,  82 => 97,  79 => 96,  77 => 89,  74 => 88,  72 => 81,  69 => 80,  67 => 73,  64 => 72,  62 => 65,  59 => 64,  57 => 37,  54 => 36,  51 => 29,  48 => 28,  38 => 26,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Catalog/Monitoring/index.html.twig", "/var/www/html/src/PrestaShopBundle/Resources/views/Admin/Sell/Catalog/Monitoring/index.html.twig");
    }
}


/* @PrestaShop/Admin/Sell/Catalog/Monitoring/index.html.twig */
class __TwigTemplate_63e103fb653709cd0edcc6aea55af4056e084c3559247ca84c7f4f2fe628f55f___1386374704 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'grid_panel_body' => [$this, 'block_grid_panel_body'],
            'grid_view_block' => [$this, 'block_grid_view_block'],
            'grid_panel_extra_content' => [$this, 'block_grid_panel_extra_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 40
        return "@PrestaShop/Admin/Common/Grid/grid_panel.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/Common/Grid/grid_panel.html.twig", "@PrestaShop/Admin/Sell/Catalog/Monitoring/index.html.twig", 40);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 42
    public function block_grid_panel_body($context, array $blocks = [])
    {
        // line 43
        echo "            <div class=\"card-body\">
              <div class=\"alert alert-info\">
                <div class=\"alert-text\">
                  ";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("An empty category is a category that has no product directly associated to it. An empty category may however contain products through its subcategories.", [], "Admin.Catalog.Help"), "html", null, true);
        echo "
                </div>
              </div>
              ";
        // line 49
        $this->displayBlock('grid_view_block', $context, $blocks);
        // line 52
        echo "            </div>
          ";
    }

    // line 49
    public function block_grid_view_block($context, array $blocks = [])
    {
        // line 50
        echo "                ";
        echo twig_include($this->env, $context, "@PrestaShop/Admin/Common/Grid/grid.html.twig", ["grid" => ($context["emptyCategoryGrid"] ?? null)]);
        echo "
              ";
    }

    // line 55
    public function block_grid_panel_extra_content($context, array $blocks = [])
    {
        // line 56
        echo "            ";
        $this->loadTemplate("@PrestaShop/Admin/Sell/Catalog/Categories/Blocks/delete_categories_modal.html.twig", "@PrestaShop/Admin/Sell/Catalog/Monitoring/index.html.twig", 56)->display(twig_array_merge($context, ["deleteCategoriesForm" =>         // line 57
($context["deleteCategoryForm"] ?? null)]));
        // line 59
        echo "          ";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Catalog/Monitoring/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  327 => 59,  325 => 57,  323 => 56,  320 => 55,  313 => 50,  310 => 49,  305 => 52,  303 => 49,  297 => 46,  292 => 43,  289 => 42,  279 => 40,  227 => 119,  223 => 118,  217 => 116,  214 => 115,  208 => 109,  206 => 108,  202 => 106,  199 => 105,  193 => 101,  191 => 100,  187 => 98,  184 => 97,  178 => 93,  176 => 92,  172 => 90,  169 => 89,  163 => 85,  161 => 84,  157 => 82,  154 => 81,  148 => 77,  146 => 76,  142 => 74,  139 => 73,  133 => 69,  131 => 68,  127 => 66,  124 => 65,  118 => 61,  116 => 40,  112 => 38,  109 => 37,  103 => 33,  101 => 32,  97 => 30,  94 => 29,  89 => 112,  87 => 105,  84 => 104,  82 => 97,  79 => 96,  77 => 89,  74 => 88,  72 => 81,  69 => 80,  67 => 73,  64 => 72,  62 => 65,  59 => 64,  57 => 37,  54 => 36,  51 => 29,  48 => 28,  38 => 26,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Catalog/Monitoring/index.html.twig", "/var/www/html/src/PrestaShopBundle/Resources/views/Admin/Sell/Catalog/Monitoring/index.html.twig");
    }
}
