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

/* @PrestaShop/Admin/Common/Grid/Blocks/EmptyState/attachment.html.twig */
class __TwigTemplate_366d8be943e9b46278d1d5f9058e32600e890be37ebd714e7ab7d4f971b0673a extends \Twig\Template
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
<div class=\"text-center showcase-list-card\">
  <img class=\"img-responsive mt-3 img-rtl\" src=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/new-theme/img/empty_state/attachment.png"), "html", null, true);
        echo "\">

  <p class=\"mt-4 showcase-list-card__header\">";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Upload files here", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</p>

  <p class=\"mx-auto showcase-list-card__message\">
    ";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Make some files available to your customers and facilitate their purchasing environment by adding them just here! It can be instruction manuals, technical works or anything you want to attach to a product.", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "
  </p>

  <div class=\"mt-4\">
    <a href=\"";
        // line 36
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('documentation_link')->getCallable(), ["attachment"]), "html", null, true);
        echo "\" target=\"_blank\" class=\"btn btn-outline-secondary mr-1\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Learn more", [], "Admin.Actions"), "html", null, true);
        echo "</a>
    <a href=\"";
        // line 37
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_attachments_create");
        echo "\" class=\"btn btn-primary ml-1\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Add new file", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</a>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Common/Grid/Blocks/EmptyState/attachment.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 37,  52 => 36,  45 => 32,  39 => 29,  34 => 27,  30 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Common/Grid/Blocks/EmptyState/attachment.html.twig", "/var/www/html/src/PrestaShopBundle/Resources/views/Admin/Common/Grid/Blocks/EmptyState/attachment.html.twig");
    }
}
