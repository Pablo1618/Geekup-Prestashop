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

/* @PrestaShop/Admin/Sell/Catalog/Categories/Blocks/form.html.twig */
class __TwigTemplate_f28f34e9a136c52b666f2ef930fc11c108d4801017f7849960c3fed415d038bc extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'category_form_block' => [$this, 'block_category_form_block'],
            'category_tool_serp' => [$this, 'block_category_tool_serp'],
            'category_form_rest' => [$this, 'block_category_form_rest'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 25
        echo "
";
        // line 26
        $context["ps"] = $this->loadTemplate("PrestaShopBundle:Admin:macros.html.twig", "@PrestaShop/Admin/Sell/Catalog/Categories/Blocks/form.html.twig", 26)->unwrap();
        // line 27
        echo "
";
        // line 28
        $this->displayBlock('category_form_block', $context, $blocks);
    }

    public function block_category_form_block($context, array $blocks = [])
    {
        // line 29
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["categoryForm"] ?? null), 'form_start');
        echo "
<div class=\"card\">
  <h3 class=\"card-header\">
    ";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Category", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "
  </h3>
  <div class=\"card-block row\">
    <div class=\"card-text\">
      ";
        // line 36
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["categoryForm"] ?? null), 'errors');
        echo "

      ";
        // line 38
        echo $context["ps"]->getform_group_row($this->getAttribute(($context["categoryForm"] ?? null), "name", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Name", [], "Admin.Global"), "help" => ($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Invalid characters:", [], "Admin.Notifications.Info") . " <>;=#{}")]);
        // line 41
        echo "

      <div class=\"form-group row\">
        ";
        // line 44
        echo $context["ps"]->getlabel_with_help($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Displayed", [], "Admin.Global"), $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Click on \"%displayed_label%\" to index the category on your shop.", ["%displayed_label%" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Displayed", [], "Admin.Global")], "Admin.Catalog.Help"));
        echo "
        <div class=\"col-sm\">
          ";
        // line 46
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["categoryForm"] ?? null), "active", []), 'widget');
        echo "
          <small class=\"form-text\">
            ";
        // line 48
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("If you want a category to appear in the menu of your shop, go to [1]Modules > Module Manager[/1] and configure your menu module.", ["[1]" => (("<a href=\"" . $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_module_manage")) . "\" target=\"_blank\" rel=\"noopener noreferrer nofollow\">"), "[/1]" => "</a>"], "Admin.Catalog.Help");
        // line 51
        echo "
          </small>
        </div>
      </div>

      ";
        // line 56
        if ($this->getAttribute(($context["categoryForm"] ?? null), "id_parent", [], "any", true, true)) {
            // line 57
            echo "      <div class=\"form-group row\">
        <label class=\"form-control-label\">
          ";
            // line 59
            if ($this->getAttribute($this->getAttribute(($context["categoryForm"] ?? null), "vars", []), "required", [])) {
                // line 60
                echo "            <span class=\"text-danger\">*</span>
          ";
            }
            // line 62
            echo "
          ";
            // line 63
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Parent category", [], "Admin.Catalog.Feature"), "html", null, true);
            echo "
        </label>
        <div class=\"col-sm\">
          ";
            // line 66
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["categoryForm"] ?? null), "id_parent", []), 'widget');
            echo "
        </div>
      </div>
      ";
        }
        // line 70
        echo "
      ";
        // line 71
        echo $context["ps"]->getform_group_row($this->getAttribute(($context["categoryForm"] ?? null), "description", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Description", [], "Admin.Global"), "help" => ($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Invalid characters:", [], "Admin.Notifications.Info") . " <>;=#{}")]);
        // line 74
        echo "

      <div class=\"form-group row\">
        <label class=\"form-control-label\">
          ";
        // line 78
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Category cover image", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "
        </label>
        <div class=\"col-sm\">
          ";
        // line 81
        $this->loadTemplate("@PrestaShop/Admin/Sell/Catalog/Categories/Blocks/cover_image.html.twig", "@PrestaShop/Admin/Sell/Catalog/Categories/Blocks/form.html.twig", 81)->display($context);
        // line 82
        echo "
          ";
        // line 83
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["categoryForm"] ?? null), "cover_image", []), 'widget');
        echo "

          <small class=\"form-text\">
            ";
        // line 86
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("This is the main image for your category, displayed in the category page. The category description will overlap this image and appear in its top-left corner.", [], "Admin.Catalog.Help"), "html", null, true);
        echo "
          </small>
        </div>
      </div>

      <div class=\"form-group row\">
        <label class=\"form-control-label\">
          ";
        // line 93
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Category thumbnail", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "
        </label>
        <div class=\"col-sm\">
          ";
        // line 96
        $this->loadTemplate("@PrestaShop/Admin/Sell/Catalog/Categories/Blocks/thumbnail_image.html.twig", "@PrestaShop/Admin/Sell/Catalog/Categories/Blocks/form.html.twig", 96)->display($context);
        // line 97
        echo "
          ";
        // line 98
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["categoryForm"] ?? null), "thumbnail_image", []), 'widget');
        echo "

          <small class=\"form-text\">
            ";
        // line 101
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Displays a small image in the parent category's page, if the theme allows it.", [], "Admin.Catalog.Help"), "html", null, true);
        echo "
          </small>
        </div>
      </div>

      <div class=\"form-group row\">
        <label class=\"form-control-label\">
          ";
        // line 108
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Menu thumbnails", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "
        </label>
        <div class=\"col-sm\">
          ";
        // line 111
        $this->loadTemplate("@PrestaShop/Admin/Sell/Catalog/Categories/Blocks/menu_thumbnail_images.html.twig", "@PrestaShop/Admin/Sell/Catalog/Categories/Blocks/form.html.twig", 111)->display($context);
        // line 112
        echo "
          ";
        // line 113
        if (($context["allowMenuThumbnailsUpload"] ?? null)) {
            // line 114
            echo "            ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["categoryForm"] ?? null), "menu_thumbnail_images", []), 'widget');
            echo "
          ";
        } else {
            // line 116
            echo "            ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["categoryForm"] ?? null), "menu_thumbnail_images", []), 'widget', ["attr" => ["class" => "d-none"]]);
            echo "

            <div class=\"alert alert-warning\" role=\"alert\">
              <p class=\"alert-text\">
                ";
            // line 120
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("You have reached the limit (%s) of files to upload, please remove files to continue uploading", ["%s" => ($context["maxMenuThumbnails"] ?? null)], "Admin.Catalog.Notification"), "html", null, true);
            echo "
              </p>
            </div>
          ";
        }
        // line 124
        echo "          <small class=\"form-text\">
            ";
        // line 125
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("The category thumbnail appears in the menu as a small image representing the category, if the theme allows it.", [], "Admin.Catalog.Help"), "html", null, true);
        echo "
          </small>
        </div>
      </div>

      ";
        // line 130
        echo $this->env->getExtension('PrestaShopBundle\Twig\HookExtension')->renderHook("displayBackOfficeCategory");
        echo "

      ";
        // line 132
        $this->displayBlock('category_tool_serp', $context, $blocks);
        // line 143
        echo "
      <div class=\"form-group row\">
        ";
        // line 145
        echo $context["ps"]->getlabel_with_help($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Meta title", [], "Admin.Global"), ($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Invalid characters:", [], "Admin.Notifications.Info") . " <>;=#{}"));
        echo "
        <div class=\"col-sm\">
          ";
        // line 147
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["categoryForm"] ?? null), "meta_title", []), 'widget');
        echo "
        </div>
      </div>

      <div class=\"form-group row\">
        ";
        // line 152
        echo $context["ps"]->getlabel_with_help($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Meta description", [], "Admin.Global"), ($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Invalid characters:", [], "Admin.Notifications.Info") . " <>;=#{}"));
        echo "
        <div class=\"col-sm\">
          ";
        // line 154
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["categoryForm"] ?? null), "meta_description", []), 'widget');
        echo "
        </div>
      </div>

      ";
        // line 158
        ob_start(function () { return ''; });
        // line 159
        echo "        ";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("To add tags, click in the field, write something, and then press the \"Enter\" key.", [], "Admin.Shopparameters.Help"), "html", null, true);
        echo "
        ";
        // line 160
        echo twig_escape_filter($this->env, ($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Invalid characters:", [], "Admin.Notifications.Info") . " <>;=#{}"), "html", null, true);
        echo "
      ";
        $context["metaKeywordHelp"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 162
        echo "
      ";
        // line 163
        echo $context["ps"]->getform_group_row($this->getAttribute(($context["categoryForm"] ?? null), "meta_keyword", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Meta keywords", [], "Admin.Global"), "help" =>         // line 165
($context["metaKeywordHelp"] ?? null)]);
        // line 166
        echo "

      ";
        // line 168
        echo $context["ps"]->getform_group_row($this->getAttribute(($context["categoryForm"] ?? null), "link_rewrite", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Friendly URL", [], "Admin.Global"), "help" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Only letters, numbers, underscore (_) and the minus (-) character are allowed.", [], "Admin.Catalog.Help")]);
        // line 171
        echo "

      ";
        // line 173
        echo $context["ps"]->getform_group_row($this->getAttribute(($context["categoryForm"] ?? null), "group_association", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Group access", [], "Admin.Catalog.Feature"), "help" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Mark all of the customer groups which you would like to have access to this category.", [], "Admin.Catalog.Help")]);
        // line 176
        echo "

      <div class=\"form-group row\">
        <label class=\"form-control-label\"></label>
        <div class=\"col-sm\">
          <div class=\"alert alert-info\">
            <p class=\"mb-1\">
              <strong>";
        // line 183
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("You now have three default customer groups.", [], "Admin.Catalog.Help"), "html", null, true);
        echo "</strong>
            </p>

            <p>";
        // line 186
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("%group_name% - All people without a valid customer account.", ["%group_name%" => (("<strong>" . $this->getAttribute($this->getAttribute(($context["defaultGroups"] ?? null), "visitorsGroup", []), "name", [])) . "</strong>")], "Admin.Catalog.Feature");
        echo "</p>
            <p>";
        // line 187
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("%group_name% - Customer who placed an order with the guest checkout.", ["%group_name%" => (("<strong>" . $this->getAttribute($this->getAttribute(($context["defaultGroups"] ?? null), "guestsGroup", []), "name", [])) . "</strong>")], "Admin.Catalog.Feature");
        echo "</p>
            <p>";
        // line 188
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("%group_name% - All people who have created an account on this site.", ["%group_name%" => (("<strong>" . $this->getAttribute($this->getAttribute(($context["defaultGroups"] ?? null), "customersGroup", []), "name", [])) . "</strong>")], "Admin.Catalog.Feature");
        echo "</p>
          </div>
        </div>
      </div>

      ";
        // line 193
        if ($this->getAttribute(($context["categoryForm"] ?? null), "shop_association", [], "any", true, true)) {
            // line 194
            echo "        <div class=\"form-group row\">
          <label class=\"form-control-label\">
            ";
            // line 196
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Shop association", [], "Admin.Global"), "html", null, true);
            echo "
          </label>
          <div class=\"col-sm\">
            ";
            // line 199
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["categoryForm"] ?? null), "shop_association", []), 'widget');
            echo "
          </div>
        </div>
      ";
        }
        // line 203
        echo "
      ";
        // line 204
        $this->displayBlock('category_form_rest', $context, $blocks);
        // line 207
        echo "    </div>
  </div>
  <div class=\"card-footer\">
    <a href=\"";
        // line 210
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_categories_index");
        echo "\" class=\"btn btn-outline-secondary\">
      ";
        // line 211
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Cancel", [], "Admin.Actions"), "html", null, true);
        echo "
    </a>
    <button class=\"btn btn-primary float-right\" id=\"save-button\">";
        // line 213
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Save", [], "Admin.Actions"), "html", null, true);
        echo "</button>
  </div>
