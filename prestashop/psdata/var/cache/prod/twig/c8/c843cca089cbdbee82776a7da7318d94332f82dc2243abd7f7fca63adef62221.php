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

/* @PrestaShop/Admin/Configure/AdvancedParameters/ImportPage/import.html.twig */
class __TwigTemplate_e810db7713d1bb67dece41a5e7654b7378e17eb99fc7b1c4052d2eddc15331b3 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'content' => [$this, 'block_content'],
            'import_panel' => [$this, 'block_import_panel'],
            'import_available_fields' => [$this, 'block_import_available_fields'],
            'import_sample_files' => [$this, 'block_import_sample_files'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 26
        return "@PrestaShop/Admin/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/layout.html.twig", "@PrestaShop/Admin/Configure/AdvancedParameters/ImportPage/import.html.twig", 26);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 29
    public function block_content($context, array $blocks = [])
    {
        // line 30
        echo "  ";
        if (array_key_exists("importForm", $context)) {
            // line 31
            echo "    <div class=\"row row justify-content-center\">
      <div class=\"col\">
        <div class=\"row\">
          <div class=\"col-12 col-md-8\">
            ";
            // line 35
            $this->displayBlock('import_panel', $context, $blocks);
            // line 38
            echo "          </div>

          <div class=\"col-12 col-md-4\">
            ";
            // line 41
            $this->displayBlock('import_available_fields', $context, $blocks);
            // line 44
            echo "
            ";
            // line 45
            $this->displayBlock('import_sample_files', $context, $blocks);
            // line 48
            echo "          </div>
        </div>
      </div>
    </div>
  ";
        }
    }

    // line 35
    public function block_import_panel($context, array $blocks = [])
    {
        // line 36
        echo "              ";
        $this->loadTemplate("@PrestaShop/Admin/Configure/AdvancedParameters/Blocks/import_panel.html.twig", "@PrestaShop/Admin/Configure/AdvancedParameters/ImportPage/import.html.twig", 36)->display($context);
        // line 37
        echo "            ";
    }

    // line 41
    public function block_import_available_fields($context, array $blocks = [])
    {
        // line 42
        echo "              ";
        $this->loadTemplate("@PrestaShop/Admin/Configure/AdvancedParameters/Blocks/import_available_fields.html.twig", "@PrestaShop/Admin/Configure/AdvancedParameters/ImportPage/import.html.twig", 42)->display($context);
        // line 43
        echo "            ";
    }

    // line 45
    public function block_import_sample_files($context, array $blocks = [])
    {
        // line 46
        echo "              ";
        $this->loadTemplate("@PrestaShop/Admin/Configure/AdvancedParameters/Blocks/import_sample_files.html.twig", "@PrestaShop/Admin/Configure/AdvancedParameters/ImportPage/import.html.twig", 46)->display($context);
        // line 47
        echo "            ";
    }

    // line 55
    public function block_javascripts($context, array $blocks = [])
    {
        // line 56
        echo "  ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

  <script src=\"";
        // line 58
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/new-theme/public/imports.bundle.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Configure/AdvancedParameters/ImportPage/import.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  117 => 58,  111 => 56,  108 => 55,  104 => 47,  101 => 46,  98 => 45,  94 => 43,  91 => 42,  88 => 41,  84 => 37,  81 => 36,  78 => 35,  69 => 48,  67 => 45,  64 => 44,  62 => 41,  57 => 38,  55 => 35,  49 => 31,  46 => 30,  43 => 29,  33 => 26,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Configure/AdvancedParameters/ImportPage/import.html.twig", "/var/www/html/src/PrestaShopBundle/Resources/views/Admin/Configure/AdvancedParameters/ImportPage/import.html.twig");
    }
}
