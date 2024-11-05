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

/* @PrestaShop/Admin/Improve/International/Translations/Blocks/copy_language.html.twig */
class __TwigTemplate_bd230648c53d18753bd4c0edba3f8266508fe24f3f59eeff07b766307deb4152 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'copy_language' => [$this, 'block_copy_language'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 25
        echo "
";
        // line 27
        $this->env->getRuntime("Symfony\\Component\\Form\\FormRenderer")->setTheme(($context["copyLanguageForm"] ?? null), [0 => "PrestaShopBundle:Admin/TwigTemplateForm:prestashop_ui_kit.html.twig"], true);
        // line 28
        echo "
";
        // line 29
        $this->displayBlock('copy_language', $context, $blocks);
    }

    public function block_copy_language($context, array $blocks = [])
    {
        // line 30
        echo "  ";
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["copyLanguageForm"] ?? null), 'form_start', ["action" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_international_translations_copy_language")]);
        echo "

  <div class=\"card\">
    <h3 class=\"card-header\">
      <i class=\"material-icons\">file_copy</i> ";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Copy", [], "Admin.Actions"), "html", null, true);
        echo "
    </h3>

    <div class=\"card-block row\">
      <div class=\"card-text\">
        <div class=\"row\">
          <div class=\"col-sm\">
            <div class=\"alert alert-info\" role=\"alert\">
              <div class=\"alert-text\">
                ";
        // line 43
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Copies data from one language to another.", [], "Admin.International.Help"), "html", null, true);
        echo "<br>
                ";
        // line 44
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Warning: This will replace all of the existing data inside the destination language.", [], "Admin.International.Help"), "html", null, true);
        echo "<br>
                ";
        // line 45
        echo twig_replace_filter($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("If necessary [1][2] you must first create a new language[/1].", [], "Admin.International.Help"), ["[1]" => (("<a href=\"" . ($context["addLanguageUrl"] ?? null)) . "\">"), "[2]" => "<i class=\"material-icons\">launch</i>", "[/1]" => "</a>"]);
        echo "
              </div>
            </div>
          </div>
        </div>
        <div class=\"form-group row\">
          <label class=\"form-control-label\">
            ";
        // line 52
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["copyLanguageForm"] ?? null), "from_language", []), 'label');
        echo "
          </label>
          <div class=\"col-sm\">
            <div class=\"input-group\">
              ";
        // line 56
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["copyLanguageForm"] ?? null), "from_language", []), 'errors');
        echo "
              ";
        // line 57
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["copyLanguageForm"] ?? null), "from_language", []), 'widget');
        echo "

              ";
        // line 59
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["copyLanguageForm"] ?? null), "from_theme", []), 'errors');
        echo "
              ";
        // line 60
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["copyLanguageForm"] ?? null), "from_theme", []), 'widget');
        echo "
            </div>
            <small class=\"form-text\">
              ";
        // line 63
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Language files must be complete to allow copying of translations.", [], "Admin.International.Notification"), "html", null, true);
        echo "
            </small>
          </div>
        </div>

        <div class=\"form-group row\">
          <label class=\"form-control-label\">
            ";
        // line 70
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["copyLanguageForm"] ?? null), "to_language", []), 'label');
        echo "
          </label>
          <div class=\"col-sm\">
            <div class=\"input-group\">
              ";
        // line 74
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["copyLanguageForm"] ?? null), "to_language", []), 'errors');
        echo "
              ";
        // line 75
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["copyLanguageForm"] ?? null), "to_language", []), 'widget');
        echo "

              ";
        // line 77
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["copyLanguageForm"] ?? null), "to_theme", []), 'errors');
        echo "
              ";
        // line 78
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["copyLanguageForm"] ?? null), "to_theme", []), 'widget');
        echo "
            </div>
          </div>
        </div>
        ";
        // line 82
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["copyLanguageForm"] ?? null), 'rest');
        echo "
      </div>
    </div>
    <div class=\"card-footer\">
      <div class=\"d-flex justify-content-end\">
        <button class=\"btn btn-primary\">
          <i class=\"material-icons\">file_copy</i>
          <span>";
        // line 89
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Copy", [], "Admin.Actions"), "html", null, true);
        echo "</span>
        </button>
      </div>
    </div>
  </div>

  ";
        // line 95
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["copyLanguageForm"] ?? null), 'form_end');
        echo "
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Improve/International/Translations/Blocks/copy_language.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  165 => 95,  156 => 89,  146 => 82,  139 => 78,  135 => 77,  130 => 75,  126 => 74,  119 => 70,  109 => 63,  103 => 60,  99 => 59,  94 => 57,  90 => 56,  83 => 52,  73 => 45,  69 => 44,  65 => 43,  53 => 34,  45 => 30,  39 => 29,  36 => 28,  34 => 27,  31 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Improve/International/Translations/Blocks/copy_language.html.twig", "/var/www/html/src/PrestaShopBundle/Resources/views/Admin/Improve/International/Translations/Blocks/copy_language.html.twig");
    }
}
