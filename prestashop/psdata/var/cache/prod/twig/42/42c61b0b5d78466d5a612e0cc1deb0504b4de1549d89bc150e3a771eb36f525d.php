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

/* @PrestaShop/Admin/Configure/AdvancedParameters/Blocks/import_panel.html.twig */
class __TwigTemplate_bcbc7185a7a6eeecb7f3cb44fa37567a0c7c7658e70085fef84071c984ab4b4c extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'import_form' => [$this, 'block_import_form'],
            'import_file_history_block' => [$this, 'block_import_file_history_block'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 25
        echo "
";
        // line 27
        $this->env->getRuntime("Symfony\\Component\\Form\\FormRenderer")->setTheme(($context["importForm"] ?? null), [0 => "PrestaShopBundle:Admin/TwigTemplateForm:prestashop_ui_kit.html.twig"], true);
        // line 28
        echo "
";
        // line 29
        $this->displayBlock('import_form', $context, $blocks);
    }

    public function block_import_form($context, array $blocks = [])
    {
        // line 30
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["importForm"] ?? null), 'form_start', ["attr" => ["data-file-upload-url" => ($context["importFileUploadUrl"] ?? null), "data-delete-confirm-message" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Are you sure you want to delete this entity:", [], "Admin.Advparameters.Notification"), "class" => "js-import-form"]]);
        echo "
<div class=\"card\">
  <h3 class=\"card-header\">
    <i class=\"material-icons\">import_export</i> ";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Import", [], "Admin.Actions"), "html", null, true);
        echo "
  </h3>
  <div class=\"card-body\">
    <div class=\"alert alert-info\" role=\"alert\">
      <p class=\"alert-text\">
        ";
        // line 38
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("You can read information on import at:", [], "Admin.Advparameters.Help"), "html", null, true);
        echo "
        <a href=\"";
        // line 39
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("https://docs.prestashop-project.org/1.7-documentation/user-guide/configuring-shop/advanced-parameters/import", [], "Admin.Advparameters.Help"), "html", null, true);
        echo "\" target=\"_blank\" rel=\"noopener noreferrer nofollow\">
          ";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("https://docs.prestashop-project.org/1.7-documentation/user-guide/configuring-shop/advanced-parameters/import", [], "Admin.Advparameters.Help"), "html", null, true);
        echo "
        </a>
      </p>
      <p class=\"alert-text\">
        ";
        // line 44
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Read more about the CSV format at:", [], "Admin.Advparameters.Help"), "html", null, true);
        echo "
        <a href=\"";
        // line 45
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("https://en.wikipedia.org/wiki/Comma-separated_values", [], "Admin.Advparameters.Help"), "html", null, true);
        echo "\" target=\"_blank\" rel=\"noopener noreferrer nofollow\">
          ";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("https://en.wikipedia.org/wiki/Comma-separated_values", [], "Admin.Advparameters.Help"), "html", null, true);
        echo "
        </a>
      </p>
    </div>

    <hr>

    <div class=\"form-group\">
      ";
        // line 54
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["importForm"] ?? null), "entity", []), 'row');
        echo "
    </div>

    <div class=\"alert alert-warning js-entity-alert\" role=\"alert\">
      <ul>
        <li>";
        // line 59
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Note that the Category import does not support having two categories with the same name.", [], "Admin.Advparameters.Notification"), "html", null, true);
        echo "</li>
        <li>";
        // line 60
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Note that you can have several products with the same reference.", [], "Admin.Advparameters.Notification"), "html", null, true);
        echo "</li>
      </ul>
    </div>

    <hr>

    <div class=\"form-group hidden-xs-up\">
      ";
        // line 67
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["importForm"] ?? null), "csv", []), 'errors');
        echo "
      ";
        // line 68
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["importForm"] ?? null), "csv", []), 'widget', ["attr" => ["class" => "js-import-file-input"]]);
        echo "
    </div>

    <div class=\"form-group js-file-upload-form-group\">
      ";
        // line 72
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["importForm"] ?? null), "file", []), 'label');
        echo "
      <div class=\"row\">
        <div class=\"col\">
          ";
        // line 75
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["importForm"] ?? null), "file", []), 'errors');
        echo "
          ";
        // line 76
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["importForm"] ?? null), "file", []), 'widget', ["attr" => ["class" => "js-import-file", "data-max-file-upload-size" => ($context["maxFileUploadSize"] ?? null)]]);
        echo "
        </div>
        <div class=\"col\">
          <span>";
        // line 79
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("or", [], "Admin.Global"), "html", null, true);
        echo "</span>
          <button type=\"button\"
                  class=\"btn btn-outline-primary btn-sm js-from-files-history-btn\"
                  ";
        // line 82
        if (twig_test_empty(($context["importFileNames"] ?? null))) {
            echo "disabled";
        }
        // line 83
        echo "          >
            <span class=\"badge badge-primary js-files-history-number\">";
        // line 84
        echo twig_escape_filter($this->env, twig_length_filter($this->env, ($context["importFileNames"] ?? null)), "html", null, true);
        echo "</span>
            ";
        // line 85
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Choose from history / FTP", [], "Admin.Advparameters.Feature"), "html", null, true);
        echo "
          </button>
        </div>
      </div>
      <small class=\"form-text\">";
        // line 89
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Allowed formats: .csv, .xls, .xlsx, .xlst, .ods, .ots", [], "Admin.Advparameters.Help"), "html", null, true);
        echo "</small>
      <small class=\"form-text\">";
        // line 90
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Only UTF-8 and ISO 8859-1 encodings are allowed", [], "Admin.Advparameters.Help"), "html", null, true);
        echo "</small>
      <small class=\"form-text\">";
        // line 91
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("You can also upload your file via FTP to the following directory: %s .", ["%s" => ($context["importDirectory"] ?? null)], "Admin.Advparameters.Help"), "html", null, true);
        echo "</small>
    </div>

    <div class=\"alert alert-danger d-none js-import-file-error\" role=\"alert\">
      <p class=\"alert-text\">
        <strong class=\"js-file-data\"></strong>: <span class=\"js-error-message\"></span>
      </p>
    </div>

    <div class=\"alert alert-success d-none js-import-file-alert\" role=\"alert\">
      <button type=\"button\"
              class=\"close btn btn-outline-secondary js-change-import-file-btn\"
              aria-label=\"";
        // line 103
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Change", [], "Admin.Actions"), "html", null, true);
        echo "\"
      >
        <span aria-hidden=\"true\"><i class=\"material-icons\">edit</i></span>
      </button>
      <p class=\"alert-text js-import-file\"></p>
    </div>

    ";
        // line 110
        $this->displayBlock('import_file_history_block', $context, $blocks);
        // line 113
        echo "
    <hr>
    ";
        // line 115
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["importForm"] ?? null), "iso_lang", []), 'row');
        echo "
    ";
        // line 116
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["importForm"] ?? null), "separator", []), 'row');
        echo "
    ";
        // line 117
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["importForm"] ?? null), "multiple_value_separator", []), 'row');
        echo "
    <hr>
    ";
        // line 119
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["importForm"] ?? null), "submitImportFile", []), 'label');
        echo "

    ";
        // line 122
        echo "    ";
        $this->getAttribute($this->getAttribute(($context["importForm"] ?? null), "submitImportFile", []), "setRendered", []);
        // line 123
        echo "    ";
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["importForm"] ?? null), 'widget');
        echo "
  </div>
  <div class=\"card-footer\">
    <div class=\"d-flex justify-content-end\">
      <button class=\"btn btn-primary\" name=\"";
        // line 127
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["importForm"] ?? null), "submitImportFile", []), "vars", []), "name", []), "html", null, true);
        echo "\">
        ";
        // line 128
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["importForm"] ?? null), "submitImportFile", []), "vars", []), "label", []), "html", null, true);
        echo "
        <i class=\"material-icons\">navigate_next</i>
      </button>
    </div>
  </div>
