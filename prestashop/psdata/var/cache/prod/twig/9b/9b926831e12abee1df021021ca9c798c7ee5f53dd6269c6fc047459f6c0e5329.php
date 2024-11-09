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

/* @Modules/ps_mbo/views/templates/admin/controllers/module_catalog/Includes/action_menu.html.twig */
class __TwigTemplate_0e0edc8b3aa63a6b28e0a56342060e86d518e012881ecdbc7459608f341ebb00 extends \Twig\Template
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
        list($context["url"], $context["priceRaw"], $context["priceDisplay"], $context["url_active"], $context["urls"], $context["name"], $context["transDomains"]) =         [$this->getAttribute($this->getAttribute(        // line 20
($context["module"] ?? null), "attributes", []), "url", []), $this->getAttribute($this->getAttribute($this->getAttribute(        // line 21
($context["module"] ?? null), "attributes", []), "price", []), "raw", []), $this->getAttribute($this->getAttribute($this->getAttribute(        // line 22
($context["module"] ?? null), "attributes", []), "price", []), "displayPrice", []), $this->getAttribute($this->getAttribute(        // line 23
($context["module"] ?? null), "attributes", []), "url_active", []), $this->getAttribute($this->getAttribute(        // line 24
($context["module"] ?? null), "attributes", []), "urls", []), $this->getAttribute($this->getAttribute(        // line 25
($context["module"] ?? null), "attributes", []), "name", []), "AdminActions"];
        // line 28
        echo " <div class=\"btn-group module-actions\">
  ";
        // line 29
        if ((($context["url_active"] ?? null) == "buy")) {
            // line 30
            echo "    <a class=\"btn btn-secondary-reverse btn-block btn-outlined-secondary btn-outline-secondary module_action_menu_go_to_addons\" href=\"";
            echo twig_escape_filter($this->env, ($context["url"] ?? null), "html", null, true);
            echo "\" target=\"_blank\">
      <i class=\"material-icons\">launch</i> <p class=\"spacing-icone-p\"> ";
            // line 31
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Discover", [], "Admin.Modules.Feature"), "html", null, true);
            echo "</p>
    </a>
  ";
        } elseif (twig_length_filter($this->env,         // line 33
($context["urls"] ?? null))) {
            // line 34
            echo "    ";
            $this->loadTemplate("@Modules/ps_mbo/views/templates/admin/controllers/module_catalog/Includes/action_button.html.twig", "@Modules/ps_mbo/views/templates/admin/controllers/module_catalog/Includes/action_menu.html.twig", 34)->display(twig_array_merge($context, ["name" =>             // line 35
($context["name"] ?? null), "classes_form" => "btn-group form-action-button", "classes" => "btn btn-secondary", "url" => $this->getAttribute(            // line 38
($context["urls"] ?? null), ($context["url_active"] ?? null), [], "array"), "action" =>             // line 39
($context["url_active"] ?? null), "transDomain" =>             // line 40
($context["transDomains"] ?? null)]));
            // line 42
            echo "    ";
            if ((twig_length_filter($this->env, ($context["urls"] ?? null)) > 1)) {
                // line 43
                echo "        <input type=\"hidden\" class=\"btn\" /> 
        <button type=\"button\" class=\"btn btn-outline-secondary dropdown-toggle dropdown-toggle-split\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\"> 
          <span class=\"caret\"></span> 
        </button>
        <span class=\"sr-only\">";
                // line 47
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Toggle Dropdown", [], "Admin.Modules.Feature"), "html", null, true);
                echo "</span> 
        <div class=\"dropdown-menu\">
          ";
                // line 49
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["urls"] ?? null));
                $context['loop'] = [
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                ];
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["module_action"] => $context["module_url"]) {
                    // line 50
                    echo "            ";
                    if (($context["module_action"] != ($context["url_active"] ?? null))) {
                        // line 51
                        echo "                <li>
                  ";
                        // line 52
                        $this->loadTemplate("@Modules/ps_mbo/views/templates/admin/controllers/module_catalog/Includes/action_button.html.twig", "@Modules/ps_mbo/views/templates/admin/controllers/module_catalog/Includes/action_menu.html.twig", 52)->display(twig_array_merge($context, ["name" =>                         // line 53
($context["name"] ?? null), "classes" => "dropdown-item", "url" =>                         // line 55
$context["module_url"], "action" =>                         // line 56
$context["module_action"], "transDomain" =>                         // line 57
($context["transDomains"] ?? null)]));
                        // line 59
                        echo "                </li>
            ";
                    }
                    // line 61
                    echo "          ";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['length'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['module_action'], $context['module_url'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 62
                echo "        </div>
    ";
            }
            // line 64
            echo "  ";
        }
        // line 65
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "@Modules/ps_mbo/views/templates/admin/controllers/module_catalog/Includes/action_menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  130 => 65,  127 => 64,  123 => 62,  109 => 61,  105 => 59,  103 => 57,  102 => 56,  101 => 55,  100 => 53,  99 => 52,  96 => 51,  93 => 50,  76 => 49,  71 => 47,  65 => 43,  62 => 42,  60 => 40,  59 => 39,  58 => 38,  57 => 35,  55 => 34,  53 => 33,  48 => 31,  43 => 30,  41 => 29,  38 => 28,  36 => 25,  35 => 24,  34 => 23,  33 => 22,  32 => 21,  31 => 20,  30 => 19,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@Modules/ps_mbo/views/templates/admin/controllers/module_catalog/Includes/action_menu.html.twig", "/var/www/html/modules/ps_mbo/views/templates/admin/controllers/module_catalog/Includes/action_menu.html.twig");
    }
}
