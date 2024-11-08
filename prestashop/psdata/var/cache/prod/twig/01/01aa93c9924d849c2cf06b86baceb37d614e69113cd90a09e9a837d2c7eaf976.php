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

/* @PrestaShop/Admin/Improve/Design/positions.html.twig */
class __TwigTemplate_a7004c0ebea15c0427a85aca59786b602f145e61c043618dc0e4185bbb3aac03 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'content' => [$this, 'block_content'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 25
        return "@PrestaShop/Admin/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/layout.html.twig", "@PrestaShop/Admin/Improve/Design/positions.html.twig", 25);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 28
    public function block_content($context, array $blocks = [])
    {
        // line 29
        echo "  <div class=\"row m-0\">
    ";
        // line 30
        if ( !($context["canMove"] ?? null)) {
            // line 31
            echo "      <p class=\"alert alert-warning alert-can-move\">
        ";
            // line 32
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("If you want to order/move the following data, please select a shop from the shop list.", [], "Admin.Design.Notification"), "html", null, true);
            echo "
      </p>
    ";
        }
        // line 35
        echo "
    <div class=\"card col-9\">
      <div class=\"card-body\">
        <div class=\"card\">
          <form class=\"mt-2\" id=\"position-filters\">
            <div class=\"container\">
              <div class=\"row\">
                <div class=\"row col-md-12 col-lg-6\">
                  <label class=\"form-control-label col-4 text-left mt-1\">";
        // line 43
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Show", [], "Admin.Actions"), "html", null, true);
        echo "</label>
                  <div class=\"col-8\">
                    <select id=\"show-modules\" class=\"filter\">
                      <option value=\"all\">";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("All modules", [], "Admin.Design.Feature"), "html", null, true);
        echo "&nbsp;</option>
                      ";
        // line 47
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["modules"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["module"]) {
            // line 48
            echo "                        <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["module"], "id", []), "html", null, true);
            echo "\"";
            if ((($context["selectedModule"] ?? null) == $this->getAttribute($context["module"], "id", []))) {
                echo " selected=\"selected\"";
            }
            echo ">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["module"], "displayName", []), "html", null, true);
            echo "</option>
                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['module'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 50
        echo "                    </select>
                  </div>
                </div>

                <div class=\"row col-md-12 col-lg-6\">
                  <label class=\"form-control-label col-5 text-center mt-1\">";
        // line 55
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Search for a hook", [], "Admin.Design.Feature"), "html", null, true);
        echo "</label>
                  <div class=\"input-group col-7\">
                    <div class=\"input-group-prepend\">
                      <div class=\"input-group-text\">
                        <i class=\"material-icons\">search</i>
                      </div>
                    </div>
                    <input type=\"text\" class=\"form-control\" id=\"hook-search\" name=\"hook-search\" placeholder=\"\">
                  </div>
                </div>
              </div>
            </div>

            <div class=\"container mt-3\">
              <div class=\"row\">
                <div class=\"col-lg-12\">
                  <p class=\"checkbox\">
                    <label class=\"form-control-label\" for=\"hook-position\">
                      <input type=\"checkbox\" id=\"hook-position\" />
                      <label class=\"selectbox\" for=\"hook-position\"><i class=\"material-icons done\">done</i></label>
                      ";
        // line 75
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Display non-positionable hooks", [], "Admin.Design.Feature"), "html", null, true);
        echo "
                    </label>
                  </p>
                </div>
              </div>
            </div>
          </form>
        </div>

        <form id=\"module-positions-form\" method=\"post\" action=\"";
        // line 84
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_modules_positions_unhook");
        echo "\" data-update-url=\"";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("api_improve_design_positions_update");
        echo "\" data-togglestatus-url=\"";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_modules_positions_toggle_status");
        echo "\">
          ";
        // line 85
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["hooks"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["hook"]) {
            // line 86
            echo "            <section class=\"hook-panel";
            if ( !$this->getAttribute($context["hook"], "position", [], "array")) {
                echo " hook-position";
            }
            echo "\"";
            if ( !$this->getAttribute($context["hook"], "position", [], "array")) {
                echo " style=\"display:none;\"";
            }
            echo ">
              <a name=\"";
            // line 87
            echo twig_escape_filter($this->env, $this->getAttribute($context["hook"], "name", [], "array"), "html", null, true);
            echo "\"></a>
              <header class=\"hook-panel-header\">
                <span class=\"hook-status\">
                   <input
                      class=\"switch-input-md hook-switch-action\"
                      data-toggle=\"switch\"
                      data-hook-id=\"";
            // line 93
            echo twig_escape_filter($this->env, $this->getAttribute($context["hook"], "id_hook", [], "array"), "html", null, true);
            echo "\"
                      type=\"checkbox\"
                      value=\"";
            // line 95
            echo twig_escape_filter($this->env, $this->getAttribute($context["hook"], "active", [], "array"), "html", null, true);
            echo "\"
                      ";
            // line 96
            echo (($this->getAttribute($context["hook"], "active", [], "array")) ? ("checked=\"checked\"") : (""));
            echo "
                    />
                </span>
                <span class=\"hook-name\">";
            // line 99
            echo twig_escape_filter($this->env, $this->getAttribute($context["hook"], "name", [], "array"), "html", null, true);
            echo "</span>
                <label class=\"badge badge-pill float-right\">
                  ";
            // line 101
            if (($this->getAttribute($context["hook"], "modules_count", [], "array") && ($context["canMove"] ?? null))) {
                // line 102
                echo "                    <input type=\"checkbox\" class=\"hook-checker\" id=\"Ghook";
                echo twig_escape_filter($this->env, $this->getAttribute($context["hook"], "id_hook", [], "array"), "html", null, true);
                echo "\" data-hook-id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["hook"], "id_hook", [], "array"), "html", null, true);
                echo "\" />
                    <label class=\"selectbox\" for=\"Ghook";
                // line 103
                echo twig_escape_filter($this->env, $this->getAttribute($context["hook"], "id_hook", [], "array"), "html", null, true);
                echo "\"><i class=\"material-icons done\">done</i></label>
                  ";
            }
            // line 105
            echo "
                  ";
            // line 106
            echo twig_escape_filter($this->env, $this->getAttribute($context["hook"], "modules_count", [], "array"), "html", null, true);
            echo "
                  ";
            // line 107
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans(((($this->getAttribute($context["hook"], "modules_count", [], "array") > 1)) ? ("Modules") : ("Module")), [], "Admin.Global"), "html", null, true);
            echo "
                </label>

                ";
            // line 110
            if ($this->getAttribute($context["hook"], "description", [], "array", true, true)) {
                // line 111
                echo "                  <div class=\"hook_description\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["hook"], "description", [], "array"), "html", null, true);
                echo "</div>
                ";
            }
            // line 113
            echo "              </header>

              ";
            // line 115
            if ($this->getAttribute($context["hook"], "modules_count", [], "array")) {
                // line 116
                echo "                <section class=\"module-list";
                if ( !$this->getAttribute($context["hook"], "active", [], "array")) {
                    echo "-disabled";
                }
                echo "\">
                  <ul class=\"list-unstyled";
                // line 117
                if (($this->getAttribute($context["hook"], "modules_count", [], "array") > 1)) {
                    echo " sortable";
                }
                echo "\">
                    ";
                // line 118
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["hook"], "modules", [], "array"));
                $context['loop'] = [
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                ];
                foreach ($context['_seq'] as $context["_key"] => $context["module"]) {
                    if ($this->getAttribute(($context["modules"] ?? null), $this->getAttribute($context["module"], "id_module", [], "array"), [], "array", true, true)) {
                        // line 119
                        echo "                      ";
                        $context["moduleInstance"] = $this->getAttribute(($context["modules"] ?? null), $this->getAttribute($context["module"], "id_module", [], "array"), [], "array");
                        // line 120
                        echo "                      <li id=\"";
                        echo twig_escape_filter($this->env, (($this->getAttribute($context["hook"], "id_hook", [], "array") . "_") . $this->getAttribute(($context["moduleInstance"] ?? null), "id", [])), "html", null, true);
                        echo "\"
                        class=\"module-position-";
                        // line 121
                        echo twig_escape_filter($this->env, $this->getAttribute(($context["moduleInstance"] ?? null), "id", []), "html", null, true);
                        echo " module-item";
                        if ((($context["canMove"] ?? null) && ($this->getAttribute($context["hook"], "modules_count", [], "array") >= 2))) {
                            echo " draggable";
                        }
                        echo "\">

                        <div class=\"module-column-select\">
                          <i class=\"material-icons drag_indicator\">drag_indicator</i>
                          <input type=\"checkbox\" id=\"selecterbox";
                        // line 125
                        echo twig_escape_filter($this->env, (($this->getAttribute($context["hook"], "id_hook", [], "array") . "_") . $this->getAttribute(($context["moduleInstance"] ?? null), "id", [])), "html", null, true);
                        echo "\" data-hook-id=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["hook"], "id_hook", [], "array"), "html", null, true);
                        echo "\" class=\"modules-position-checkbox hook";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["hook"], "id_hook", [], "array"), "html", null, true);
                        echo "\" name=\"unhooks[]\" value=\"";
                        echo twig_escape_filter($this->env, (($this->getAttribute($context["hook"], "id_hook", [], "array") . "_") . $this->getAttribute(($context["moduleInstance"] ?? null), "id", [])), "html", null, true);
                        echo "\"/>
                          <label class=\"selectbox\" for=\"selecterbox";
                        // line 126
                        echo twig_escape_filter($this->env, (($this->getAttribute($context["hook"], "id_hook", [], "array") . "_") . $this->getAttribute(($context["moduleInstance"] ?? null), "id", [])), "html", null, true);
                        echo "\"><i class=\"material-icons done\">done</i></label>
                        </div>

                        <div class=\"module-column-icon\">
                          <img src=\"";
                        // line 130
                        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl((("../modules/" . $this->getAttribute(($context["moduleInstance"] ?? null), "name", [])) . "/logo.png")), "html", null, true);
                        echo "\" alt=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute(($context["moduleInstance"] ?? null), "displayName", []));
                        echo "\" />
                        </div>

                        <div class=\"module-column-infos\">
                          <span class=\"module-name\">
                            ";
                        // line 135
                        echo twig_escape_filter($this->env, $this->getAttribute(($context["moduleInstance"] ?? null), "displayName", []));
                        echo "
                            ";
                        // line 136
                        if ($this->getAttribute(($context["moduleInstance"] ?? null), "version", [])) {
                            // line 137
                            echo "                              <small class=\"text-muted\">&nbsp;-&nbsp;";
                            echo twig_escape_filter($this->env, sprintf("v%s", $this->getAttribute(($context["moduleInstance"] ?? null), "version", [])), "html", null, true);
                            echo "</small>
                            ";
                        }
                        // line 139
                        echo "                          </span>
                        </div>

                        <div class=\"module-column-description";
                        // line 142
                        if (( !($context["selectedModule"] ?? null) && ($this->getAttribute($context["hook"], "modules_count", [], "array") > 1))) {
                            echo " hasColumnPosition";
                        }
                        echo " d-none d-md-table-cell\">
                          <span class=\"module-description\">";
                        // line 143
                        echo twig_escape_filter($this->env, $this->getAttribute(($context["moduleInstance"] ?? null), "description", []));
                        echo "</span>
                        </div>

                        ";
                        // line 146
                        if (( !($context["selectedModule"] ?? null) && ($this->getAttribute($context["hook"], "modules_count", [], "array") > 1))) {
                            // line 147
                            echo "                          <div class=\"btn-toolbar text-center module-column-position";
                            if ((($context["canMove"] ?? null) && ($this->getAttribute($context["hook"], "modules_count", [], "array") >= 2))) {
                                echo " dragHandle";
                            }
                            echo "\" id=\"td_";
                            echo twig_escape_filter($this->env, (($this->getAttribute($context["hook"], "id_hook", [], "array") . "_") . $this->getAttribute(($context["moduleInstance"] ?? null), "id", [])), "html", null, true);
                            echo "\">
                            <div class=\"btn-group\">
                              <span class=\"index-position\">";
                            // line 149
                            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", []), "html", null, true);
                            echo "</span>
                            </div>
                          </div>
                        ";
                        }
                        // line 153
                        echo "
                        <div class=\"module-column-actions\">
                          <div class=\"btn-group\">
                            ";
                        // line 156
                        $context["linkParams"] = ["id_module" => $this->getAttribute(                        // line 157
($context["moduleInstance"] ?? null), "id", []), "id_hook" => $this->getAttribute(                        // line 158
$context["hook"], "id_hook", [], "array"), "editGraft" => 1];
                        // line 161
                        echo "                            ";
                        if (($context["selectedModule"] ?? null)) {
                            // line 162
                            echo "                              ";
                            $context["linkParams"] = twig_array_merge(($context["linkParams"] ?? null), ["show_modules" => ($context["selectedModule"] ?? null)]);
                            // line 163
                            echo "                            ";
                        }
                        // line 164
                        echo "
                            <a class=\"btn tooltip-link\" href=\"";
                        // line 165
                        echo twig_escape_filter($this->env, $this->env->getExtension('PrestaShopBundle\Twig\LayoutExtension')->getAdminLink("AdminModulesPositions", true, ($context["linkParams"] ?? null)), "html", null, true);
                        echo "\" aria-label=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Edit", [], "Admin.Actions"), "html", null, true);
                        echo "\" title=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Edit", [], "Admin.Actions"), "html", null, true);
                        echo "\">
                              <i class=\"material-icons\">edit</i>
                            </a>

                            <a class=\"btn tooltip-link dropdown-toggle dropdown-toggle-dots dropdown-toggle-split\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\" data-reference=\"parent\">
                            </a>

                            <div class=\"dropdown-menu\">
                              <a class=\"dropdown-item\" href=\"";
                        // line 173
                        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_modules_positions_unhook", ["moduleId" => $this->getAttribute(($context["moduleInstance"] ?? null), "id", []), "hookId" => $this->getAttribute($context["hook"], "id_hook", [], "array")]), "html", null, true);
                        echo "\">
                                <i class=\"material-icons\">indeterminate_check_box</i>
                                ";
                        // line 175
                        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Unhook", [], "Admin.Design.Feature"), "html", null, true);
                        echo "
                              </a>
                            </div>
                          </div>
                        </div>

                        <div class=\"module-column-description d-block d-md-none w-100\">
                          <span class=\"module-description\">";
                        // line 182
                        echo twig_escape_filter($this->env, $this->getAttribute(($context["moduleInstance"] ?? null), "description", []));
                        echo "</span>
                        </div>
                      </li>
                    ";
                        ++$context['loop']['index0'];
                        ++$context['loop']['index'];
                        $context['loop']['first'] = false;
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['module'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 186
                echo "                  </ul>
                </section>
              ";
            }
            // line 189
            echo "            </section>
          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['hook'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 191
        echo "
          <div id=\"unhook-button-position-bottom\">
            <button type=\"submit\" class=\"btn btn-default\" name=\"unhookform\">
              <i class=\"material-icons\">indeterminate_check_box</i>
              ";
        // line 195
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Unhook the selection", [], "Admin.Design.Feature"), "html", null, true);
        echo "
            </button>
          </div>
        </form>
      </div>
    </div>

    <div class=\"col-3\">
      <div class=\"card\" id=\"modules-position-selection-panel\">
        <h3 class=\"card-header\"><i class=\"material-icons\">checked</i> ";
        // line 204
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Selection", [], "Admin.Global"), "html", null, true);
        echo "</h3>
        <div class=\"card-body\">
          <p>
            <span id=\"modules-position-single-selection\">";
        // line 207
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("1 module selected", [], "Admin.Design.Feature"), "html", null, true);
        echo "</span>
            <span id=\"modules-position-multiple-selection\">
              <span id=\"modules-position-selection-count\"></span> ";
        // line 209
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("modules selected", [], "Admin.Design.Feature"), "html", null, true);
        echo "
            </span>
          </p>
          <div class=\"text-center\">
            <button class=\"btn btn-primary\"><i class=\"icon-remove\"></i> ";
        // line 213
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Unhook the selection", [], "Admin.Design.Feature"), "html", null, true);
        echo "</button>
          </div>
        </div>
      </div>
    </div>
  </div>
