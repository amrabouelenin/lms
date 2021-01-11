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

/* themes/bootstrap_barrio/templates/views/views-mini-pager.html.twig */
class __TwigTemplate_6332da3618bccc45890fea77553c981a34f331e32007363a38630d15e075dc55 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["if" => 14, "trans" => 29];
        $filters = ["t" => 16, "escape" => 20, "without" => 20, "default" => 22];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['if', 'trans'],
                ['t', 'escape', 'without', 'default'],
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
        // line 1
        echo "    ";
        // line 14
        echo "    ";
        if (($this->getAttribute(($context["items"] ?? null), "previous", []) || $this->getAttribute(($context["items"] ?? null), "next", []))) {
            // line 15
            echo "      <nav aria-label=\"Page navigation\">
        <h4 class=\"visually-hidden\">";
            // line 16
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Pagination"));
            echo "</h4>
        <ul class=\"js-pager__items pagination\">
          ";
            // line 18
            if ($this->getAttribute(($context["items"] ?? null), "previous", [])) {
                // line 19
                echo "            <li class=\"page-item\">
              <a class=\"page-link\" href=\"";
                // line 20
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["items"] ?? null), "previous", []), "href", [])), "html", null, true);
                echo "\" title=\"";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Go to previous page"));
                echo "\" rel=\"prev\"";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->withoutFilter($this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["items"] ?? null), "previous", []), "attributes", [])), "href", "title", "rel"), "html", null, true);
                echo ">
                <span class=\"visually-hidden\">";
                // line 21
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Previous page"));
                echo "</span>
                <span aria-hidden=\"true\">";
                // line 22
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, (($this->getAttribute($this->getAttribute(($context["items"] ?? null), "previous", [], "any", false, true), "text", [], "any", true, true)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["items"] ?? null), "previous", [], "any", false, true), "text", [])), t("‹‹"))) : (t("‹‹"))), "html", null, true);
                echo "</span>
              </a>
            </li>
          ";
            }
            // line 26
            echo "          ";
            if ($this->getAttribute(($context["items"] ?? null), "current", [])) {
                // line 27
                echo "            <li class=\"page-item\">
              <span class=\"page-link\">
                ";
                // line 29
                echo t("Page @items.current", array("@items.current" => $this->getAttribute(                // line 30
($context["items"] ?? null), "current", []), ));
                // line 32
                echo "              </span>
            </li>
          ";
            }
            // line 35
            echo "          ";
            if ($this->getAttribute(($context["items"] ?? null), "next", [])) {
                // line 36
                echo "            <li class=\"page-item\">
              <a class=\"page-link\" href=\"";
                // line 37
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["items"] ?? null), "next", []), "href", [])), "html", null, true);
                echo "\" title=\"";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Go to next page"));
                echo "\" rel=\"next\"";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->withoutFilter($this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["items"] ?? null), "next", []), "attributes", [])), "href", "title", "rel"), "html", null, true);
                echo ">
                <span class=\"visually-hidden\">";
                // line 38
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Next page"));
                echo "</span>
                <span aria-hidden=\"true\">";
                // line 39
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, (($this->getAttribute($this->getAttribute(($context["items"] ?? null), "next", [], "any", false, true), "text", [], "any", true, true)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["items"] ?? null), "next", [], "any", false, true), "text", [])), t("››"))) : (t("››"))), "html", null, true);
                echo "</span>
              </a>
            </li>
          ";
            }
            // line 43
            echo "        </ul>
      </nav>
    ";
        }
    }

    public function getTemplateName()
    {
        return "themes/bootstrap_barrio/templates/views/views-mini-pager.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  132 => 43,  125 => 39,  121 => 38,  113 => 37,  110 => 36,  107 => 35,  102 => 32,  100 => 30,  99 => 29,  95 => 27,  92 => 26,  85 => 22,  81 => 21,  73 => 20,  70 => 19,  68 => 18,  63 => 16,  60 => 15,  57 => 14,  55 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("    {#
    /**
     * @file
     * Default theme implementation for a views mini-pager.
     *
     * Available variables:
     * - items: List of pager items.
     *
     * @see template_preprocess_views_mini_pager()
     *
     * @ingroup themeable
     */
    #}
    {% if items.previous or items.next %}
      <nav aria-label=\"Page navigation\">
        <h4 class=\"visually-hidden\">{{ 'Pagination'|t }}</h4>
        <ul class=\"js-pager__items pagination\">
          {% if items.previous %}
            <li class=\"page-item\">
              <a class=\"page-link\" href=\"{{ items.previous.href }}\" title=\"{{ 'Go to previous page'|t }}\" rel=\"prev\"{{ items.previous.attributes|without('href', 'title', 'rel') }}>
                <span class=\"visually-hidden\">{{ 'Previous page'|t }}</span>
                <span aria-hidden=\"true\">{{ items.previous.text|default('‹‹'|t) }}</span>
              </a>
            </li>
          {% endif %}
          {% if items.current %}
            <li class=\"page-item\">
              <span class=\"page-link\">
                {% trans %}
                  Page {{ items.current }}
                {% endtrans %}
              </span>
            </li>
          {% endif %}
          {% if items.next %}
            <li class=\"page-item\">
              <a class=\"page-link\" href=\"{{ items.next.href }}\" title=\"{{ 'Go to next page'|t }}\" rel=\"next\"{{ items.next.attributes|without('href', 'title', 'rel') }}>
                <span class=\"visually-hidden\">{{ 'Next page'|t }}</span>
                <span aria-hidden=\"true\">{{ items.next.text|default('››'|t) }}</span>
              </a>
            </li>
          {% endif %}
        </ul>
      </nav>
    {% endif %}
", "themes/bootstrap_barrio/templates/views/views-mini-pager.html.twig", "/var/www/html/motc_qdgtp/themes/bootstrap_barrio/templates/views/views-mini-pager.html.twig");
    }
}
