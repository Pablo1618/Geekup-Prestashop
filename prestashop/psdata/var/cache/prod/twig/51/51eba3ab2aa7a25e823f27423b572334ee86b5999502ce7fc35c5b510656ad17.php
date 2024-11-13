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

/* @Modules/ps_mbo/views/templates/admin/controllers/module_catalog/Includes/action_button.html.twig */
class __TwigTemplate_0835cb5ffcc4508641c63534a7f73019bf6aac11c97c166675987c719febd1af extends \Twig\Template
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
        // line 19
        echo "
";
        // line 20
        $context["displayAction"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans(twig_replace_filter(twig_title_string_filter($this->env, ($context["action"] ?? null)), ["_" => " "]), [], ($context["transDomain"] ?? null));
        // line 21
        if ((($context["action"] ?? null) == "configure")) {
            // line 22
            echo "
    <a class=\"";
            // line 23
            echo twig_escape_filter($this->env, ($context["classes"] ?? null), "html", null, true);
            echo "\" href=\"";
            echo twig_escape_filter($this->env, ($context["url"] ?? null), "html", null, true);
            echo "\">
      ";
            // line 24
            echo twig_escape_filter($this->env, ($context["displayAction"] ?? null), "html", null, true);
            echo "
    </a>

";
        } else {
            // line 28
            echo "
    <form class='";
            // line 29
            echo twig_escape_filter($this->env, ((array_key_exists("classes_form", $context)) ? (_twig_default_filter(($context["classes_form"] ?? null))) : ("")), "html", null, true);
            echo "' method=\"post\" action=\"";
            echo twig_escape_filter($this->env, ($context["url"] ?? null), "html", null, true);
            echo "\">
      <button type=\"submit\" class=\"";
            // line 30
            echo twig_escape_filter($this->env, ($context["classes"] ?? null), "html", null, true);
            echo " module_action_menu_";
            echo twig_escape_filter($this->env, ($context["action"] ?? null), "html", null, true);
            echo "\" data-confirm_modal=\"module-modal-confirm-";
            echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
            echo "-";
            echo twig_escape_filter($this->env, ($context["action"] ?? null), "html", null, true);
            echo "\">
        ";
            // line 31
            echo twig_escape_filter($this->env, ($context["displayAction"] ?? null), "html", null, true);
            echo "
      </button>
    </form>

";
        }
    }

    public function getTemplateName()
    {
        return "@Modules/ps_mbo/views/templates/admin/controllers/module_catalog/Includes/action_button.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  72 => 31,  62 => 30,  56 => 29,  53 => 28,  46 => 24,  40 => 23,  37 => 22,  35 => 21,  33 => 20,  30 => 19,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@Modules/ps_mbo/views/templates/admin/controllers/module_catalog/Includes/action_button.html.twig", "/var/www/html/modules/ps_mbo/views/templates/admin/controllers/module_catalog/Includes/action_button.html.twig");
    }
}
