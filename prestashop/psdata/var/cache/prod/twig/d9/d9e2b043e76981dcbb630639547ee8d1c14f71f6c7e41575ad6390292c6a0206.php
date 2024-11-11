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

/* @Modules/ps_linklist/views/templates/admin/link_block/form.html.twig */
class __TwigTemplate_a59fffb3748958def924120eaa674c7a664b725bfa4be2a9571da7f616fc7d8c extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'content' => [$this, 'block_content'],
            'link_block_form' => [$this, 'block_link_block_form'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 19
        return "@PrestaShop/Admin/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 21
        $this->env->getRuntime("Symfony\\Component\\Form\\FormRenderer")->setTheme(($context["linkBlockForm"] ?? null), [0 => "@Modules/ps_linklist/views/templates/admin/fields.html.twig"], true);
        // line 19
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/layout.html.twig", "@Modules/ps_linklist/views/templates/admin/link_block/form.html.twig", 19);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 23
    public function block_content($context, array $blocks = [])
    {
        // line 24
        echo "    ";
        if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["linkBlockForm"] ?? null), "vars", [], "any", false, true), "data", [], "any", false, true), "link_block", [], "any", false, true), "id_link_block", [], "any", true, true) &&  !(null === $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["linkBlockForm"] ?? null), "vars", []), "data", []), "link_block", []), "id_link_block", [])))) {
            // line 25
            echo "        ";
            $context["formAction"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("admin_link_block_edit_process", ["linkBlockId" => $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["linkBlockForm"] ?? null), "vars", []), "data", []), "link_block", []), "id_link_block", [])]);
            // line 26
            echo "    ";
        } else {
            // line 27
            echo "        ";
            $context["formAction"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("admin_link_block_create_process");
            // line 28
            echo "    ";
        }
        // line 29
        echo "    ";
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["linkBlockForm"] ?? null), 'form_start', ["action" => ($context["formAction"] ?? null), "attr" => ["class" => "form", "id" => "link_block_form"]]);
        echo "
    <div class=\"row justify-content-center\">
        ";
        // line 31
        $this->displayBlock('link_block_form', $context, $blocks);
        // line 73
        echo "    </div>
    ";
        // line 74
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["linkBlockForm"] ?? null), 'form_end');
        echo "
";
    }

    // line 31
    public function block_link_block_form($context, array $blocks = [])
    {
        // line 32
        echo "            <div class=\"col-xl-10\">
                <div class=\"card\">
                    <h3 class=\"card-header\">
                        <i class=\"material-icons\">mode_edit</i>
                        ";
        // line 36
        if ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["linkBlockForm"] ?? null), "vars", [], "any", false, true), "data", [], "any", false, true), "link_block", [], "any", false, true), "id_link_block", [], "any", true, true)) {
            // line 37
            echo "                            ";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Edit the link block.", [], "Modules.Linklist.Admin"), "html", null, true);
            echo "
                        ";
        } else {
            // line 39
            echo "                        ";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("New link block", [], "Modules.Linklist.Admin"), "html", null, true);
            echo "
                        ";
        }
        // line 41
        echo "                    </h3>
                    <div class=\"card-block row\">
                        <div class=\"card-text m-auto w-75\">
                            ";
        // line 44
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["linkBlockForm"] ?? null), "link_block", []), "block_name", []), 'row');
        echo "
                            ";
        // line 45
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["linkBlockForm"] ?? null), "link_block", []), "id_hook", []), 'row');
        echo "
                            ";
        // line 46
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["linkBlockForm"] ?? null), "link_block", []), "cms", []), 'row');
        echo "
                            ";
        // line 47
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["linkBlockForm"] ?? null), "link_block", []), "product", []), 'row');
        echo "
                            ";
        // line 48
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["linkBlockForm"] ?? null), "link_block", []), "category", []), 'row');
        echo "
                            ";
        // line 49
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["linkBlockForm"] ?? null), "link_block", []), "static", []), 'row');
        echo "
                            ";
        // line 50
        if ($this->getAttribute($this->getAttribute(($context["linkBlockForm"] ?? null), "link_block", [], "any", false, true), "shop_association", [], "any", true, true)) {
            // line 51
            echo "                                ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["linkBlockForm"] ?? null), "link_block", []), "shop_association", []), 'row');
            echo "
                            ";
        }
        // line 53
        echo "                            <div class=\"form-group\">
                                ";
        // line 54
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["linkBlockForm"] ?? null), "link_block", []), "custom", []), 'row');
        echo "
                                <div class=\"d-flex justify-content-end\">
                                    <button data-collection-id=\"";
        // line 56
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["linkBlockForm"] ?? null), "link_block", []), "custom", []), "vars", []), "id", []), "html", null, true);
        echo "\" class=\"btn btn-primary add-collection-btn\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Add", [], "Admin.Actions"), "html", null, true);
        echo "</button>
                                </div>
                            </div>
                            ";
        // line 59
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["linkBlockForm"] ?? null), "link_block", []), 'rest');
        echo "
                            ";
        // line 60
        $this->getAttribute($this->getAttribute(($context["linkBlockForm"] ?? null), "link_block", []), "setRendered", []);
        // line 61
        echo "                            ";
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["linkBlockForm"] ?? null), 'rest');
        echo "
                        </div>
                    </div>
                    <div class=\"card-footer\">
                        <div class=\"d-flex justify-content-between\">
                            <a href=\"";
        // line 66
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("admin_link_block_list");
        echo "\" class=\"btn btn-secondary\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Cancel", [], "Admin.Actions"), "html", null, true);
        echo "</a>
                            <button class=\"btn btn-primary\">";
        // line 67
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Save", [], "Admin.Actions"), "html", null, true);
        echo "</button>
                        </div>
                    </div>
                </div>
            </div>
        ";
    }

    // line 77
    public function block_javascripts($context, array $blocks = [])
    {
        // line 78
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

    <script src=\"";
        // line 80
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("../modules/ps_linklist/views/public/form.bundle.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "@Modules/ps_linklist/views/templates/admin/link_block/form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  195 => 80,  189 => 78,  186 => 77,  176 => 67,  170 => 66,  161 => 61,  159 => 60,  155 => 59,  147 => 56,  142 => 54,  139 => 53,  133 => 51,  131 => 50,  127 => 49,  123 => 48,  119 => 47,  115 => 46,  111 => 45,  107 => 44,  102 => 41,  96 => 39,  90 => 37,  88 => 36,  82 => 32,  79 => 31,  73 => 74,  70 => 73,  68 => 31,  62 => 29,  59 => 28,  56 => 27,  53 => 26,  50 => 25,  47 => 24,  44 => 23,  39 => 19,  37 => 21,  31 => 19,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@Modules/ps_linklist/views/templates/admin/link_block/form.html.twig", "/var/www/html/modules/ps_linklist/views/templates/admin/link_block/form.html.twig");
    }
}
