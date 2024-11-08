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

/* @PrestaShop/Admin/Configure/ShopParameters/Blocks/product_preferences_page.html.twig */
class __TwigTemplate_110748454d4aeac6a153afb8f2fa38ef92f095ef207308e5608faafa5264dfd7 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'product_preferences_page' => [$this, 'block_product_preferences_page'],
            'product_page_preferences_form_rest' => [$this, 'block_product_page_preferences_form_rest'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 25
        echo "
";
        // line 27
        $context["ps"] = $this->loadTemplate("@PrestaShop/Admin/macros.html.twig", "@PrestaShop/Admin/Configure/ShopParameters/Blocks/product_preferences_page.html.twig", 27)->unwrap();
        // line 28
        echo "
";
        // line 29
        $this->displayBlock('product_preferences_page', $context, $blocks);
    }

    public function block_product_preferences_page($context, array $blocks = [])
    {
        // line 30
        echo "<div class=\"row justify-content-center\">
  <div class=\"col\">
    <div class=\"card\" id=\"configuration_fieldset_fo_product_page\">
      <h3 class=\"card-header\">
        <i class=\"material-icons\">shopping_basket</i> ";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Product page", [], "Admin.Shopparameters.Feature"), "html", null, true);
        echo "
      </h3>
      <div class=\"card-block row\">
        <div class=\"card-text\">
          <div class=\"form-group row\">
            <label class=\"form-control-label\">
              ";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Display available quantities on the product page", [], "Admin.Shopparameters.Feature"), "html", null, true);
        echo "
            </label>
            <div class=\"col-sm\">
              ";
        // line 43
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["pageForm"] ?? null), "display_quantities", []), 'errors');
        echo "
              ";
        // line 44
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["pageForm"] ?? null), "display_quantities", []), 'widget');
        echo "
            </div>
          </div>
          <div class=\"form-group row\">
            ";
        // line 48
        echo $context["ps"]->getlabel_with_help($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Display remaining quantities when the quantity is lower than", [], "Admin.Shopparameters.Feature"), $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Set to \"0\" to disable this feature.", [], "Admin.Shopparameters.Help"));
        echo "
            <div class=\"col-sm\">
              ";
        // line 50
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["pageForm"] ?? null), "display_last_quantities", []), 'errors');
        echo "
              ";
        // line 51
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["pageForm"] ?? null), "display_last_quantities", []), 'widget');
        echo "
            </div>
          </div>
          <div class=\"form-group row\">
            ";
        // line 55
        echo $context["ps"]->getlabel_with_help($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Display unavailable attributes on the product page", [], "Admin.Shopparameters.Feature"), $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("If an attribute is not available in every product combination, it will not be displayed.", [], "Admin.Shopparameters.Help"));
        echo "
            <div class=\"col-sm\">
              ";
        // line 57
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["pageForm"] ?? null), "display_unavailable_attributes", []), 'errors');
        echo "
              ";
        // line 58
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["pageForm"] ?? null), "display_unavailable_attributes", []), 'widget');
        echo "
            </div>
          </div>
          <div class=\"form-group row\">
            ";
        // line 62
        echo $context["ps"]->getlabel_with_help($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Display the \"%add_to_cart_label%\" button when a product has attributes", ["%add_to_cart_label%" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Add to cart", [], "Shop.Theme.Actions")], "Admin.Shopparameters.Help"), $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Display or hide the \"%add_to_cart_label%\" button on category pages for products that have attributes forcing customers to see product details.", ["%add_to_cart_label%" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Add to cart", [], "Shop.Theme.Actions")], "Admin.Shopparameters.Help"));
        echo "
            <div class=\"col-sm\">
              ";
        // line 64
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["pageForm"] ?? null), "allow_add_variant_to_cart_from_listing", []), 'errors');
        echo "
              ";
        // line 65
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["pageForm"] ?? null), "allow_add_variant_to_cart_from_listing", []), 'widget');
        echo "
            </div>
          </div>
          <div class=\"form-group row\">
            <label class=\"form-control-label\">
              ";
        // line 70
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Separator of attribute anchor on the product links", [], "Admin.Shopparameters.Feature"), "html", null, true);
        echo "
            </label>
            <div class=\"col-sm\">
              ";
        // line 73
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["pageForm"] ?? null), "attribute_anchor_separator", []), 'errors');
        echo "
              ";
        // line 74
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["pageForm"] ?? null), "attribute_anchor_separator", []), 'widget');
        echo "
            </div>
          </div>
          <div class=\"form-group row\">
            <label class=\"form-control-label\">
              ";
        // line 79
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Display discounted price", [], "Admin.Shopparameters.Feature"), "html", null, true);
        echo "
            </label>
            <div class=\"col-sm\">
              ";
        // line 82
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["pageForm"] ?? null), "display_discount_price", []), 'errors');
        echo "
              ";
        // line 83
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["pageForm"] ?? null), "display_discount_price", []), 'widget');
        echo "
              <small class=\"form-text\">";
        // line 84
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("In the volume discounts board, display the new price with the applied discount instead of showing the discount (ie. \"-5%\").", [], "Admin.Shopparameters.Help"), "html", null, true);
        echo "</small>
            </div>
          </div>
        </div>

        ";
        // line 89
        $this->displayBlock('product_page_preferences_form_rest', $context, $blocks);
        // line 92
        echo "      </div>
      <div class=\"card-footer\">
        <div class=\"d-flex justify-content-end\">
          <button class=\"btn btn-primary\" id=\"form-page-save-button\">";
        // line 95
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Save", [], "Admin.Actions"), "html", null, true);
        echo "</button>
        </div>
      </div>
    </div>
  </div>
</div>
";
    }

    // line 89
    public function block_product_page_preferences_form_rest($context, array $blocks = [])
    {
        // line 90
        echo "          ";
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["pageForm"] ?? null), 'rest');
        echo "
        ";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Configure/ShopParameters/Blocks/product_preferences_page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  188 => 90,  185 => 89,  174 => 95,  169 => 92,  167 => 89,  159 => 84,  155 => 83,  151 => 82,  145 => 79,  137 => 74,  133 => 73,  127 => 70,  119 => 65,  115 => 64,  110 => 62,  103 => 58,  99 => 57,  94 => 55,  87 => 51,  83 => 50,  78 => 48,  71 => 44,  67 => 43,  61 => 40,  52 => 34,  46 => 30,  40 => 29,  37 => 28,  35 => 27,  32 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Configure/ShopParameters/Blocks/product_preferences_page.html.twig", "/var/www/html/src/PrestaShopBundle/Resources/views/Admin/Configure/ShopParameters/Blocks/product_preferences_page.html.twig");
    }
}
