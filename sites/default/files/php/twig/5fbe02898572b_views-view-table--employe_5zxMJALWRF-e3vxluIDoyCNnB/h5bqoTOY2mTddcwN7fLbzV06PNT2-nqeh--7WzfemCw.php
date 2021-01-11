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

/* themes/qdg_barrio/templates/views-view-table--employee-accepted-courses-schedules--block-1.html.twig */
class __TwigTemplate_4bf072e20f99c1ee0cbf3fd78cb92ad55aa23e6412227527f076160022891f38 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["if" => 45, "set" => 49, "for" => 81];
        $filters = ["escape" => 58, "merge" => 118];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['if', 'set', 'for'],
                ['escape', 'merge'],
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
        // line 36
        echo "
<p>
  <a class=\"stretched-link\" data-toggle=\"collapse\" href=\"#collapseExample\" role=\"button\" aria-expanded=\"false\" aria-controls=\"collapseExample\" style=\"margin: 15px;\">
    Show courses
  </a>
</p>
<div class=\"collapse\" id=\"collapseExample\">
  <div class=\"card card-body\">

    ";
        // line 45
        if (($context["responsive"] ?? null)) {
            // line 46
            echo "      <div class=\"table-responsive\">
    ";
        }
        // line 48
        echo "    ";
        // line 49
        $context["classes"] = [0 => "table", 1 => ((        // line 51
($context["bordered"] ?? null)) ? ("table-bordered") : ("")), 2 => ((        // line 52
($context["condensed"] ?? null)) ? ("table-condensed") : ("")), 3 => ((        // line 53
($context["hover"] ?? null)) ? ("table-hover") : ("")), 4 => ((        // line 54
($context["striped"] ?? null)) ? ("table-striped") : ("")), 5 => ((        // line 55
($context["sticky"] ?? null)) ? ("sticky-enabled") : (""))];
        // line 58
        echo "    <table";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method")), "html", null, true);
        echo ">
      ";
        // line 59
        if (($context["caption_needed"] ?? null)) {
            // line 60
            echo "        <caption>
          ";
            // line 61
            if (($context["caption"] ?? null)) {
                // line 62
                echo "            ";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["caption"] ?? null)), "html", null, true);
                echo "
          ";
            } else {
                // line 64
                echo "            ";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null)), "html", null, true);
                echo "
          ";
            }
            // line 66
            echo "          ";
            if (( !twig_test_empty(($context["summary"] ?? null)) ||  !twig_test_empty(($context["description"] ?? null)))) {
                // line 67
                echo "            <details>
              ";
                // line 68
                if ( !twig_test_empty(($context["summary"] ?? null))) {
                    // line 69
                    echo "                <summary>";
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["summary"] ?? null)), "html", null, true);
                    echo "</summary>
              ";
                }
                // line 71
                echo "              ";
                if ( !twig_test_empty(($context["description"] ?? null))) {
                    // line 72
                    echo "                ";
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["description"] ?? null)), "html", null, true);
                    echo "
              ";
                }
                // line 74
                echo "            </details>
          ";
            }
            // line 76
            echo "        </caption>
      ";
        }
        // line 78
        echo "      ";
        if (($context["header"] ?? null)) {
            // line 79
            echo "        <thead>
        <tr>
          ";
            // line 81
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["header"] ?? null));
            foreach ($context['_seq'] as $context["key"] => $context["column"]) {
                // line 82
                echo "            ";
                if ($this->getAttribute($context["column"], "default_classes", [])) {
                    // line 83
                    echo "              ";
                    // line 84
                    $context["column_classes"] = [0 => "views-field", 1 => ("views-field-" . $this->sandbox->ensureToStringAllowed($this->getAttribute(                    // line 86
($context["fields"] ?? null), $context["key"], [], "array")))];
                    // line 89
                    echo "            ";
                }
                // line 90
                echo "          <th";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($context["column"], "attributes", []), "addClass", [0 => ($context["column_classes"] ?? null)], "method"), "setAttribute", [0 => "scope", 1 => "col"], "method")), "html", null, true);
                echo ">";
                // line 91
                if ($this->getAttribute($context["column"], "wrapper_element", [])) {
                    // line 92
                    echo "<";
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["column"], "wrapper_element", [])), "html", null, true);
                    echo ">";
                    // line 93
                    if ($this->getAttribute($context["column"], "url", [])) {
                        // line 94
                        echo "<a href=\"";
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["column"], "url", [])), "html", null, true);
                        echo "\" title=\"";
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["column"], "title", [])), "html", null, true);
                        echo "\">";
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["column"], "content", [])), "html", null, true);
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["column"], "sort_indicator", [])), "html", null, true);
                        echo "</a>";
                    } else {
                        // line 96
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["column"], "content", [])), "html", null, true);
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["column"], "sort_indicator", [])), "html", null, true);
                    }
                    // line 98
                    echo "</";
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["column"], "wrapper_element", [])), "html", null, true);
                    echo ">";
                } else {
                    // line 100
                    if ($this->getAttribute($context["column"], "url", [])) {
                        // line 101
                        echo "<a href=\"";
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["column"], "url", [])), "html", null, true);
                        echo "\" title=\"";
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["column"], "title", [])), "html", null, true);
                        echo "\">";
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["column"], "content", [])), "html", null, true);
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["column"], "sort_indicator", [])), "html", null, true);
                        echo "</a>";
                    } else {
                        // line 103
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["column"], "content", [])), "html", null, true);
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["column"], "sort_indicator", [])), "html", null, true);
                    }
                }
                // line 106
                echo "</th>
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['column'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 108
            echo "        </tr>
        </thead>
      ";
        }
        // line 111
        echo "      <tbody>
      ";
        // line 112
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["rows"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 113
            echo "        <tr";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["row"], "attributes", [])), "html", null, true);
            echo ">
          ";
            // line 114
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["row"], "columns", []));
            foreach ($context['_seq'] as $context["key"] => $context["column"]) {
                // line 115
                echo "            ";
                if ($this->getAttribute($context["column"], "default_classes", [])) {
                    // line 116
                    echo "              ";
                    $context["column_classes"] = [0 => "views-field"];
                    // line 117
                    echo "              ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["column"], "fields", []));
                    foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
                        // line 118
                        echo "                ";
                        $context["column_classes"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["column_classes"] ?? null)), [0 => ("views-field-" . $this->sandbox->ensureToStringAllowed($context["field"]))]);
                        // line 119
                        echo "              ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 120
                    echo "            ";
                }
                // line 121
                echo "          <td";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($context["column"], "attributes", []), "addClass", [0 => ($context["column_classes"] ?? null)], "method")), "html", null, true);
                echo ">";
                // line 122
                if ($this->getAttribute($context["column"], "wrapper_element", [])) {
                    // line 123
                    echo "<";
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["column"], "wrapper_element", [])), "html", null, true);
                    echo ">
              ";
                    // line 124
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["column"], "content", []));
                    foreach ($context['_seq'] as $context["_key"] => $context["content"]) {
                        // line 125
                        echo "                ";
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["content"], "separator", [])), "html", null, true);
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["content"], "field_output", [])), "html", null, true);
                        echo "
              ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['content'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 127
                    echo "              </";
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["column"], "wrapper_element", [])), "html", null, true);
                    echo ">";
                } else {
                    // line 129
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["column"], "content", []));
                    foreach ($context['_seq'] as $context["_key"] => $context["content"]) {
                        // line 130
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["content"], "separator", [])), "html", null, true);
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["content"], "field_output", [])), "html", null, true);
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['content'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                }
                // line 133
                echo "            </td>
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['column'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 135
            echo "        </tr>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 137
        echo "      </tbody>
    </table>
    ";
        // line 139
        if (($context["responsive"] ?? null)) {
            // line 140
            echo "      </div>
    ";
        }
        // line 142
        echo "  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "themes/qdg_barrio/templates/views-view-table--employee-accepted-courses-schedules--block-1.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  323 => 142,  319 => 140,  317 => 139,  313 => 137,  306 => 135,  299 => 133,  291 => 130,  287 => 129,  282 => 127,  272 => 125,  268 => 124,  263 => 123,  261 => 122,  257 => 121,  254 => 120,  248 => 119,  245 => 118,  240 => 117,  237 => 116,  234 => 115,  230 => 114,  225 => 113,  221 => 112,  218 => 111,  213 => 108,  206 => 106,  201 => 103,  191 => 101,  189 => 100,  184 => 98,  180 => 96,  170 => 94,  168 => 93,  164 => 92,  162 => 91,  158 => 90,  155 => 89,  153 => 86,  152 => 84,  150 => 83,  147 => 82,  143 => 81,  139 => 79,  136 => 78,  132 => 76,  128 => 74,  122 => 72,  119 => 71,  113 => 69,  111 => 68,  108 => 67,  105 => 66,  99 => 64,  93 => 62,  91 => 61,  88 => 60,  86 => 59,  81 => 58,  79 => 55,  78 => 54,  77 => 53,  76 => 52,  75 => 51,  74 => 49,  72 => 48,  68 => 46,  66 => 45,  55 => 36,);
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
 * Default theme implementation for displaying a view as a table.
 *
 * Available variables:
 * - attributes: Remaining HTML attributes for the element.
 *   - class: HTML classes that can be used to style contextually through CSS.
 * - title : The title of this group of rows.
 * - header: The table header columns.
 *   - attributes: Remaining HTML attributes for the element.
 *   - content: HTML classes to apply to each header cell, indexed by
 *   the header's key.
 * - caption_needed: Is the caption tag needed.
 * - caption: The caption for this table.
 * - accessibility_description: Extended description for the table details.
 * - accessibility_summary: Summary for the table details.
 * - responsive: Whether or not to use the .table-responsive wrapper.
 * - rows: Table row items. Rows are keyed by row number.
 *   - attributes: HTML classes to apply to each row.
 *   - columns: Row column items. Columns are keyed by column number.
 *     - attributes: HTML classes to apply to each column.
 *     - content: The column content.
 * - bordered: Flag indicating whether or not the table should be bordered.
 * - condensed: Flag indicating whether or not the table should be condensed.
 * - hover: Flag indicating whether or not table rows should be hoverable.
 * - striped: Flag indicating whether or not table rows should be striped.
 * - responsive: Flag indicating whether or not the table should be wrapped to
 *   be responsive (using the Bootstrap Framework .table-responsive wrapper).
 *
 * @ingroup templates
 *
 * @see template_preprocess_views_view_table()
 */