</div>
";
        // line 216
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["categoryForm"] ?? null), 'form_end');
        echo "
";
    }

    // line 132
    public function block_category_tool_serp($context, array $blocks = [])
    {
        // line 133
        echo "        <div class=\"form-group row\">
          <label class=\"form-control-label\">";
        // line 134
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("SEO preview", [], "Admin.Global"), "html", null, true);
        echo "</label>
          <div class=\"col-sm\">
            <div id=\"serp-app\" data-category-url=\"";
        // line 136
        echo twig_escape_filter($this->env, ($context["categoryUrl"] ?? null), "html", null, true);
        echo "\"></div>
            <small class=\"form-text\">
              ";
        // line 138
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Here is a preview of how your page will appear in search engine results.", [], "Admin.Global"), "html", null, true);
        echo "
            </small>
          </div>
        </div>
      ";
    }

    // line 204
    public function block_category_form_rest($context, array $blocks = [])
    {
        // line 205
        echo "        ";
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["categoryForm"] ?? null), 'rest');
        echo "
      ";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Catalog/Categories/Blocks/form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  404 => 205,  401 => 204,  392 => 138,  387 => 136,  382 => 134,  379 => 133,  376 => 132,  370 => 216,  364 => 213,  359 => 211,  355 => 210,  350 => 207,  348 => 204,  345 => 203,  338 => 199,  332 => 196,  328 => 194,  326 => 193,  318 => 188,  314 => 187,  310 => 186,  304 => 183,  295 => 176,  293 => 173,  289 => 171,  287 => 168,  283 => 166,  281 => 165,  280 => 163,  277 => 162,  272 => 160,  267 => 159,  265 => 158,  258 => 154,  253 => 152,  245 => 147,  240 => 145,  236 => 143,  234 => 132,  229 => 130,  221 => 125,  218 => 124,  211 => 120,  203 => 116,  197 => 114,  195 => 113,  192 => 112,  190 => 111,  184 => 108,  174 => 101,  168 => 98,  165 => 97,  163 => 96,  157 => 93,  147 => 86,  141 => 83,  138 => 82,  136 => 81,  130 => 78,  124 => 74,  122 => 71,  119 => 70,  112 => 66,  106 => 63,  103 => 62,  99 => 60,  97 => 59,  93 => 57,  91 => 56,  84 => 51,  82 => 48,  77 => 46,  72 => 44,  67 => 41,  65 => 38,  60 => 36,  53 => 32,  47 => 29,  41 => 28,  38 => 27,  36 => 26,  33 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Catalog/Categories/Blocks/form.html.twig", "/var/www/html/src/PrestaShopBundle/Resources/views/Admin/Sell/Catalog/Categories/Blocks/form.html.twig");
    }
}
