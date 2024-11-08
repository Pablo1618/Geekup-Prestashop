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

/* @PrestaShop/Admin/Improve/International/Language/index.html.twig */
class __TwigTemplate_fd4720c80daecab83472047b5215bbbdd361a1cb15a791a7a89c95ef821a7bd3 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'content' => [$this, 'block_content'],
            'language_listing' => [$this, 'block_language_listing'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 36
        return "@PrestaShop/Admin/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 26
        $context["layoutHeaderToolbarBtn"] = ["add" => ["href" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_languages_create"), "desc" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Add new language", [], "Admin.International.Feature"), "icon" => "add_circle_outline"]];
        // line 33
        $context["layoutTitle"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Languages", [], "Admin.Global");
        // line 34
        $context["enableSidebar"] = true;
        // line 36
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/layout.html.twig", "@PrestaShop/Admin/Improve/International/Language/index.html.twig", 36);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 38
    public function block_content($context, array $blocks = [])
    {
        // line 39
        echo "  ";
        if (($context["multistoreIsUsed"] ?? null)) {
            echo twig_escape_filter($this->env, $this->getAttribute(($context["ps"] ?? null), "infotip", [0 => ($context["multistoreInfoTip"] ?? null), 1 => true], "method"), "html", null, true);
        }
        // line 40
        echo "  <div class=\"row\">
    <div class=\"col\">
      <div class=\"alert alert-warning\" role=\"alert\">
        <p class=\"alert-text\">";
        // line 43
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("When you delete a language, all related translations in the database will be deleted.", [], "Admin.International.Notification"), "html", null, true);
        echo "</p>
      </div>

      ";
        // line 46
        if ( !($context["isHtaccessFileWriter"] ?? null)) {
            // line 47
            echo "        <div class=\"alert alert-info\" role=\"alert\">
          <p class=\"alert-text\">";
            // line 48
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Your .htaccess file must be writable.", [], "Admin.International.Notification"), "html", null, true);
            echo "</p>
        </div>
      ";
        }
        // line 51
        echo "    </div>
  </div>

  ";
        // line 54
        $this->displayBlock('language_listing', $context, $blocks);
    }

    public function block_language_listing($context, array $blocks = [])
    {
        // line 55
        echo "    <div class=\"row\">
      <div class=\"col-sm\">
        ";
        // line 57
        $this->loadTemplate("@PrestaShop/Admin/Common/Grid/grid_panel.html.twig", "@PrestaShop/Admin/Improve/International/Language/index.html.twig", 57)->display(twig_array_merge($context, ["grid" => ($context["languageGrid"] ?? null)]));
        // line 58
        echo "      </div>
    </div>
  ";
    }

    // line 63
    public function block_javascripts($context, array $blocks = [])
    {
        // line 64
        echo "  ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

  <script src=\"";
        // line 66
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/new-theme/public/language.bundle.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 67
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/default/js/bundle/pagination.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Improve/International/Language/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  114 => 67,  110 => 66,  104 => 64,  101 => 63,  95 => 58,  93 => 57,  89 => 55,  83 => 54,  78 => 51,  72 => 48,  69 => 47,  67 => 46,  61 => 43,  56 => 40,  51 => 39,  48 => 38,  43 => 36,  41 => 34,  39 => 33,  37 => 26,  31 => 36,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Improve/International/Language/index.html.twig", "/var/www/html/src/PrestaShopBundle/Resources/views/Admin/Improve/International/Language/index.html.twig");
    }
}
