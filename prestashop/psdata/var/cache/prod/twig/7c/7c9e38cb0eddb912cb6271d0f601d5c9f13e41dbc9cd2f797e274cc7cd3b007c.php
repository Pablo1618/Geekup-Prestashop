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

/* @PrestaShop/Admin/Configure/AdvancedParameters/Employee/Blocks/form.html.twig */
class __TwigTemplate_6525c647b52bc65df0d6e440628138f4b82754353619d13bf4c1b337396ca7fb extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'employee_addons_connect' => [$this, 'block_employee_addons_connect'],
            'employee_form' => [$this, 'block_employee_form'],
            'employee_form_rest' => [$this, 'block_employee_form_rest'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 25
        echo "
";
        // line 26
        $context["ps"] = $this->loadTemplate("@PrestaShop/Admin/macros.html.twig", "@PrestaShop/Admin/Configure/AdvancedParameters/Employee/Blocks/form.html.twig", 26)->unwrap();
        // line 28
        echo "
";
        // line 29
        $this->displayBlock('employee_addons_connect', $context, $blocks);
        // line 32
        echo "
";
        // line 33
        $this->displayBlock('employee_form', $context, $blocks);
    }

    // line 29
    public function block_employee_addons_connect($context, array $blocks = [])
    {
        // line 30
        echo "  ";
        $this->loadTemplate("@PrestaShop/Admin/Module/Includes/modal_addons_connect.html.twig", "@PrestaShop/Admin/Configure/AdvancedParameters/Employee/Blocks/form.html.twig", 30)->display(twig_array_merge($context, ["level" => ($context["level"] ?? null), "errorMessage" => ($context["errorMessage"] ?? null)]));
    }

    // line 33
    public function block_employee_form($context, array $blocks = [])
    {
        // line 34
        echo "  ";
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["employeeForm"] ?? null), 'form_start');
        echo "
  <div class=\"card\">
    <h3 class=\"card-header\">
      ";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Employees", [], "Admin.Advparameters.Feature"), "html", null, true);
        echo "
    </h3>
    <div class=\"card-block row\">
      <div class=\"card-text\">
        ";
        // line 41
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["employeeForm"] ?? null), 'errors');
        echo "

        ";
        // line 43
        echo $context["ps"]->getform_group_row($this->getAttribute(($context["employeeForm"] ?? null), "firstname", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("First name", [], "Admin.Global")]);
        // line 45
        echo "

        ";
        // line 47
        echo $context["ps"]->getform_group_row($this->getAttribute(($context["employeeForm"] ?? null), "lastname", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Last name", [], "Admin.Global")]);
        // line 49
        echo "

        ";
        // line 51
        echo $context["ps"]->getform_group_row($this->getAttribute(($context["employeeForm"] ?? null), "avatarUrl", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Avatar", [], "Admin.Global")]);
        // line 53
        echo "

        <div class=\"form-group row\">
          <label class=\"form-control-label\"></label>
          <div class=\"col-sm\">
            <img class=\"img-thumbnail clickable-avatar\" src=\"";
        // line 58
        echo twig_escape_filter($this->env, ($context["avatarUrl"] ?? null), "html", null, true);
        echo "\" alt=\"\">
          </div>
        </div>

        ";
        // line 62
        echo $context["ps"]->getform_group_row($this->getAttribute(($context["employeeForm"] ?? null), "has_enabled_gravatar", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Enable gravatar", [], "Admin.Global")]);
        // line 64
        echo "

        ";
        // line 66
        echo $context["ps"]->getform_group_row($this->getAttribute(($context["employeeForm"] ?? null), "email", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Email address", [], "Admin.Global")]);
        // line 68
        echo "

        ";
        // line 70
        $context["passwordHelpMessage"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Password should be at least %num% characters long.", ["%num%" => 8], "Admin.Advparameters.Help");
        // line 71
        echo "
        ";
        // line 72
        if (($context["isRestrictedAccess"] ?? null)) {
            // line 73
            echo "            ";
            $context["oldPasswordVars"] = twig_array_merge($this->getAttribute($this->getAttribute($this->getAttribute(($context["employeeForm"] ?? null), "change_password", []), "old_password", []), "vars", []), ((array_key_exists("old_password", $context)) ? (_twig_default_filter(($context["old_password"] ?? null), [])) : ([])));
            // line 74
            echo "            ";
            $context["newPasswordFirstVars"] = twig_array_merge($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["employeeForm"] ?? null), "change_password", []), "new_password", []), "children", []), "first", []), "vars", []), (($this->getAttribute(($context["new_password"] ?? null), "first_options", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["new_password"] ?? null), "first_options", []), [])) : ([])));
            // line 75
            echo "            ";
            $context["newPasswordSecondVars"] = twig_array_merge($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["employeeForm"] ?? null), "change_password", []), "new_password", []), "children", []), "second", []), "vars", []), (($this->getAttribute(($context["new_password"] ?? null), "second_options", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["new_password"] ?? null), "second_options", []), [])) : ([])));
            // line 76
            echo "
            <div class=\"form-group row\">
              <label class=\"form-control-label\">
                ";
            // line 79
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Password", [], "Admin.Global"), "html", null, true);
            echo "
              </label>
              <div class=\"col-sm\">
                ";
            // line 83
            echo "                ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["employeeForm"] ?? null), "change_password", []), "change_password_button", []), 'widget', ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Change password...", [], "messages"), "attr" => ["class" => "btn-outline-secondary js-change-password"]]);
            // line 88
            echo "

                <div class=\"card card-body js-change-password-block d-none\">
                  ";
            // line 92
            echo "                  ";
            echo $context["ps"]->getform_group_row($this->getAttribute($this->getAttribute(($context["employeeForm"] ?? null), "change_password", []), "old_password", []), ($context["oldPasswordVars"] ?? null), ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Current password", [], "messages"), "required" => true]);
            // line 95
            echo "

                  ";
            // line 98
            echo "                  <div class=\"form-group row\">
                      ";
            // line 99
            echo $context["ps"]->getlabel_with_help($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("New password", [], "messages"), ($context["passwordHelpMessage"] ?? null), "", $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["employeeForm"] ?? null), "change_password", []), "new_password", []), "children", []), "first", []), "vars", []), "id", []), true);
            echo "
                    <div class=\"col-sm\">
                      ";
            // line 101
            echo $context["ps"]->getform_widget_with_error($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["employeeForm"] ?? null), "change_password", []), "new_password", []), "children", []), "first", []), $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["employeeForm"] ?? null), "change_password", []), "new_password", []), "children", []), "first", []), "vars", []));
            echo "
                    </div>
                  </div>

                  ";
            // line 106
            echo "                  ";
            // line 107
            echo "                  ";
            echo $context["ps"]->getform_group_row($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["employeeForm"] ?? null), "change_password", []), "new_password", []), "children", []), "second", []), ($context["newPasswordSecondVars"] ?? null), ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Confirm password", [], "messages"), "help" => "", "required" => true]);
            // line 111
            echo "

                  <div class=\"form-group row\">
                    <label class=\"form-control-label\"></label>
                    <div class=\"col-sm\">
                      ";
            // line 116
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["employeeForm"] ?? null), "change_password", []), "generated_password", []), 'widget');
            echo "
                    </div>
                    <div class=\"col-sm\">
                      ";
            // line 119
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["employeeForm"] ?? null), "change_password", []), "generate_password_button", []), 'widget', ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Generate password", [], "messages"), "attr" => ["class" => "btn-outline-secondary"]]);
            // line 124
            echo "
                    </div>
                  </div>

                  ";
            // line 128
            echo $context["ps"]->getform_group_row($this->getAttribute($this->getAttribute(($context["employeeForm"] ?? null), "change_password", []), "cancel_button", []), ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Cancel", [], "Admin.Actions"), "attr" => ["class" => "btn-outline-secondary js-change-password-cancel"]]);
            // line 133
            echo "

                  ";
            // line 136
            echo "                  <div class=\"js-password-strength-feedback d-none\">
                    <span class=\"strength-low\">";
            // line 137
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Invalid", [], "messages"), "html", null, true);
            echo "</span>
                    <span class=\"strength-medium\">";
            // line 138
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Okay", [], "messages"), "html", null, true);
            echo "</span>
                    <span class=\"strength-high\">";
            // line 139
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Good", [], "messages"), "html", null, true);
            echo "</span>
                    <span class=\"strength-extreme\">";
            // line 140
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Fabulous", [], "messages"), "html", null, true);
            echo "</span>
                  </div>
                </div>
              </div>
            </div>
        ";
        } else {
            // line 146
            echo "          ";
            echo $context["ps"]->getform_group_row($this->getAttribute(($context["employeeForm"] ?? null), "password", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Password", [], "Admin.Global"), "help" =>             // line 148
($context["passwordHelpMessage"] ?? null)]);
            // line 149
            echo "
        ";
        }
        // line 151
        echo "
        ";
        // line 152
        if ((($context["isRestrictedAccess"] ?? null) && ($context["showAddonsConnectButton"] ?? null))) {
            // line 153
            echo "          <div class=\"form-group row\">
            <label class=\"form-control-label\">
              PrestaShop Addons
            </label>
            <div class=\"col-sm\">
              ";
            // line 158
            if ($this->getAttribute($this->getAttribute($this->getAttribute(($context["employeeForm"] ?? null), "prestashop_addons", []), "vars", []), "is_addons_connected", [])) {
                // line 159
                echo "                <p>
                  <i class=\"material-icons\">account_circle</i>
                  ";
                // line 161
                echo twig_escape_filter($this->env, twig_replace_filter($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("You are currently connected as %username%", [], "Admin.Advparameters.Feature"), ["%username%" => $this->getAttribute($this->getAttribute($this->getAttribute(                // line 163
($context["employeeForm"] ?? null), "prestashop_addons", []), "vars", []), "addons_username", [])]), "html", null, true);
                // line 164
                echo "
                </p>
              ";
            }
            // line 167
            echo "
              <div>
                ";
            // line 169
            if ($this->getAttribute($this->getAttribute($this->getAttribute(($context["employeeForm"] ?? null), "prestashop_addons", []), "vars", []), "is_addons_connected", [])) {
                // line 170
                echo "                  ";
                list($context["label"], $context["target"]) =                 [$this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Sign out from PrestaShop Addons", [], "Admin.Advparameters.Feature"), "#module-modal-addons-logout"];
                // line 174
                echo "                ";
            } else {
                // line 175
                echo "                  ";
                list($context["label"], $context["target"]) =                 [$this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Sign in", [], "Admin.Advparameters.Feature"), "#module-modal-addons-connect"];
                // line 179
                echo "                ";
            }
            // line 180
            echo "
                ";
            // line 181
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["employeeForm"] ?? null), "prestashop_addons", []), 'widget', ["attr" => ["class" => "btn-outline-secondary", "data-toggle" => "modal", "data-target" =>             // line 185
($context["target"] ?? null)], "label" =>             // line 187
($context["label"] ?? null)]);
            // line 188
            echo "
              </div>
            </div>
          </div>
        ";
        }
        // line 193
        echo "
        ";
        // line 194
        echo $context["ps"]->getform_group_row($this->getAttribute(($context["employeeForm"] ?? null), "language", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Language", [], "Admin.Global")]);
        // line 196
        echo "

        ";
        // line 198
        if ( !($context["isRestrictedAccess"] ?? null)) {
            // line 199
            echo "          ";
            echo $context["ps"]->getform_group_row($this->getAttribute(($context["employeeForm"] ?? null), "active", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Active", [], "Admin.Global"), "help" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Allow or disallow this employee to log in to the Admin panel.", [], "Admin.Advparameters.Help")]);
            // line 202
            echo "

          ";
            // line 204
            echo $context["ps"]->getform_group_row($this->getAttribute(($context["employeeForm"] ?? null), "profile", []), ["attr" => ["data-admin-profile" =>             // line 206
($context["superAdminProfileId"] ?? null), "data-get-tabs-url" =>             // line 207
($context["getTabsUrl"] ?? null)]], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Permission profile", [], "Admin.Advparameters.Feature")]);
            // line 211
            echo "

          ";
            // line 213
            if ($this->getAttribute(($context["employeeForm"] ?? null), "shop_association", [], "any", true, true)) {
                // line 214
                echo "            ";
                echo $context["ps"]->getform_group_row($this->getAttribute(($context["employeeForm"] ?? null), "shop_association", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Shop association", [], "Admin.Global"), "help" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Select the shops the employee is allowed to access.", [], "Admin.Advparameters.Help")]);
                // line 217
                echo "
          ";
            }
            // line 219
            echo "        ";
        }
        // line 220
        echo "
        ";
        // line 221
        echo $context["ps"]->getform_group_row($this->getAttribute(($context["employeeForm"] ?? null), "default_page", []), ["attr" => ["data-minimumResultsForSearch" => "7", "data-toggle" => "select2"]], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Default page", [], "Admin.Advparameters.Feature"), "help" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("This page will be displayed just after login.", [], "Admin.Advparameters.Help")]);
        // line 224
        echo "

        ";
        // line 226
        $this->displayBlock('employee_form_rest', $context, $blocks);
        // line 229
        echo "      </div>
    </div>
    <div class=\"card-footer\">
      <a href=\"";
        // line 232
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_employees_index");
        echo "\" class=\"btn btn-outline-secondary\" id=\"cancel-link\">
        ";
        // line 233
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Cancel", [], "Admin.Actions"), "html", null, true);
        echo "
      </a>
      <button class=\"btn btn-primary float-right\" id=\"save-button\">
        ";
        // line 236
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Save", [], "Admin.Actions"), "html", null, true);
        echo "
      </button>
    </div>
  </div>
  ";
        // line 240
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["employeeForm"] ?? null), 'form_end');
        echo "
