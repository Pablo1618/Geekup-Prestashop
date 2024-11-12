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

/* @Modules/ps_mbo/views/templates/admin/controllers/module_catalog/Includes/tab-module-line.html.twig */
class __TwigTemplate_f39c2f9baebe9ac23aba28bb51201fabc2f8c6f7123083cae5f6e404f997a800 extends \Twig\Template
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
        // line 20
        $context["moduleImage"] = (((null === $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "img", []))) ? ((((twig_constant("_MODULE_DIR_") . $this->getAttribute($this->getAttribute(        // line 21
($context["module"] ?? null), "attributes", []), "name", [])) . "/") . $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "logo", []))) : ($this->getAttribute($this->getAttribute(        // line 22
($context["module"] ?? null), "attributes", []), "img", [])));
        // line 24
        echo "<tr>
  <td class=\"fixed-with-sm center\">
    <img
      class=\"img-thumbnail\"
      alt=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "name", []), "html", null, true);
        echo "\"
      src=\"";
        // line 29
        echo twig_escape_filter($this->env, ($context["moduleImage"] ?? null), "html", null, true);
        echo "\"
    />
  </td>
  <td>
    <div id=\"anchor";
        // line 33
        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "name", [])), "html", null, true);
        echo "\" title=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "displayName", []), "html", null, true);
        echo "\">
      <div class=\"module_name\">
        <span style=\"display:none\">";
        // line 35
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "name", []), "html", null, true);
        echo "</span>
        ";
        // line 36
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "displayName", []), "html", null, true);
        echo "
        <small class=\"text-muted\">v";
        // line 37
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "version", []), "html", null, true);
        echo " - by ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "author", []), "html", null, true);
        echo "</small>
        ";
        // line 38
        if (( !twig_test_empty($this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "type", [])) && ($this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "type", []) == "addonsBought"))) {
            // line 39
            echo "        - <span class=\"module-badge-bought help-tooltip text-warning\" data-title=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("You bought this module on PrestaShop Addons. Thank You.", [], "Admin.Modules.Help"), "html", null, true);
            echo "\"><i class=\"icon-pushpin\"></i> <small>";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Bought", [], "Admin.Modules.Help"), "html", null, true);
            echo "</small></span>
        ";
        } elseif (( !twig_test_empty($this->getAttribute($this->getAttribute(        // line 40
($context["module"] ?? null), "attributes", []), "type", [])) && ($this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "type", []) == "addonsMustHave"))) {
            // line 41
            echo "        - <span class=\"module-badge-popular help-tooltip text-primary\" data-title=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("This module is available on PrestaShop Addons.", [], "Admin.Modules.Help"), "html", null, true);
            echo "\"><i class=\"icon-group\"></i> <small>";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Popular", [], "Admin.Modules.Help"), "html", null, true);
            echo "</small></span>
        ";
        } elseif (( !twig_test_empty($this->getAttribute($this->getAttribute(        // line 42
($context["module"] ?? null), "attributes", []), "type", [])) && ($this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "type", []) == "addonsPartner"))) {
            // line 43
            echo "        - <span class=\"module-badge-partner help-tooltip text-warning\" data-title=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("This module is available for free thanks to our partner.", [], "Admin.Modules.Help"), "html", null, true);
            echo "\"><i class=\"icon-pushpin\"></i> <small>";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Official", [], "Admin.Modules.Help"), "html", null, true);
            echo "</small></span>
        ";
        } elseif (($this->getAttribute($this->getAttribute(        // line 44
($context["module"] ?? null), "attributes", [], "any", false, true), "id", [], "any", true, true) && ($this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "id", []) >= 0))) {
            // line 45
            echo "          ";
            if (($this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", [], "any", false, true), "version_addons", [], "any", true, true) && $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "version_addons", []))) {
                // line 46
                echo "            <span class=\"label label-warning\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Need update", [], "Admin.Modules.Help"), "html", null, true);
                echo "</span>
          ";
            }
            // line 48
            echo "        ";
        }
        // line 49
        echo "      </div>
      <p class=\"module_description\">
        ";
        // line 51
        if (($this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", [], "any", false, true), "description", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "description", [])))) {
            // line 52
            echo "          ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "description", []), "html", null, true);
            echo "
        ";
        }
        // line 54
        echo "      </p>
      ";
        // line 55
        if ((($this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", [], "any", false, true), "message", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "name", []))) && (( !$this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", [], "any", false, true), "type", [], "any", true, true) || ($this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "type", []) != "addonsMustHave")) || ($this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "type", []) != "addonsNative")))) {
            // line 56
            echo "        <div class=\"alert alert-success\" role=\"alert\">
          <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
          <p class=\"alert-text\">
            ";
            // line 59
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "message", []), "html", null, true);
            echo "
          </p>
        </div>
      ";
        }
        // line 63
        echo "    </div>
  </td>
  <td class=\"module-container module-quick-action-list clearfix\">
    ";
        // line 66
        echo twig_include($this->env, $context, "@Modules/ps_mbo/views/templates/admin/controllers/module_catalog/Includes/action_menu.html.twig", ["module" => ($context["module"] ?? null)]);
        echo "
  </td>
</tr>
";
    }

    public function getTemplateName()
    {
        return "@Modules/ps_mbo/views/templates/admin/controllers/module_catalog/Includes/tab-module-line.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  147 => 66,  142 => 63,  135 => 59,  130 => 56,  128 => 55,  125 => 54,  119 => 52,  117 => 51,  113 => 49,  110 => 48,  104 => 46,  101 => 45,  99 => 44,  92 => 43,  90 => 42,  83 => 41,  81 => 40,  74 => 39,  72 => 38,  66 => 37,  62 => 36,  58 => 35,  51 => 33,  44 => 29,  40 => 28,  34 => 24,  32 => 22,  31 => 21,  30 => 20,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@Modules/ps_mbo/views/templates/admin/controllers/module_catalog/Includes/tab-module-line.html.twig", "/var/www/html/modules/ps_mbo/views/templates/admin/controllers/module_catalog/Includes/tab-module-line.html.twig");
    }
}
