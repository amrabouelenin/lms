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

/* core/themes/seven/templates/status-report-general-info.html.twig */
class __TwigTemplate_d5323a815a8c6255afa5a561e9dd42bdca826ba27792c03e29430a051d05a92d extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["if" => 40];
        $filters = ["t" => 33, "escape" => 39];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['t', 'escape'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->getSourceContext());

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 32
        echo "<div class=\"system-status-general-info\">
  <h2 class=\"system-status-general-info__header\">";
        // line 33
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("General System Information"));
        echo "</h2>
  <div class=\"system-status-general-info__items\">
    <div class=\"system-status-general-info__item\">
      <span class=\"system-status-general-info__item-icon system-status-general-info__item-icon--d8\"></span>
      <div class=\"system-status-general-info__item-details\">
        <h3 class=\"system-status-general-info__item-title\">";
        // line 38
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Drupal Version"));
        echo "</h3>
        ";
        // line 39
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["drupal"] ?? null), "value", [])), "html", null, true);
        echo "
        ";
        // line 40
        if ($this->getAttribute(($context["drupal"] ?? null), "description", [])) {
            // line 41
            echo "          <div class=\"description\">";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["drupal"] ?? null), "description", [])), "html", null, true);
            echo "</div>
        ";
        }
        // line 43
        echo "      </div>
    </div>
    <div class=\"system-status-general-info__item\">
      <span class=\"system-status-general-info__item-icon system-status-general-info__item-icon--clock\"></span>
      <div class=\"system-status-general-info__item-details\">
        <h3 class=\"system-status-general-info__item-title\">";
        // line 48
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Last Cron Run"));
        echo "</h3>
        ";
        // line 49
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["cron"] ?? null), "value", [])), "html", null, true);
        echo "
        ";
        // line 50
        if ($this->getAttribute(($context["cron"] ?? null), "run_cron", [])) {
            // line 51
            echo "          <div class=\"system-status-general-info__run-cron\">";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["cron"] ?? null), "run_cron", [])), "html", null, true);
            echo "</div>
        ";
        }
        // line 53
        echo "        ";
        if ($this->getAttribute(($context["cron"] ?? null), "description", [])) {
            // line 54
            echo "          <div class=\"system-status-general-info__description\">";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["cron"] ?? null), "description", [])), "html", null, true);
            echo "</div>
        ";
        }
        // line 56
        echo "      </div>
    </div>
    <div class=\"system-status-general-info__item\">
      <span class=\"system-status-general-info__item-icon system-status-general-info__item-icon--server\"></span>
      <div class=\"system-status-general-info__item-details\">
        <h3 class=\"system-status-general-info__item-title\">";
        // line 61
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Web Server"));
        echo "</h3>
        ";
        // line 62
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["webserver"] ?? null), "value", [])), "html", null, true);
        echo "
        ";
        // line 63
        if ($this->getAttribute(($context["webserver"] ?? null), "description", [])) {
            // line 64
            echo "          <div class=\"description\">";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["webserver"] ?? null), "description", [])), "html", null, true);
            echo "</div>
        ";
        }
        // line 66
        echo "      </div>
    </div>
    <div class=\"system-status-general-info__item\">
      <span class=\"system-status-general-info__item-icon system-status-general-info__item-icon--php\"></span>
      <div class=\"system-status-general-info__item-details\">
        <h3 class=\"system-status-general-info__item-title\">";
        // line 71
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("PHP"));
        echo "</h3>
        <h4 class=\"system-status-general-info__sub-item-title\">";
        // line 72
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Version"));
        echo "</h4>";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["php"] ?? null), "value", [])), "html", null, true);
        echo "
        ";
        // line 73
        if ($this->getAttribute(($context["php"] ?? null), "description", [])) {
            // line 74
            echo "          <div class=\"description\">";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["php"] ?? null), "description", [])), "html", null, true);
            echo "</div>
        ";
        }
        // line 76
        echo "
        <h4 class=\"system-status-general-info__sub-item-title\">";
        // line 77
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Memory limit"));
        echo "</h4>";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["php_memory_limit"] ?? null), "value", [])), "html", null, true);
        echo "
        ";
        // line 78
        if ($this->getAttribute(($context["php_memory_limit"] ?? null), "description", [])) {
            // line 79
            echo "          <div class=\"description\">";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["php_memory_limit"] ?? null), "description", [])), "html", null, true);
            echo "</div>
        ";
        }
        // line 81
        echo "      </div>
    </div>
    <div class=\"system-status-general-info__item\">
      <span class=\"system-status-general-info__item-icon system-status-general-info__item-icon--database\"></span>
      <div class=\"system-status-general-info__item-details\">
        <h3 class=\"system-status-general-info__item-title\">";
        // line 86
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Database"));
        echo "</h3>
        <h4 class=\"system-status-general-info__sub-item-title\">";
        // line 87
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Version"));
        echo "</h4>";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["database_system_version"] ?? null), "value", [])), "html", null, true);
        echo "
        ";
        // line 88
        if ($this->getAttribute(($context["database_system_version"] ?? null), "description", [])) {
            // line 89
            echo "          <div class=\"description\">";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["database_system_version"] ?? null), "description", [])), "html", null, true);
            echo "</div>
        ";
        }
        // line 91
        echo "
        <h4 class=\"system-status-general-info__sub-item-title\">";
        // line 92
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("System"));
        echo "</h4>";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["database_system"] ?? null), "value", [])), "html", null, true);
        echo "
        ";
        // line 93
        if ($this->getAttribute(($context["database_system"] ?? null), "description", [])) {
            // line 94
            echo "          <div class=\"description\">";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["database_system"] ?? null), "description", [])), "html", null, true);
            echo "</div>
        ";
        }
        // line 96
        echo "      </div>
    </div>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "core/themes/seven/templates/status-report-general-info.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  221 => 96,  215 => 94,  213 => 93,  207 => 92,  204 => 91,  198 => 89,  196 => 88,  190 => 87,  186 => 86,  179 => 81,  173 => 79,  171 => 78,  165 => 77,  162 => 76,  156 => 74,  154 => 73,  148 => 72,  144 => 71,  137 => 66,  131 => 64,  129 => 63,  125 => 62,  121 => 61,  114 => 56,  108 => 54,  105 => 53,  99 => 51,  97 => 50,  93 => 49,  89 => 48,  82 => 43,  76 => 41,  74 => 40,  70 => 39,  66 => 38,  58 => 33,  55 => 32,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Theme override for status report general info.
 *
 * Available variables:
 * - drupal: The status of Drupal installation:
 *   - value: The current status of Drupal installation.
 *   - description: The description for current status of Drupal installation.
 * - cron: The status of cron:
 *   - value: The current status of cron.
 *   - description: The description for current status of cron.
 *   - cron.run_cron: An array to render a button for running cron.
 * - database_system: The status of database system:
 *   - value: The current status of database sytem.
 *   - description: The description for current status of cron.
 * - database_system_version: The info about current database version:
 *   - value: The current version of database.
 *   - description: The description for current version of database.
 * - php: The current version of PHP:
 *   - value: The status of currently installed PHP version.
 *   - description: The description for current installed PHP version.
 * - php_memory_limit: The info about current PHP memory limit:
 *   - value: The status of currently set PHP memory limit.
 *   - description: The description for currently set PHP memory limit.
 * - webserver: The info about currently installed web server:
 *   - value: The status of currently installed web server.
 *   - description: The description for the status of currently installed web
 *     server.
 */
