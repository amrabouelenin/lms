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

/* modules/field_group/templates/field-group-accordion-item.html.twig */
class __TwigTemplate_6a4596ee997cef05b76e5ace2f756d5806bc97da037b6614bacf85550326d947 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["set" => 19, "if" => 37];
        $filters = ["escape" => 33];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['escape'],
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
        // line 19
        $context["label_classes"] = [0 => "field-group-format-toggler", 1 => "accordion-item", 2 => ((        // line 22
($context["open"] ?? null)) ? ("field-group-accordion-active") : (""))];
        // line 26
        echo "
";
        // line 28
        $context["classes"] = [0 => "field-group-format-wrapper"];
        // line 32
        echo "
<h3 ";
        // line 33
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["label_attributes"] ?? null), "addClass", [0 => ($context["label_classes"] ?? null)], "method")), "html", null, true);
        echo ">
  <a href=\"#\">";
        // line 34
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null)), "html", null, true);
        echo "</a>
</h3>
<div ";
        // line 36
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method")), "html", null, true);
        echo ">
  ";
        // line 37
        if (($context["description"] ?? null)) {
            echo "<div class=\"description\"></div>";
        }
        // line 38
        echo "  ";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["children"] ?? null)), "html", null, true);
        echo "
</div>";
    }

    public function getTemplateName()
    {
        return "modules/field_group/templates/field-group-accordion-item.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  83 => 38,  79 => 37,  75 => 36,  70 => 34,  66 => 33,  63 => 32,  61 => 28,  58 => 26,  56 => 22,  55 => 19,);
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
 * Default theme implementation for a fieldgroup accordion item.
 *
 * Available variables:
 * - title: Title of the group.
 * - children: The children of the group.
 * - label_attributes: A list of HTML attributes for the label.
 * - attributes: A list of HTML attributes for the group wrapper.
 *
 * @see template_preprocess_field_group_accordion()
 *
 * @ingroup themeable
 */
#}
{%

  set label_classes = [
    'field-group-format-toggler',
    'accordion-item',
    open ? 'field-group-accordion-active',
  ]

%}

{%
  set classes = [
    'field-group-format-wrapper',
  ]
%}

<h3 {{ label_attributes.addClass(label_classes) }}>
  <a href=\"#\">{{ title }}</a>
</h3>
<div {{ attributes.addClass(classes) }}>
  {% if description %}<div class=\"description\"></div>{% endif %}
  {{children}}
</div>", "modules/field_group/templates/field-group-accordion-item.html.twig", "/var/www/html/motc_qdgtp/modules/field_group/templates/field-group-accordion-item.html.twig");
    }
}
