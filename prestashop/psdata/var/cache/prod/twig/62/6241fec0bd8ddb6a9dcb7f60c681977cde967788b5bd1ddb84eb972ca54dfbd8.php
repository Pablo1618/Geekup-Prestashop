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

/* @PrestaShop/Admin/Sell/Catalog/Categories/Blocks/menu_thumbnail_images.html.twig */
class __TwigTemplate_fdb4c42638404cbc7b5772cac94938119096d25e82d352d970a2ce6f2ed768c7 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'category_menu_thumbnails' => [$this, 'block_category_menu_thumbnails'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 25
        echo "
";
        // line 26
        $this->displayBlock('category_menu_thumbnails', $context, $blocks);
    }

    public function block_category_menu_thumbnails($context, array $blocks = [])
    {
        // line 27
        echo "  ";
        if ((array_key_exists("menuThumbnailImages", $context) &&  !twig_test_empty(($context["menuThumbnailImages"] ?? null)))) {
            // line 28
            echo "    <div>
      ";
            // line 29
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["menuThumbnailImages"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["menuThumbnail"]) {
                // line 30
                echo "        <figure class=\"figure\">
          <img src=\"";
                // line 31
                echo twig_escape_filter($this->env, $this->getAttribute($context["menuThumbnail"], "path", []), "html", null, true);
                echo "\" class=\"figure-img img-fluid img-thumbnail\">
          <figcaption class=\"figure-caption\">
            <button class=\"btn btn-outline-danger btn-sm js-form-submit-btn\"
                    data-form-submit-url=\"";
                // line 34
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_categories_delete_menu_thumbnail", ["categoryId" => $this->getAttribute($this->getAttribute(($context["editableCategory"] ?? null), "id", []), "value", []), "menuThumbnailId" => $this->getAttribute($context["menuThumbnail"], "id", [])]), "html", null, true);
                echo "\"
                    data-form-csrf-token=\"";
                // line 35
                echo twig_escape_filter($this->env, $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken("delete-menu-thumbnail"), "html", null, true);
                echo "\"
            >
              <i class=\"material-icons\">
                delete_forever
              </i>
              ";
                // line 40
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Delete", [], "Admin.Actions"), "html", null, true);
                echo "
            </button>
          </figcaption>
        </figure>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['menuThumbnail'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 45
            echo "    </div>
  ";
        }
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Catalog/Categories/Blocks/menu_thumbnail_images.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  82 => 45,  71 => 40,  63 => 35,  59 => 34,  53 => 31,  50 => 30,  46 => 29,  43 => 28,  40 => 27,  34 => 26,  31 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Catalog/Categories/Blocks/menu_thumbnail_images.html.twig", "/var/www/html/src/PrestaShopBundle/Resources/views/Admin/Sell/Catalog/Categories/Blocks/menu_thumbnail_images.html.twig");
    }
}
