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

/* @PrestaShop/Admin/Configure/AdvancedParameters/system_information.html.twig */
class __TwigTemplate_eda00d0d2ea37441baadb98a9030aa7544137998f737526c60b9b1968e1f0627 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 25
        return "@PrestaShop/Admin/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/layout.html.twig", "@PrestaShop/Admin/Configure/AdvancedParameters/system_information.html.twig", 25);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 28
    public function block_content($context, array $blocks = [])
    {
        // line 29
        echo "<div class=\"row\">
  <div class=\"col-lg-6\">
    <div class=\"card\">
      <h3 class=\"card-header\">
        <i class=\"material-icons\">info_outline</i> ";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Configuration information", [], "Admin.Advparameters.Feature"), "html", null, true);
        echo "
      </h3>
      <div class=\"card-block\">
        <div class=\"card-text\">
          <p>";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("This information must be provided when you report an issue on GitHub or on the forum.", [], "Admin.Advparameters.Feature"), "html", null, true);
        echo "</p>
        </div>
      </div>
    </div>
    ";
        // line 41
        if ($this->getAttribute(($context["system"] ?? null), "notHostMode", [])) {
            // line 42
            echo "      <div class=\"card\">
        <h3 class=\"card-header\">
          <i class=\"material-icons\">info_outline</i> ";
            // line 44
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Server information", [], "Admin.Advparameters.Feature"), "html", null, true);
            echo "
        </h3>
        <div class=\"card-block\">
          <div class=\"card-text\">
            ";
            // line 48
            if ( !twig_test_empty($this->getAttribute(($context["system"] ?? null), "uname", []))) {
                // line 49
                echo "              <p>
                <strong>";
                // line 50
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Server information:", [], "Admin.Advparameters.Feature"), "html", null, true);
                echo "</strong> ";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["system"] ?? null), "uname", []), "html", null, true);
                echo "
              </p>
            ";
            }
            // line 53
            echo "            <p>
              <strong>";
            // line 54
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Server software version:", [], "Admin.Advparameters.Feature"), "html", null, true);
            echo "</strong> ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["system"] ?? null), "server", []), "version", []), "html", null, true);
            echo "
            </p>
            <p>
              <strong>";
            // line 57
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("PHP version:", [], "Admin.Advparameters.Feature"), "html", null, true);
            echo "</strong> ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["system"] ?? null), "server", []), "php", []), "version", []), "html", null, true);
            echo "
            </p>
            <p>
              <strong>";
            // line 60
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Memory limit:", [], "Admin.Advparameters.Feature"), "html", null, true);
            echo "</strong> ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["system"] ?? null), "server", []), "php", []), "memoryLimit", []), "html", null, true);
            echo "
            </p>
            <p>
              <strong>";
            // line 63
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Max execution time:", [], "Admin.Advparameters.Feature"), "html", null, true);
            echo "</strong> ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["system"] ?? null), "server", []), "php", []), "maxExecutionTime", []), "html", null, true);
            echo "
            </p>
            <p>
              <strong>";
            // line 66
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Upload Max File size:", [], "Admin.Advparameters.Feature"), "html", null, true);
            echo "</strong> ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["system"] ?? null), "server", []), "php", []), "maxFileSizeUpload", []), "html", null, true);
            echo "
            </p>
            ";
            // line 68
            if ($this->getAttribute(($context["system"] ?? null), "instaWebInstalled", [])) {
                // line 69
                echo "              <p>";
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("PageSpeed module for Apache installed (mod_instaweb)", [], "Admin.Advparameters.Feature"), "html", null, true);
                echo "</p>
            ";
            }
            // line 71
            echo "          </div>
        </div>
      </div>

      <div class=\"card\">
        <h3 class=\"card-header\">
          <i class=\"material-icons\">info_outline</i> ";
            // line 77
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Database information", [], "Admin.Advparameters.Feature"), "html", null, true);
            echo "
        </h3>
        <div class=\"card-block\">
          <div class=\"card-text\">
            <p>
              <strong>";
            // line 82
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("MySQL version:", [], "Admin.Advparameters.Feature"), "html", null, true);
            echo "</strong> ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["system"] ?? null), "database", []), "version", []), "html", null, true);
            echo "
            </p>
            <p>
              <strong>";
            // line 85
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("MySQL server:", [], "Admin.Advparameters.Feature"), "html", null, true);
            echo "</strong> ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["system"] ?? null), "database", []), "server", []), "html", null, true);
            echo "
            </p>
            <p>
              <strong>";
            // line 88
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("MySQL name:", [], "Admin.Advparameters.Feature"), "html", null, true);
            echo "</strong> ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["system"] ?? null), "database", []), "name", []), "html", null, true);
            echo "
            </p>
            <p>
              <strong>";
            // line 91
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("MySQL user:", [], "Admin.Advparameters.Feature"), "html", null, true);
            echo "</strong> ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["system"] ?? null), "database", []), "user", []), "html", null, true);
            echo "
            </p>
            <p>
              <strong>";
            // line 94
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Tables prefix:", [], "Admin.Advparameters.Feature"), "html", null, true);
            echo "</strong> ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["system"] ?? null), "database", []), "prefix", []), "html", null, true);
            echo "
            </p>
            <p>
              <strong>";
            // line 97
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("MySQL engine:", [], "Admin.Advparameters.Feature"), "html", null, true);
            echo "</strong> ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["system"] ?? null), "database", []), "engine", []), "html", null, true);
            echo "
            </p>
            <p>
              <strong>";
            // line 100
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("MySQL driver:", [], "Admin.Advparameters.Feature"), "html", null, true);
            echo "</strong> ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["system"] ?? null), "database", []), "driver", []), "html", null, true);
            echo "
            </p>
          </div>
        </div>
      </div>

      <div class=\"card\">
      <h3 class=\"card-header\">
        <i class=\"material-icons\">info_outline</i> ";
            // line 108
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("List of overrides", [], "Admin.Advparameters.Feature"), "html", null, true);
            echo "
      </h3>
      <div class=\"card-block\">
        <div class=\"card-text\">
          <ul>
            ";
            // line 113
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["system"] ?? null), "overrides", []));
            foreach ($context['_seq'] as $context["_key"] => $context["override"]) {
                // line 114
                echo "              <li>";
                echo twig_escape_filter($this->env, $context["override"], "html", null, true);
                echo "</li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['override'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 116
            echo "          </ul>
        </div>
      </div>
    </div>
    ";
        }
        // line 121
        echo "  </div>
  <div class=\"col-lg-6\">
    <div class=\"card\">
      <h3 class=\"card-header\">
        <i class=\"material-icons\">info_outline</i> ";
        // line 125
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Store information", [], "Admin.Advparameters.Feature"), "html", null, true);
        echo "
      </h3>
      <div class=\"card-block\">
        <div class=\"card-text\">
          <p>
            <strong>";
        // line 130
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("PrestaShop version:", [], "Admin.Advparameters.Feature"), "html", null, true);
        echo "</strong> ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["system"] ?? null), "shop", []), "version", []), "html", null, true);
        echo "
          </p>
          <p>
            <strong>";
        // line 133
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Shop URL:", [], "Admin.Advparameters.Feature"), "html", null, true);
        echo "</strong> ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["system"] ?? null), "shop", []), "url", []), "html", null, true);
        echo "
          </p>
          <p>
            <strong>";
        // line 136
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Shop path:", [], "Admin.Advparameters.Feature"), "html", null, true);
        echo "</strong> ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["system"] ?? null), "shop", []), "path", []), "html", null, true);
        echo "
          </p>
          <p>
            <strong>";
        // line 139
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Current theme in use:", [], "Admin.Advparameters.Feature"), "html", null, true);
        echo "</strong> ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["system"] ?? null), "shop", []), "theme", []), "html", null, true);
        echo "
          </p>
        </div>
      </div>
    </div>

    <div class=\"card\">
      <h3 class=\"card-header\">
        <i class=\"material-icons\">info_outline</i> ";
        // line 147
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Mail configuration", [], "Admin.Advparameters.Feature"), "html", null, true);
        echo "
      </h3>
      <div class=\"card-block\">
        <div class=\"card-text\">
          ";
        // line 151
        if ($this->getAttribute(($context["system"] ?? null), "isNativePHPmail", [])) {
            // line 152
            echo "            <p>
              <strong>";
            // line 153
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Mail method:", [], "Admin.Advparameters.Feature"), "html", null, true);
            echo "</strong> ";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("You are using /usr/sbin/sendmail", [], "Admin.Advparameters.Feature"), "html", null, true);
            echo "
            </p>
          ";
        } else {
            // line 156
            echo "            <p>
              <strong>";
            // line 157
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Mail method:", [], "Admin.Advparameters.Feature"), "html", null, true);
            echo "</strong> ";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("You are using your own SMTP parameters.", [], "Admin.Advparameters.Feature"), "html", null, true);
            echo "
            </p>
            <p>
              <strong>";
            // line 160
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("SMTP server:", [], "Admin.Advparameters.Feature"), "html", null, true);
            echo "</strong> ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["system"] ?? null), "smtp", []), "server", []), "html", null, true);
            echo "
            </p>
            <p>
              <strong>";
            // line 163
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("SMTP username:", [], "Admin.Advparameters.Feature"), "html", null, true);
            echo "</strong>
              ";
            // line 164
            if ( !twig_test_empty($this->getAttribute($this->getAttribute(($context["system"] ?? null), "smtp", []), "user", []))) {
                // line 165
                echo "                ";
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Defined", [], "Admin.Advparameters.Feature"), "html", null, true);
                echo "
              ";
            } else {
                // line 167
                echo "                <span style=\"color:red;\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Not defined", [], "Admin.Advparameters.Feature"), "html", null, true);
                echo "</span>
              ";
            }
            // line 169
            echo "            </p>
            <p>
              <strong>";
            // line 171
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("SMTP password:", [], "Admin.Advparameters.Feature"), "html", null, true);
            echo "</strong>
              ";
            // line 172
            if ( !twig_test_empty($this->getAttribute($this->getAttribute(($context["system"] ?? null), "smtp", []), "password", []))) {
                // line 173
                echo "                ";
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Defined", [], "Admin.Advparameters.Feature"), "html", null, true);
                echo "
              ";
            } else {
                // line 175
                echo "                <span style=\"color:red;\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Not defined", [], "Admin.Advparameters.Feature"), "html", null, true);
                echo "</span>
              ";
            }
            // line 177
            echo "            </p>
            <p>
              <strong>";
            // line 179
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Encryption:", [], "Admin.Advparameters.Feature"), "html", null, true);
            echo "</strong> ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["system"] ?? null), "smtp", []), "encryption", []), "html", null, true);
            echo "
            </p>
            <p>
              <strong>";
            // line 182
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("SMTP port:", [], "Admin.Advparameters.Feature"), "html", null, true);
            echo "</strong> ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["system"] ?? null), "smtp", []), "port", []), "html", null, true);
            echo "
            </p>
          ";
        }
        // line 185
        echo "        </div>
      </div>
    </div>

    <div class=\"card\">
      <h3 class=\"card-header\">
        <i class=\"material-icons\">info_outline</i> ";
        // line 191
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Your information", [], "Admin.Advparameters.Feature"), "html", null, true);
        echo "
      </h3>
      <div class=\"card-block\">
        <div class=\"card-text\">
          <p>
            <strong>";
        // line 196
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Your web browser:", [], "Admin.Advparameters.Feature"), "html", null, true);
        echo "</strong> ";
        echo twig_escape_filter($this->env, ($context["userAgent"] ?? null), "html", null, true);
        echo "
          </p>
        </div>
      </div>
    </div>

    <div class=\"card\" id=\"checkConfiguration\">
      <h3 class=\"card-header\">
        <i class=\"material-icons\">info_outline</i> ";
        // line 204
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Check your configuration", [], "Admin.Advparameters.Feature"), "html", null, true);
        echo "
      </h3>
      <div class=\"card-block\">
        <div class=\"card-text\">
          ";
        // line 208
        if (($this->getAttribute(($context["requirements"] ?? null), "failRequired", []) == false)) {
            // line 209
            echo "            <p>
              <strong>";
            // line 210
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Required parameters:", [], "Admin.Advparameters.Feature"), "html", null, true);
            echo "</strong>
              <span class=\"text-success\">";
            // line 211
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("OK", [], "Admin.Advparameters.Notification"), "html", null, true);
            echo "</span>
            </p>
          ";
        } else {
            // line 214
            echo "            <p>
              <strong>";
            // line 215
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Required parameters:", [], "Admin.Advparameters.Feature"), "html", null, true);
            echo "</strong>
              <span class=\"text-danger\">";
            // line 216
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Please fix the following error(s)", [], "Admin.Advparameters.Notification"), "html", null, true);
            echo "</span>
            </p>
            <ul>
              ";
            // line 219
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["requirements"] ?? null), "testsRequired", []));
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                // line 220
                echo "                ";
                if (("fail" == $context["value"])) {
                    // line 221
                    echo "                  <li>";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["requirements"] ?? null), "testsErrors", []), $context["key"], [], "array"), "html", null, true);
                    echo "</li>
                ";
                }
                // line 223
                echo "              ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 224
            echo "            </ul>
          ";
        }
        // line 226
        echo "          ";
        if ($this->getAttribute(($context["requirements"] ?? null), "failOptional", [], "any", true, true)) {
            // line 227
            echo "            ";
            if (($this->getAttribute(($context["requirements"] ?? null), "failOptional", []) == false)) {
                // line 228
                echo "              <p>
                <strong>";
                // line 229
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Optional parameters:", [], "Admin.Advparameters.Feature"), "html", null, true);
                echo "</strong>
                <span class=\"text-success\">";
                // line 230
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("OK", [], "Admin.Advparameters.Notification"), "html", null, true);
                echo "</span>
              </p>
            ";
            } else {
                // line 233
                echo "              <p>
                <strong>";
                // line 234
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Optional parameters:", [], "Admin.Advparameters.Feature"), "html", null, true);
                echo "</strong>
                <span class=\"text-danger\">";
                // line 235
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Please fix the following error(s)", [], "Admin.Advparameters.Notification"), "html", null, true);
                echo "</span>
              </p>
              <ul>
                ";
                // line 238
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["requirements"] ?? null), "testsOptional", []));
                foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                    // line 239
                    echo "                  ";
                    if (("fail" == $context["value"])) {
                        // line 240
                        echo "                    <li>";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["requirements"] ?? null), "testsErrors", []), $context["key"], [], "array"), "html", null, true);
                        echo "</li>
                  ";
                    }
                    // line 242
                    echo "                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 243
                echo "              </ul>
            ";
            }
            // line 245
            echo "          ";
        }
        // line 246
        echo "        </div>
      </div>
    </div>
  </div>
