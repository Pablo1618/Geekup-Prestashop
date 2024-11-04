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

/* @PrestaShop/Admin/Configure/AdvancedParameters/Blocks/import_sample_files.html.twig */
class __TwigTemplate_37097afe84ddfb47a5c9910b4f5650dcdc984c314cd7289bb58d329c12f1c73c extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 25
        echo "
";
        // line 27
        $context["ps"] = $this->loadTemplate("@PrestaShop/Admin/macros.html.twig", "@PrestaShop/Admin/Configure/AdvancedParameters/Blocks/import_sample_files.html.twig", 27)->unwrap();
        // line 28
        echo "
<div class=\"card\">
    <h3 class=\"card-header\">
        <i class=\"material-icons\">file_download</i> ";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Download sample csv files", [], "Admin.Advparameters.Feature"), "html", null, true);
        echo "
    </h3>

    <div class=\"card-block\">
        <div class=\"list-group\">
            ";
        // line 36
        echo $context["ps"]->getimport_file_sample("Sample Categories file", "categories_import");
        echo "
            ";
        // line 37
        echo $context["ps"]->getimport_file_sample("Sample Products file", "products_import");
        echo "
            ";
        // line 38
        echo $context["ps"]->getimport_file_sample("Sample Combinations file", "combinations_import");
        echo "
            ";
        // line 39
        echo $context["ps"]->getimport_file_sample("Sample Customers file", "customers_import");
        echo "
            ";
        // line 40
        echo $context["ps"]->getimport_file_sample("Sample Addresses file", "addresses_import");
        echo "
            ";
        // line 41
        echo $context["ps"]->getimport_file_sample("Sample Brands file", "brands_import");
        echo "
            ";
        // line 42
        echo $context["ps"]->getimport_file_sample("Sample Suppliers file", "suppliers_import");
        echo "
            ";
        // line 43
        echo $context["ps"]->getimport_file_sample("Sample Aliases file", "alias_import");
        echo "
            ";
        // line 44
        echo $context["ps"]->getimport_file_sample("Sample Store Contacts file", "store_contacts");
        echo "
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Configure/AdvancedParameters/Blocks/import_sample_files.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  80 => 44,  76 => 43,  72 => 42,  68 => 41,  64 => 40,  60 => 39,  56 => 38,  52 => 37,  48 => 36,  40 => 31,  35 => 28,  33 => 27,  30 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Configure/AdvancedParameters/Blocks/import_sample_files.html.twig", "/var/www/html/src/PrestaShopBundle/Resources/views/Admin/Configure/AdvancedParameters/Blocks/import_sample_files.html.twig");
    }
}
