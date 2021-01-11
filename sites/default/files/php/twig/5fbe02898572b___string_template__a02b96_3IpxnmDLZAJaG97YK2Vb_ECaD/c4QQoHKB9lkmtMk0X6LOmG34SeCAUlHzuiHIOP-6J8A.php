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

/* __string_template__a02b96809ffee369ae91dc6339680af51720b47f8d2ad8693362dd7ef09e1933 */
class __TwigTemplate_dc75ba88c8faf2c64f035436994d354fcdb220db4335e9e14dece94f1a13b032 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = [];
        $filters = ["escape" => 2];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                [],
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
        // line 1
        echo "<div class=\"card\" >
  <img class=\"card-img-top\" src=\"";
        // line 2
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["field_image"] ?? null)), "html", null, true);
        echo " \" alt=\"Card image cap\">
    <p class=\"card-text course_title\">";
        // line 3
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_1"] ?? null)), "html", null, true);
        echo " </p>

  <div class=\"card-body\">
    <h5 class=\"card-title\">";
        // line 6
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null)), "html", null, true);
        echo "</h5>
    <h5 class=\"card-title\">";
        // line 7
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["field_category"] ?? null)), "html", null, true);
        echo "</h5>


  </div>
  <ul class=\"list-group list-group-flush\">
    <li class=\"list-group-item\">";
        // line 12
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["field_course_schedule_status"] ?? null)), "html", null, true);
        echo "</li>
    <li class=\"list-group-item\">Class Type: ";
        // line 13
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["field_course_type"] ?? null)), "html", null, true);
        echo "</li>
    <li class=\"list-group-item\">Start: ";
        // line 14
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["field_start_datetime"] ?? null)), "html", null, true);
        echo "</li>
    <li class=\"list-group-item\">End  : ";
        // line 15
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["field_end_datetime"] ?? null)), "html", null, true);
        echo "</li>
  </ul>
  <div class=\"card-body\">

    <a href=\"../node/add/nomination?edit[field_course_name][widget][0][target_id]=";
        // line 19
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["nid"] ?? null)), "html", null, true);
        echo "&edit[field_course_schedule_batch][widget][0][target_id]=";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["nid_2"] ?? null)), "html", null, true);
        echo "&destination=node/";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["nid_1"] ?? null)), "html", null, true);
        echo "\" class=\"btn btn-primary\">Add Nomination</a>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "__string_template__a02b96809ffee369ae91dc6339680af51720b47f8d2ad8693362dd7ef09e1933";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  99 => 19,  92 => 15,  88 => 14,  84 => 13,  80 => 12,  72 => 7,  68 => 6,  62 => 3,  58 => 2,  55 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{# inline_template_start #}<div class=\"card\" >
  <img class=\"card-img-top\" src=\"{{ field_image }} \" alt=\"Card image cap\">
    <p class=\"card-text course_title\">{{ title_1 }} </p>

  <div class=\"card-body\">
    <h5 class=\"card-title\">{{ title }}</h5>
    <h5 class=\"card-title\">{{ field_category }}</h5>


  </div>
  <ul class=\"list-group list-group-flush\">
    <li class=\"list-group-item\">{{ field_course_schedule_status }}</li>
    <li class=\"list-group-item\">Class Type: {{ field_course_type }}</li>
    <li class=\"list-group-item\">Start: {{ field_start_datetime }}</li>
    <li class=\"list-group-item\">End  : {{ field_end_datetime }}</li>
  </ul>
  <div class=\"card-body\">

    <a href=\"../node/add/nomination?edit[field_course_name][widget][0][target_id]={{ nid }}&edit[field_course_schedule_batch][widget][0][target_id]={{ nid_2 }}&destination=node/{{ nid_1 }}\" class=\"btn btn-primary\">Add Nomination</a>
  </div>
</div>
", "__string_template__a02b96809ffee369ae91dc6339680af51720b47f8d2ad8693362dd7ef09e1933", "");
    }
}