";
    }

    // line 221
    public function block_javascripts($context, array $blocks = [])
    {
        // line 222
        echo "  ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
  <script src=\"";
        // line 223
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/new-theme/public/improve_design_positions.bundle.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Improve/Design/positions.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  481 => 223,  476 => 222,  473 => 221,  462 => 213,  455 => 209,  450 => 207,  444 => 204,  432 => 195,  426 => 191,  419 => 189,  414 => 186,  400 => 182,  390 => 175,  385 => 173,  370 => 165,  367 => 164,  364 => 163,  361 => 162,  358 => 161,  356 => 158,  355 => 157,  354 => 156,  349 => 153,  342 => 149,  332 => 147,  330 => 146,  324 => 143,  318 => 142,  313 => 139,  307 => 137,  305 => 136,  301 => 135,  291 => 130,  284 => 126,  274 => 125,  263 => 121,  258 => 120,  255 => 119,  244 => 118,  238 => 117,  231 => 116,  229 => 115,  225 => 113,  219 => 111,  217 => 110,  211 => 107,  207 => 106,  204 => 105,  199 => 103,  192 => 102,  190 => 101,  185 => 99,  179 => 96,  175 => 95,  170 => 93,  161 => 87,  150 => 86,  146 => 85,  138 => 84,  126 => 75,  103 => 55,  96 => 50,  81 => 48,  77 => 47,  73 => 46,  67 => 43,  57 => 35,  51 => 32,  48 => 31,  46 => 30,  43 => 29,  40 => 28,  30 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Improve/Design/positions.html.twig", "/var/www/html/src/PrestaShopBundle/Resources/views/Admin/Improve/Design/positions.html.twig");
    }
}
