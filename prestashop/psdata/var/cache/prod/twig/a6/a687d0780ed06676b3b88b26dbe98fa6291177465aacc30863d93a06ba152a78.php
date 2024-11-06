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

/* @PrestaShop/Admin/Configure/ShopParameters/preferences.html.twig */
class __TwigTemplate_dc142fcec1e80eb163dd725d470a7d5788a241b3d803cd831cb70827ec43ce22 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'content' => [$this, 'block_content'],
            'preferences_form_general' => [$this, 'block_preferences_form_general'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 25
        return "@PrestaShop/Admin/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 27
        $this->env->getRuntime("Symfony\\Component\\Form\\FormRenderer")->setTheme(($context["generalForm"] ?? null), [0 => "PrestaShopBundle:Admin/TwigTemplateForm:prestashop_ui_kit.html.twig"], true);
        // line 25
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/layout.html.twig", "@PrestaShop/Admin/Configure/ShopParameters/preferences.html.twig", 25);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 29
    public function block_content($context, array $blocks = [])
    {
        // line 30
        echo "  ";
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["generalForm"] ?? null), 'form_start', ["attr" => ["class" => "form", "id" => "configuration_form"]]);
        echo "
    <div class=\"row justify-content-center\">
      ";
        // line 32
        $this->displayBlock('preferences_form_general', $context, $blocks);
        // line 70
        echo "    </div>
  ";
        // line 71
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["generalForm"] ?? null), 'form_end');
        echo "
";
    }

    // line 32
    public function block_preferences_form_general($context, array $blocks = [])
    {
        // line 33
        echo "        <div class=\"col\">
          <div class=\"card\">
            <h3 class=\"card-header\">
              <i class=\"material-icons\">settings</i> ";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("General", [], "Admin.Global"), "html", null, true);
        echo "
            </h3>
            <div class=\"card-block row\">
              <div class=\"card-text\">
                  ";
        // line 40
        if ( !$this->getAttribute($this->getAttribute(($context["app"] ?? null), "request", []), "isSecure", [], "method")) {
            // line 41
            echo "                    <div class=\"form-group row\">
                        <label class=\"form-control-label \">
                          ";
            // line 43
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Enable SSL", [], "Admin.Shopparameters.Feature"), "html", null, true);
            echo "
                        </label>
                      <div class=\"col-sm\">
                        <div class=\"input-group\">
                          <div class=\"form-control-plaintext\">
                            <a class=\"d-block\" href=\"";
            // line 48
            echo twig_escape_filter($this->env, ($context["sslUri"] ?? null), "html", null, true);
            echo "\">
                              ";
            // line 49
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Please click here to check if your shop supports HTTPS.", [], "Admin.Shopparameters.Feature"), "html", null, true);
            echo "
                            </a>
                          </div>
                        </div>
                        <small class=\"form-text\">
                          ";
            // line 54
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("If you want to enable SSL on all the pages of your shop, activate the \"Enable on all the pages\" option below.", [], "Admin.Shopparameters.Help"), "html", null, true);
            echo "
                        </small>
                      </div>
                    </div>
                  ";
        }
        // line 59
        echo "                ";
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["generalForm"] ?? null), 'widget');
        echo "
              </div>
            </div>
            <div class=\"card-footer\">
              <div class=\"d-flex justify-content-end\">
                <button class=\"btn btn-primary\" id=\"form-preferences-save-button\">";
        // line 64
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Save", [], "Admin.Actions"), "html", null, true);
        echo "</button>
              </div>
            </div>
          </div>
        </div>
      ";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Configure/ShopParameters/preferences.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  121 => 64,  112 => 59,  104 => 54,  96 => 49,  92 => 48,  84 => 43,  80 => 41,  78 => 40,  71 => 36,  66 => 33,  63 => 32,  57 => 71,  54 => 70,  52 => 32,  46 => 30,  43 => 29,  38 => 25,  36 => 27,  30 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Configure/ShopParameters/preferences.html.twig", "/var/www/html/src/PrestaShopBundle/Resources/views/Admin/Configure/ShopParameters/preferences.html.twig");
    }
}
