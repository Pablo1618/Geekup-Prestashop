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

/* @PrestaShop/Admin/Configure/ShopParameters/Blocks/product_preferences_stock.html.twig */
class __TwigTemplate_31e9a425e9fe9ede952d2bfcc242eb333f692f7fb1992256e36f8f78170fea3c extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'product_preferences_stock' => [$this, 'block_product_preferences_stock'],
            'product_stock_preferences_form_rest' => [$this, 'block_product_stock_preferences_form_rest'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 25
        echo "
";
        // line 27
        $context["ps"] = $this->loadTemplate("@PrestaShop/Admin/macros.html.twig", "@PrestaShop/Admin/Configure/ShopParameters/Blocks/product_preferences_stock.html.twig", 27)->unwrap();
        // line 28
        echo "
";
        // line 29
        $this->displayBlock('product_preferences_stock', $context, $blocks);
    }

    public function block_product_preferences_stock($context, array $blocks = [])
    {
        // line 30
        echo "<div class=\"row justify-content-center\">
  <div class=\"col\">
    <div class=\"card\" id=\"configuration_fieldset_stock\">
      <h3 class=\"card-header\">
        <i class=\"material-icons\">shop</i> ";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Products stock", [], "Admin.Shopparameters.Feature"), "html", null, true);
        echo "
      </h3>
      <div class=\"card-block row\">
        <div class=\"card-text\">
          <div class=\"form-group row\">
            ";
        // line 39
        echo $context["ps"]->getlabel_with_help($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Allow ordering of out-of-stock products", [], "Admin.Shopparameters.Feature"), $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("By default, the \"%add_to_cart_label%\" button is hidden when a product is unavailable. You can choose to have it displayed in all cases.", ["%add_to_cart_label%" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Add to cart", [], "Shop.Theme.Actions")], "Admin.Shopparameters.Help"));
        echo "
            <div class=\"col-sm\">
              ";
        // line 41
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["stockForm"] ?? null), "allow_ordering_oos", []), 'errors');
        echo "
              ";
        // line 42
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["stockForm"] ?? null), "allow_ordering_oos", []), 'widget');
        echo "
            </div>
          </div>
          <div class=\"form-group row\">
            <label class=\"form-control-label\">
              ";
        // line 47
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Enable stock management", [], "Admin.Shopparameters.Feature"), "html", null, true);
        echo "
            </label>
            <div class=\"col-sm\">
              ";
        // line 50
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["stockForm"] ?? null), "stock_management", []), 'errors');
        echo "
              ";
        // line 51
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["stockForm"] ?? null), "stock_management", []), 'widget');
        echo "
            </div>
          </div>
          <div class=\"form-group row\">
            <label class=\"form-control-label\">
              ";
        // line 56
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Label of in-stock products", [], "Admin.Shopparameters.Feature"), "html", null, true);
        echo "
            </label>
            <div class=\"col-sm\">
              ";
        // line 59
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["stockForm"] ?? null), "stock_management", []), 'errors');
        echo "
              ";
        // line 60
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["stockForm"] ?? null), "in_stock_label", []), 'widget');
        echo "
            </div>
          </div>
          <div class=\"form-group row\">
            <label class=\"form-control-label\">
              ";
        // line 65
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Label of out-of-stock products with allowed backorders", [], "Admin.Shopparameters.Feature"), "html", null, true);
        echo "
            </label>
            <div class=\"col-sm\">
              ";
        // line 68
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["stockForm"] ?? null), "oos_allowed_backorders", []), 'errors');
        echo "
              ";
        // line 69
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["stockForm"] ?? null), "oos_allowed_backorders", []), 'widget');
        echo "
            </div>
          </div>
          <div class=\"form-group row\">
            <label class=\"form-control-label\">
              ";
        // line 74
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Label of out-of-stock products with denied backorders", [], "Admin.Shopparameters.Feature"), "html", null, true);
        echo "
            </label>
            <div class=\"col-sm\">
              ";
        // line 77
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["stockForm"] ?? null), "oos_denied_backorders", []), 'errors');
        echo "
              ";
        // line 78
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["stockForm"] ?? null), "oos_denied_backorders", []), 'widget');
        echo "
            </div>
          </div>
          <div class=\"form-group row\">
            ";
        // line 82
        echo $context["ps"]->getlabel_with_help($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Delivery time of in-stock products", [], "Admin.Shopparameters.Feature"), $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Advised for European merchants to be legally compliant (eg: Delivered within 3-4 days)", [], "Admin.Shopparameters.Help"));
        echo "
            <div class=\"col-sm\">
              ";
        // line 84
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["stockForm"] ?? null), "delivery_time", []), 'errors');
        echo "
              ";
        // line 85
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["stockForm"] ?? null), "delivery_time", []), 'widget');
        echo "
              <small class=\"form-text\">";
        // line 86
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Leave empty to disable", [], "Admin.Shopparameters.Feature"), "html", null, true);
        echo "</small>
            </div>
          </div>
          <div class=\"form-group row\">
            ";
        // line 90
        echo $context["ps"]->getlabel_with_help($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Delivery time of out-of-stock products with allowed backorders", [], "Admin.Shopparameters.Feature"), $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Advised for European merchants to be legally compliant (eg: Delivered within 5-7 days)", [], "Admin.Shopparameters.Help"));
        echo "
            <div class=\"col-sm\">
              ";
        // line 92
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["stockForm"] ?? null), "oos_delivery_time", []), 'errors');
        echo "
              ";
        // line 93
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["stockForm"] ?? null), "oos_delivery_time", []), 'widget');
        echo "
              <small class=\"form-text\">";
        // line 94
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Leave empty to disable", [], "Admin.Shopparameters.Feature"), "html", null, true);
        echo "</small>
            </div>
          </div>
          <div class=\"form-group row\">
            ";
        // line 98
        echo $context["ps"]->getlabel_with_help($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Default pack stock management", [], "Admin.Shopparameters.Feature"), $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("When selling packs of products, how do you want your stock to be calculated?", [], "Admin.Shopparameters.Help"));
        echo "
            <div class=\"col-sm\">
              ";
        // line 100
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["stockForm"] ?? null), "pack_stock_management", []), 'errors');
        echo "
              ";
        // line 101
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["stockForm"] ?? null), "pack_stock_management", []), 'widget');
        echo "
            </div>
          </div>
          ";
        // line 104
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["stockForm"] ?? null), "oos_show_label_listing_pages", []), 'row');
        echo "
          ";
        // line 105
        $this->displayBlock('product_stock_preferences_form_rest', $context, $blocks);
        // line 108
        echo "        </div>
      </div>
      <div class=\"card-footer\">
        <div class=\"d-flex justify-content-end\">
          <button class=\"btn btn-primary\" id=\"form-stock-save-button\">";
        // line 112
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Save", [], "Admin.Actions"), "html", null, true);
        echo "</button>
        </div>
      </div>
    </div>
  </div>
</div>
";
    }

    // line 105
    public function block_product_stock_preferences_form_rest($context, array $blocks = [])
    {
        // line 106
        echo "            ";
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["stockForm"] ?? null), 'rest');
        echo "
          ";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Configure/ShopParameters/Blocks/product_preferences_stock.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  229 => 106,  226 => 105,  215 => 112,  209 => 108,  207 => 105,  203 => 104,  197 => 101,  193 => 100,  188 => 98,  181 => 94,  177 => 93,  173 => 92,  168 => 90,  161 => 86,  157 => 85,  153 => 84,  148 => 82,  141 => 78,  137 => 77,  131 => 74,  123 => 69,  119 => 68,  113 => 65,  105 => 60,  101 => 59,  95 => 56,  87 => 51,  83 => 50,  77 => 47,  69 => 42,  65 => 41,  60 => 39,  52 => 34,  46 => 30,  40 => 29,  37 => 28,  35 => 27,  32 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Configure/ShopParameters/Blocks/product_preferences_stock.html.twig", "/var/www/html/src/PrestaShopBundle/Resources/views/Admin/Configure/ShopParameters/Blocks/product_preferences_stock.html.twig");
    }
}