#}
<div class=\"system-status-general-info\">
  <h2 class=\"system-status-general-info__header\">{{ 'General System Information'|t }}</h2>
  <div class=\"system-status-general-info__items\">
    <div class=\"system-status-general-info__item\">
      <span class=\"system-status-general-info__item-icon system-status-general-info__item-icon--d8\"></span>
      <div class=\"system-status-general-info__item-details\">
        <h3 class=\"system-status-general-info__item-title\">{{ 'Drupal Version'|t }}</h3>
        {{ drupal.value }}
        {% if drupal.description %}
          <div class=\"description\">{{ drupal.description }}</div>
        {% endif %}
      </div>
    </div>
    <div class=\"system-status-general-info__item\">
      <span class=\"system-status-general-info__item-icon system-status-general-info__item-icon--clock\"></span>
      <div class=\"system-status-general-info__item-details\">
        <h3 class=\"system-status-general-info__item-title\">{{ 'Last Cron Run'|t }}</h3>
        {{ cron.value }}
        {% if cron.run_cron %}
          <div class=\"system-status-general-info__run-cron\">{{ cron.run_cron }}</div>
        {% endif %}
        {% if cron.description %}
          <div class=\"system-status-general-info__description\">{{ cron.description }}</div>
        {% endif %}
      </div>
    </div>
    <div class=\"system-status-general-info__item\">
      <span class=\"system-status-general-info__item-icon system-status-general-info__item-icon--server\"></span>
      <div class=\"system-status-general-info__item-details\">
        <h3 class=\"system-status-general-info__item-title\">{{ 'Web Server'|t }}</h3>
        {{ webserver.value }}
        {% if webserver.description %}
          <div class=\"description\">{{ webserver.description }}</div>
        {% endif %}
      </div>
    </div>
    <div class=\"system-status-general-info__item\">
      <span class=\"system-status-general-info__item-icon system-status-general-info__item-icon--php\"></span>
      <div class=\"system-status-general-info__item-details\">
        <h3 class=\"system-status-general-info__item-title\">{{ 'PHP'|t }}</h3>
        <h4 class=\"system-status-general-info__sub-item-title\">{{ 'Version'|t }}</h4>{{ php.value }}
        {% if php.description %}
          <div class=\"description\">{{ php.description }}</div>
        {% endif %}

        <h4 class=\"system-status-general-info__sub-item-title\">{{ 'Memory limit'|t }}</h4>{{ php_memory_limit.value }}
        {% if php_memory_limit.description %}
          <div class=\"description\">{{ php_memory_limit.description }}</div>
        {% endif %}
      </div>
    </div>
    <div class=\"system-status-general-info__item\">
      <span class=\"system-status-general-info__item-icon system-status-general-info__item-icon--database\"></span>
      <div class=\"system-status-general-info__item-details\">
        <h3 class=\"system-status-general-info__item-title\">{{ 'Database'|t }}</h3>
        <h4 class=\"system-status-general-info__sub-item-title\">{{ 'Version'|t }}</h4>{{ database_system_version.value }}
        {% if database_system_version.description %}
          <div class=\"description\">{{ database_system_version.description }}</div>
        {% endif %}

        <h4 class=\"system-status-general-info__sub-item-title\">{{ 'System'|t }}</h4>{{ database_system.value }}
        {% if database_system.description %}
          <div class=\"description\">{{ database_system.description }}</div>
        {% endif %}
      </div>
    </div>
  </div>
</div>
", "core/themes/seven/templates/status-report-general-info.html.twig", "/var/www/html/motc_qdgtp/core/themes/seven/templates/status-report-general-info.html.twig");
    }
}
