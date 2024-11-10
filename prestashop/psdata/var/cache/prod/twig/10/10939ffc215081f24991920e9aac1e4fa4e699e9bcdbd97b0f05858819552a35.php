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

/* @Modules/ps_linklist/views/templates/admin/fields.html.twig */
class __TwigTemplate_6808beb8d250884c17e10b0a4bcc7c7989e6b1d98c3286d6578f46d239b8d5b6 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'choice_widget_expanded' => [$this, 'block_choice_widget_expanded'],
            'checkbox_widget' => [$this, 'block_checkbox_widget'],
            'form_row' => [$this, 'block_form_row'],
            'form_row_class' => [$this, 'block_form_row_class'],
            'unlabeled_form_group_class' => [$this, 'block_unlabeled_form_group_class'],
            'custom_url_widget' => [$this, 'block_custom_url_widget'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 20
        $this->displayBlock('choice_widget_expanded', $context, $blocks);
        // line 47
        $this->displayBlock('checkbox_widget', $context, $blocks);
        // line 66
        echo "
";
        // line 67
        $this->displayBlock('form_row', $context, $blocks);
        // line 83
        echo "
";
        // line 84
        $this->displayBlock('form_row_class', $context, $blocks);
        // line 87
        echo "
";
        // line 88
        $this->displayBlock('unlabeled_form_group_class', $context, $blocks);
        // line 92
        $this->displayBlock('custom_url_widget', $context, $blocks);
    }

    // line 20
    public function block_choice_widget_expanded($context, array $blocks = [])
    {
        // line 21
        echo "<div ";
        $this->displayBlock("widget_container_attributes", $context, $blocks);
        echo ">
        ";
        // line 22
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", []), "choices", []));
        foreach ($context['_seq'] as $context["name"] => $context["choices"]) {
            // line 23
            echo "            ";
            if (twig_test_iterable($context["choices"])) {
                // line 24
                echo "
                <label class=\"choice_category\">
                    <strong>
                        ";
                // line 27
                echo twig_escape_filter($this->env, (((($context["choice_translation_domain"] ?? null) === false)) ? ($context["name"]) : ($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans($context["name"], [], ($context["choice_translation_domain"] ?? null)))), "html", null, true);
                echo "
                    </strong>
                </label>
                <div>
                    ";
                // line 31
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["choices"]);
                foreach ($context['_seq'] as $context["key"] => $context["choice"]) {
                    // line 32
                    echo "                        ";
                    echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), $context["key"], [], "array"), 'widget');
                    echo "
                        ";
                    // line 33
                    echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), $context["key"], [], "array"), 'label');
                    echo "
                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['choice'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 35
                echo "                </div>

            ";
            } else {
                // line 39
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), $context["name"], [], "array"), 'widget');
                // line 40
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), $context["name"], [], "array"), 'label', ["translation_domain" => ($context["choice_translation_domain"] ?? null)]);
            }
            // line 43
            echo "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['name'], $context['choices'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 44
        echo "    </div>";
    }

    // line 47
    public function block_checkbox_widget($context, array $blocks = [])
    {
        // line 48
        $context["parent_label_class"] = ((array_key_exists("parent_label_class", $context)) ? (_twig_default_filter(($context["parent_label_class"] ?? null), "")) : (""));
        // line 49
        $context["switch"] = ((array_key_exists("switch", $context)) ? (_twig_default_filter(($context["switch"] ?? null), "")) : (""));
        // line 50
        ob_start(function () { return ''; });
        // line 51
        echo "        <input type=\"checkbox\" class=\"js-bulk-action-checkbox\"
               ";
        // line 52
        if (($context["switch"] ?? null)) {
            echo "data-toggle=\"switch\"";
        }
        echo " ";
        if (($context["switch"] ?? null)) {
            echo "class=\"";
            echo twig_escape_filter($this->env, ($context["switch"] ?? null), "html", null, true);
            echo "\"";
        }
        echo " ";
        $this->displayBlock("widget_attributes", $context, $blocks);
        if (array_key_exists("value", $context)) {
            echo " value=\"";
            echo twig_escape_filter($this->env, ($context["value"] ?? null), "html", null, true);
            echo "\"";
        }
        if (($context["checked"] ?? null)) {
            echo " checked=\"checked\"";
        }
        echo " />
        <i class=\"md-checkbox-control\"></i>
    ";
        $context["checkbox_input"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 55
        echo "
    ";
        // line 56
        if (twig_in_filter("checkbox-inline", ($context["parent_label_class"] ?? null))) {
            // line 57
            echo "        <div class=\"md-checkbox md-checkbox-inline\">";
            // line 58
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'label', ["widget" => ($context["checkbox_input"] ?? null)]);
            // line 59
            echo "</div>
    ";
        } else {
            // line 61
            echo "<div class=\"md-checkbox my-1\">";
            // line 62
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'label', ["widget" => ($context["checkbox_input"] ?? null)]);
            // line 63
            echo "</div>";
        }
    }

    // line 67
    public function block_form_row($context, array $blocks = [])
    {
        // line 68
        ob_start(function () { return ''; });
        // line 69
        echo "        <div class=\"";
        $this->displayBlock("form_row_class", $context, $blocks);
        echo " ";
        if ((( !($context["compound"] ?? null) || ((array_key_exists("force_error", $context)) ? (_twig_default_filter(($context["force_error"] ?? null), false)) : (false))) &&  !($context["valid"] ?? null))) {
            echo " has-error";
        }
        echo "\">
            ";
        // line 70
        if ( !($this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", []), "label", []) === false)) {
            // line 71
            echo "                ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'label');
            echo "
                ";
            // line 72
            $context["formGroupClasses"] =             $this->renderBlock("form_group_class", $context, $blocks);
            // line 73
            echo "            ";
        } else {
            // line 74
            echo "                ";
            $context["formGroupClasses"] =             $this->renderBlock("unlabeled_form_group_class", $context, $blocks);
            // line 75
            echo "            ";
        }
        // line 76
        echo "            <div class=\"";
        echo twig_escape_filter($this->env, ($context["formGroupClasses"] ?? null), "html", null, true);
        echo "\">
                ";
        // line 77
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'widget');
        echo "
                ";
        // line 78
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'errors');
        echo "
            </div>
        </div>
    ";
        $___internal_5527f76d1348469e7e806c0494dbd08faea70b36c56237edc632c5563e39f8f9_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 68
        echo twig_spaceless($___internal_5527f76d1348469e7e806c0494dbd08faea70b36c56237edc632c5563e39f8f9_);
    }

    // line 84
    public function block_form_row_class($context, array $blocks = [])
    {
        // line 85
        echo "form-group row";
    }

    // line 88
    public function block_unlabeled_form_group_class($context, array $blocks = [])
    {
        // line 89
        echo "col-sm-12";
    }

    // line 92
    public function block_custom_url_widget($context, array $blocks = [])
    {
        // line 93
        echo "<div class=\"form-control ";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["attr"] ?? null), "class", []), "html", null, true);
        echo "\">
        ";
        // line 94
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "title", []), 'row');
        echo "
        ";
        // line 95
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "url", []), 'row');
        echo "
    </div>";
    }

    public function getTemplateName()
    {
        return "@Modules/ps_linklist/views/templates/admin/fields.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  259 => 95,  255 => 94,  250 => 93,  247 => 92,  243 => 89,  240 => 88,  236 => 85,  233 => 84,  229 => 68,  222 => 78,  218 => 77,  213 => 76,  210 => 75,  207 => 74,  204 => 73,  202 => 72,  197 => 71,  195 => 70,  186 => 69,  184 => 68,  181 => 67,  176 => 63,  174 => 62,  172 => 61,  168 => 59,  166 => 58,  164 => 57,  162 => 56,  159 => 55,  135 => 52,  132 => 51,  130 => 50,  128 => 49,  126 => 48,  123 => 47,  119 => 44,  113 => 43,  110 => 40,  108 => 39,  103 => 35,  95 => 33,  90 => 32,  86 => 31,  79 => 27,  74 => 24,  71 => 23,  67 => 22,  62 => 21,  59 => 20,  55 => 92,  53 => 88,  50 => 87,  48 => 84,  45 => 83,  43 => 67,  40 => 66,  38 => 47,  36 => 20,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@Modules/ps_linklist/views/templates/admin/fields.html.twig", "/var/www/html/modules/ps_linklist/views/templates/admin/fields.html.twig");
    }
}