</div>
";
        // line 251
        if ($this->getAttribute(($context["system"] ?? null), "notHostMode", [])) {
            // line 252
            echo "  <div class=\"card\">
    <h3 class=\"card-header\">
      <i class=\"material-icons\">info_outline</i> ";
            // line 254
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("List of changed files", [], "Admin.Advparameters.Feature"), "html", null, true);
            echo "
    </h3>
    <div class=\"card-block\">
      <div class=\"card-text\" id=\"changedFiles\">
        <i class=\"material-icons\">loop</i> ";
            // line 258
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Checking files...", [], "Admin.Advparameters.Notification"), "html", null, true);
            echo "
      </div>
    </div>
  </div>
";
        }
        // line 263
        if ($this->getAttribute(($context["system"] ?? null), "notHostMode", [])) {
            // line 264
            echo "  <script>
    \$(document).ready(function()
    {
      var translations = {
        missing: '";
            // line 268
            echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Missing files", [], "Admin.Advparameters.Notification"), "js"), "html", null, true);
            echo "',
        updated: '";
            // line 269
            echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Updated files", [], "Admin.Advparameters.Notification"), "js"), "html", null, true);
            echo "',
        changesDetected: '";
            // line 270
            echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Changed/missing files have been detected.", [], "Admin.Advparameters.Notification"), "js"), "html", null, true);
            echo "',
        noChangeDetected: '";
            // line 271
            echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("No change has been detected in your files.", [], "Admin.Advparameters.Notification"), "js"), "html", null, true);
            echo "'
      };

      \$.ajax({
        type: 'POST',
        url: '";
            // line 276
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_system_information_check_files");
            echo "',
        data: {},
        dataType: 'json',
        success: function(json)
        {
          var tab = {
            'missing': translations.missing,
            'updated': translations.updated,
          };

          if (json.missing.length || json.updated.length) {
            \$('#changedFiles').html('<div class=\"alert alert-warning\" role=\"alert\"><p class=\"alert-text\">' + translations.changesDetected + '</p></div>');
          } else {
            \$('#changedFiles').html('<div class=\"alert alert-success\" role=\"alert\"><p class=\"alert-text\">' + translations.noChangeDetected + '</p></div>');
          }

          \$.each(tab, function(key, lang) {
            if (json[key].length) {
              var html = \$('<ul>').attr('id', key+'_files');
              \$(json[key]).each(function(key, file) {
                html.append(\$('<li>').html(file))
              });
              \$('#changedFiles')
                .append(\$('<h4>').html(lang+' ('+json[key].length+')'))
                .append(html);
            }
          });
        }
      });
    });
  </script>
