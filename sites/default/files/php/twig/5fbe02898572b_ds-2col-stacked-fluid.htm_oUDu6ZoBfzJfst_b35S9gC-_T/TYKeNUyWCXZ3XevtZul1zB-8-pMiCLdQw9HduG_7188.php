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

/* modules/ds/templates/ds-2col-stacked-fluid.html.twig */
class __TwigTemplate_07e75f5735f0fc08ddda6f61901defcd974c828c56f972443aeaec17b884a6b5 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["set" => 24, "if" => 27];
        $filters = ["render" => 24, "escape" => 31];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['render', 'escape'],
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
        // line 23
        echo "
";
        // line 24
        $context["left"] = $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->sandbox->ensureToStringAllowed(($context["left"] ?? null)));
        // line 25
        $context["right"] = $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->sandbox->ensureToStringAllowed(($context["right"] ?? null)));
        // line 26
        echo "
";
        // line 27
        if (((($context["left"] ?? null) &&  !($context["right"] ?? null)) || (($context["right"] ?? null) &&  !($context["left"] ?? null)))) {
            // line 28
            echo "  ";
            $context["layout_class"] = "group-one-column";
        }
        // line 30
        echo "
<";
        // line 31
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["outer_wrapper"] ?? null)), "html", null, true);
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["attributes"] ?? null), "addClass", [0 => ($context["layout_class"] ?? null), 1 => "ds-2col-stacked-fluid", 2 => "clearfix"], "method")), "html", null, true);
        echo ">

  ";
        // line 33
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["title_suffix"] ?? null), "contextual_links", [])), "html", null, true);
        echo "

  <";
        // line 35
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["header_wrapper"] ?? null)), "html", null, true);
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["header_attributes"] ?? null), "addClass", [0 => "group-header"], "method")), "html", null, true);
        echo ">
    ";
        // line 36
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["header"] ?? null)), "html", null, true);
        echo "
  </";
        // line 37
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["header_wrapper"] ?? null)), "html", null, true);
        echo ">

  ";
        // line 39
        if (($context["left"] ?? null)) {
            // line 40
            echo "    <";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["left_wrapper"] ?? null)), "html", null, true);
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["left_attributes"] ?? null), "addClass", [0 => "group-left"], "method")), "html", null, true);
            echo ">
      ";
            // line 41
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["left"] ?? null)), "html", null, true);
            echo "
    </";
            // line 42
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["left_wrapper"] ?? null)), "html", null, true);
            echo ">
  ";
        }
        // line 44
        echo "
  ";
        // line 45
        if (($context["right"] ?? null)) {
            // line 46
            echo "    <";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["right_wrapper"] ?? null)), "html", null, true);
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["right_attributes"] ?? null), "addClass", [0 => "group-right"], "method")), "html", null, true);
            echo ">
      ";
            // line 47
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["right"] ?? null)), "html", null, true);
            echo "
    </";
            // line 48
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["right_wrapper"] ?? null)), "html", null, true);
            echo ">
  ";
        }
        // line 50
        echo "
  <";
        // line 51
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_wrapper"] ?? null)), "html", null, true);
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["footer_attributes"] ?? null), "addClass", [0 => "group-footer"], "method")), "html", null, true);
        echo ">
    ";
        // line 52
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer"] ?? null)), "html", null, true);
        echo "
  </";
        // line 53
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_wrapper"] ?? null)), "html", null, true);
        echo ">

</";
        // line 55
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["outer_wrapper"] ?? null)), "html", null, true);
        echo ">
";
    }

    public function getTemplateName()
    {
        return "modules/ds/templates/ds-2col-stacked-fluid.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  153 => 55,  148 => 53,  144 => 52,  139 => 51,  136 => 50,  131 => 48,  127 => 47,  121 => 46,  119 => 45,  116 => 44,  111 => 42,  107 => 41,  101 => 40,  99 => 39,  94 => 37,  90 => 36,  85 => 35,  80 => 33,  74 => 31,  71 => 30,  67 => 28,  65 => 27,  62 => 26,  60 => 25,  58 => 24,  55 => 23,);
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
 * Display Suite fluid 2 column stacked template.
 *
 * Available variables:
 * - outer_wrapper: outer wrapper element
 * - header_wrapper: wrapper element around header region
 * - left_wrapper: wrapper element around left region
 * - right_wrapper: wrapper element around right region
 * - footer_wrapper: wrapper element around footer region
 * - attributes: layout attributes
 * - header_attributes: attributes for header region
 * - left_attributes: attributes for left region
 * - right_attributes: attributes for right region
 * - footer_attributes: attributes for footer region
 * - header: content of header region
 * - left: content of left region
 * - right: content of right region
 * - footer: content of footer region
 */
#}

{% set left = left|render %}
{% set right = right|render %}

{% if (left and not right) or (right and not left) %}
  {% set layout_class = 'group-one-column' %}
{% endif %}

<{{ outer_wrapper }}{{ attributes.addClass(layout_class, 'ds-2col-stacked-fluid', 'clearfix') }}>

  {{ title_suffix.contextual_links }}

  <{{ header_wrapper }}{{ header_attributes.addClass('group-header') }}>
    {{ header }}
  </{{ header_wrapper }}>

  {% if left %}
    <{{ left_wrapper }}{{ left_attributes.addClass('group-left') }}>
      {{ left }}
    </{{ left_wrapper }}>
  {% endif %}

  {% if right %}
    <{{ right_wrapper }}{{ right_attributes.addClass('group-right') }}>
      {{ right }}
    </{{ right_wrapper }}>
  {% endif %}

  <{{ footer_wrapper }}{{ footer_attributes.addClass('group-footer') }}>
    {{ footer }}
  </{{ footer_wrapper }}>

</{{ outer_wrapper }}>
", "modules/ds/templates/ds-2col-stacked-fluid.html.twig", "/var/www/html/motc_qdgtp/modules/ds/templates/ds-2col-stacked-fluid.html.twig");
    }
}