</div>
";
        // line 134
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["importForm"] ?? null), 'form_end');
        echo "
";
    }

    // line 110
    public function block_import_file_history_block($context, array $blocks = [])
    {
        // line 111
        echo "      ";
        $this->loadTemplate("@PrestaShop/Admin/Configure/AdvancedParameters/Blocks/import_file_history.html.twig", "@PrestaShop/Admin/Configure/AdvancedParameters/Blocks/import_panel.html.twig", 111)->display($context);
        // line 112
        echo "    ";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Configure/AdvancedParameters/Blocks/import_panel.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  260 => 112,  257 => 111,  254 => 110,  248 => 134,  239 => 128,  235 => 127,  227 => 123,  224 => 122,  219 => 119,  214 => 117,  210 => 116,  206 => 115,  202 => 113,  200 => 110,  190 => 103,  175 => 91,  171 => 90,  167 => 89,  160 => 85,  156 => 84,  153 => 83,  149 => 82,  143 => 79,  137 => 76,  133 => 75,  127 => 72,  120 => 68,  116 => 67,  106 => 60,  102 => 59,  94 => 54,  83 => 46,  79 => 45,  75 => 44,  68 => 40,  64 => 39,  60 => 38,  52 => 33,  46 => 30,  40 => 29,  37 => 28,  35 => 27,  32 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Configure/AdvancedParameters/Blocks/import_panel.html.twig", "/var/www/html/src/PrestaShopBundle/Resources/views/Admin/Configure/AdvancedParameters/Blocks/import_panel.html.twig");
    }
}