#}

<p>
  <a class=\"stretched-link\" data-toggle=\"collapse\" href=\"#collapseExample\" role=\"button\" aria-expanded=\"false\" aria-controls=\"collapseExample\" style=\"margin: 15px;\">
    Show courses
  </a>
</p>
<div class=\"collapse\" id=\"collapseExample\">
  <div class=\"card card-body\">

    {% if responsive %}
      <div class=\"table-responsive\">
    {% endif %}
    {%
      set classes = [
        'table',
        bordered ? 'table-bordered',
        condensed ? 'table-condensed',
        hover ? 'table-hover',
        striped ? 'table-striped',
        sticky ? 'sticky-enabled',
      ]
    %}
    <table{{ attributes.addClass(classes) }}>
      {% if caption_needed %}
        <caption>
          {% if caption %}
            {{ caption }}
          {% else %}
            {{ title }}
          {% endif %}
          {% if (summary is not empty) or (description is not empty) %}
            <details>
              {% if summary is not empty %}
                <summary>{{ summary }}</summary>
              {% endif %}
              {% if description is not empty %}
                {{ description }}
              {% endif %}
            </details>
          {% endif %}
        </caption>
      {% endif %}
      {% if header %}
        <thead>
        <tr>
          {% for key, column in header %}
            {% if column.default_classes %}
              {%
              set column_classes = [
              'views-field',
              'views-field-' ~ fields[key],
              ]
              %}
            {% endif %}
          <th{{ column.attributes.addClass(column_classes).setAttribute('scope', 'col') }}>
            {%- if column.wrapper_element -%}
              <{{ column.wrapper_element }}>
              {%- if column.url -%}
                <a href=\"{{ column.url }}\" title=\"{{ column.title }}\">{{ column.content }}{{ column.sort_indicator }}</a>
              {%- else -%}
                {{ column.content }}{{ column.sort_indicator }}
              {%- endif -%}
              </{{ column.wrapper_element }}>
            {%- else -%}
              {%- if column.url -%}
                <a href=\"{{ column.url }}\" title=\"{{ column.title }}\">{{ column.content }}{{ column.sort_indicator }}</a>
              {%- else -%}
                {{- column.content }}{{ column.sort_indicator }}
              {%- endif -%}
            {%- endif -%}
            </th>
          {% endfor %}
        </tr>
        </thead>
      {% endif %}
      <tbody>
      {% for row in rows %}
        <tr{{ row.attributes }}>
          {% for key, column in row.columns %}
            {% if column.default_classes %}
              {% set column_classes = [ 'views-field' ] %}
              {% for field in column.fields %}
                {% set column_classes = column_classes|merge(['views-field-' ~ field]) %}
              {% endfor %}
            {% endif %}
          <td{{ column.attributes.addClass(column_classes) }}>
            {%- if column.wrapper_element -%}
              <{{ column.wrapper_element }}>
              {% for content in column.content %}
                {{ content.separator }}{{ content.field_output }}
              {% endfor %}
              </{{ column.wrapper_element }}>
            {%- else -%}
              {% for content in column.content %}
                {{- content.separator }}{{ content.field_output -}}
              {% endfor %}
            {%- endif %}
            </td>
          {% endfor %}
        </tr>
      {% endfor %}
      </tbody>
    </table>
    {% if responsive %}
      </div>
    {% endif %}
  </div>
</div>
", "themes/qdg_barrio/templates/views-view-table--employee-accepted-courses-schedules--block-1.html.twig", "/var/www/html/motc_qdgtp/themes/qdg_barrio/templates/views-view-table--employee-accepted-courses-schedules--block-1.html.twig");
    }
}
