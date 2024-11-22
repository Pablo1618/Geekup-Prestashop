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

/* @PrestaShop/Admin/Improve/Design/MailTheme/Blocks/list_mail_themes.html.twig */
class __TwigTemplate_f5ae1a24c4ed9a4ecfce68eefe18bad1cc199661cc7e695df387fe569e8d8d4a extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'generateMailsFormBlock' => [$this, 'block_generateMailsFormBlock'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 25
        echo "
";
        // line 26
        $this->displayBlock('generateMailsFormBlock', $context, $blocks);
    }

    public function block_generateMailsFormBlock($context, array $blocks = [])
    {
        // line 27
        echo "  <div class=\"row justify-content-center\">
    <div class=\"col-xl-12\">
      <div class=\"card\">
        <h3 class=\"card-header\">
          <i class=\"material-icons\">email</i> ";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Email themes", [], "Admin.Design.Feature"), "html", null, true);
        echo "
        </h3>

        <div class=\"card-block\">

            <table class=\"grid-table table\">
              <thead class=\"thead-default\">
                <tr class=\"column-headers\">
                  <th scope=\"col\">
                    ";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Name", [], "Admin.Global"), "html", null, true);
        echo "
                  </th>
                  <th scope=\"col\">
                    <div class=\"grid-actions-header-text\">
                      ";
        // line 44
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Actions", [], "Admin.Global"), "html", null, true);
        echo "
                    </div>
                  </th>
                </tr>
              </thead>
              <tbody>
                ";
        // line 50
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["mailThemes"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["theme"]) {
            // line 51
            echo "                  <tr>
                    <td class=\"data-type column-name\">
                      ";
            // line 53
            echo twig_escape_filter($this->env, $this->getAttribute($context["theme"], "name", []), "html", null, true);
            echo "
                    </td>
                    <td class=\"action-type\">
                      <div class=\"btn-group-action text-right\">
                        <a class=\"btn tooltip-link preview-link\" href=\"";
            // line 57
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_mail_theme_preview", ["theme" => $this->getAttribute($context["theme"], "name", [])]), "html", null, true);
            echo "\">
                          <i class=\"material-icons\">search</i>
                        </a>
                      </div>
                    </td>
                  </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['theme'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 64
        echo "              </tbody>
            </table>

        </div>
      </div>
    </div>
  </div>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Improve/Design/MailTheme/Blocks/list_mail_themes.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  102 => 64,  89 => 57,  82 => 53,  78 => 51,  74 => 50,  65 => 44,  58 => 40,  46 => 31,  40 => 27,  34 => 26,  31 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Improve/Design/MailTheme/Blocks/list_mail_themes.html.twig", "/var/www/html/src/PrestaShopBundle/Resources/views/Admin/Improve/Design/MailTheme/Blocks/list_mail_themes.html.twig");
    }
}
