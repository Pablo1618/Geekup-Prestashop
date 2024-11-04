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

/* @PrestaShop/Admin/Sell/Catalog/Categories/Blocks/cover_image.html.twig */
class __TwigTemplate_ef8ba1b5426802e1b9692a72bc5f97ab8287ae8aa880f518d1352d728f07247d extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'category_cover_image' => [$this, 'block_category_cover_image'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 25
        echo "
";
        // line 26
        $this->displayBlock('category_cover_image', $context, $blocks);
    }

    public function block_category_cover_image($context, array $blocks = [])
    {
        // line 27
        echo "  ";
        if ((array_key_exists("coverImage", $context) &&  !(null === ($context["coverImage"] ?? null)))) {
            // line 28
            echo "    <div>
      <form action=\"\">
        <figure class=\"figure\">
          <img src=\"";
            // line 31
            echo twig_escape_filter($this->env, $this->getAttribute(($context["coverImage"] ?? null), "path", []), "html", null, true);
            echo "\" class=\"figure-img img-fluid img-thumbnail\">
          <figcaption class=\"figure-caption\">
            <p>";
            // line 33
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("File size", [], "Admin.Advparameters.Feature"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["coverImage"] ?? null), "size", []), "html", null, true);
            echo "</p>
            <button class=\"btn btn-outline-danger btn-sm js-form-submit-btn\"
                    data-form-submit-url=\"";
            // line 35
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_categories_delete_cover_image", ["categoryId" => $this->getAttribute($this->getAttribute(($context["app"] ?? null), "request", []), "get", [0 => "categoryId"], "method")]), "html", null, true);
            echo "\"
                    data-form-csrf-token=\"";
            // line 36
            echo twig_escape_filter($this->env, $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken("delete-cover-image"), "html", null, true);
            echo "\"
                    type=\"button\"
            >
              <i class=\"material-icons\">
                delete_forever
              </i>
              ";
            // line 42
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Delete", [], "Admin.Actions"), "html", null, true);
            echo "
            </button>
          </figcaption>
        </figure>
      </form>
    </div>
  ";
        }
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Catalog/Categories/Blocks/cover_image.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  73 => 42,  64 => 36,  60 => 35,  53 => 33,  48 => 31,  43 => 28,  40 => 27,  34 => 26,  31 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Catalog/Categories/Blocks/cover_image.html.twig", "/var/www/html/src/PrestaShopBundle/Resources/views/Admin/Sell/Catalog/Categories/Blocks/cover_image.html.twig");
    }
}