";
        }
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Configure/AdvancedParameters/system_information.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  594 => 276,  586 => 271,  582 => 270,  578 => 269,  574 => 268,  568 => 264,  566 => 263,  558 => 258,  551 => 254,  547 => 252,  545 => 251,  538 => 246,  535 => 245,  531 => 243,  525 => 242,  519 => 240,  516 => 239,  512 => 238,  506 => 235,  502 => 234,  499 => 233,  493 => 230,  489 => 229,  486 => 228,  483 => 227,  480 => 226,  476 => 224,  470 => 223,  464 => 221,  461 => 220,  457 => 219,  451 => 216,  447 => 215,  444 => 214,  438 => 211,  434 => 210,  431 => 209,  429 => 208,  422 => 204,  409 => 196,  401 => 191,  393 => 185,  385 => 182,  377 => 179,  373 => 177,  367 => 175,  361 => 173,  359 => 172,  355 => 171,  351 => 169,  345 => 167,  339 => 165,  337 => 164,  333 => 163,  325 => 160,  317 => 157,  314 => 156,  306 => 153,  303 => 152,  301 => 151,  294 => 147,  281 => 139,  273 => 136,  265 => 133,  257 => 130,  249 => 125,  243 => 121,  236 => 116,  227 => 114,  223 => 113,  215 => 108,  202 => 100,  194 => 97,  186 => 94,  178 => 91,  170 => 88,  162 => 85,  154 => 82,  146 => 77,  138 => 71,  132 => 69,  130 => 68,  123 => 66,  115 => 63,  107 => 60,  99 => 57,  91 => 54,  88 => 53,  80 => 50,  77 => 49,  75 => 48,  68 => 44,  64 => 42,  62 => 41,  55 => 37,  48 => 33,  42 => 29,  39 => 28,  29 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Configure/AdvancedParameters/system_information.html.twig", "/var/www/html/src/PrestaShopBundle/Resources/views/Admin/Configure/AdvancedParameters/system_information.html.twig");
    }
}