";
    }

    // line 226
    public function block_employee_form_rest($context, array $blocks = [])
    {
        // line 227
        echo "          ";
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["employeeForm"] ?? null), 'rest');
        echo "
        ";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Configure/AdvancedParameters/Employee/Blocks/form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  379 => 227,  376 => 226,  370 => 240,  363 => 236,  357 => 233,  353 => 232,  348 => 229,  346 => 226,  342 => 224,  340 => 221,  337 => 220,  334 => 219,  330 => 217,  327 => 214,  325 => 213,  321 => 211,  319 => 207,  318 => 206,  317 => 204,  313 => 202,  310 => 199,  308 => 198,  304 => 196,  302 => 194,  299 => 193,  292 => 188,  290 => 187,  289 => 185,  288 => 181,  285 => 180,  282 => 179,  279 => 175,  276 => 174,  273 => 170,  271 => 169,  267 => 167,  262 => 164,  260 => 163,  259 => 161,  255 => 159,  253 => 158,  246 => 153,  244 => 152,  241 => 151,  237 => 149,  235 => 148,  233 => 146,  224 => 140,  220 => 139,  216 => 138,  212 => 137,  209 => 136,  205 => 133,  203 => 128,  197 => 124,  195 => 119,  189 => 116,  182 => 111,  179 => 107,  177 => 106,  170 => 101,  165 => 99,  162 => 98,  158 => 95,  155 => 92,  150 => 88,  147 => 83,  141 => 79,  136 => 76,  133 => 75,  130 => 74,  127 => 73,  125 => 72,  122 => 71,  120 => 70,  116 => 68,  114 => 66,  110 => 64,  108 => 62,  101 => 58,  94 => 53,  92 => 51,  88 => 49,  86 => 47,  82 => 45,  80 => 43,  75 => 41,  68 => 37,  61 => 34,  58 => 33,  53 => 30,  50 => 29,  46 => 33,  43 => 32,  41 => 29,  38 => 28,  36 => 26,  33 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Configure/AdvancedParameters/Employee/Blocks/form.html.twig", "/var/www/html/src/PrestaShopBundle/Resources/views/Admin/Configure/AdvancedParameters/Employee/Blocks/form.html.twig");
    }
}
