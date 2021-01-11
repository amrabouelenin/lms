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

/* __string_template__b8f818dc155bf64c31ffa6daecf2fd5c02609f6ac3e37eb3f9d52fe122172293 */
class __TwigTemplate_3bcf7646d3e3f5f43d823457c28d39993aa4011f68da7ed3cad1eb2d7b91f03e extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = [];
        $filters = [];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                [],
                [],
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
        echo "destination=/backend/employees%3Fmail%3D%26field_employee_title_value%3D%26field_mobile_value%3D%26uid%3D%26field_nationality_value%3DAll%26field_qatari_national_value%3DAll%26field_qid_value%3D%26field_year_value%3DAll%26title%3D%26field_full_name_value%3D%26field_verified_value%3DAll%26roles_target_id_1%3Dentity_focal_point";
    }

    public function getTemplateName()
    {
        return "__string_template__b8f818dc155bf64c31ffa6daecf2fd5c02609f6ac3e37eb3f9d52fe122172293";
    }

    public function getDebugInfo()
    {
        return array (  55 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{# inline_template_start #}destination=/backend/employees%3Fmail%3D%26field_employee_title_value%3D%26field_mobile_value%3D%26uid%3D%26field_nationality_value%3DAll%26field_qatari_national_value%3DAll%26field_qid_value%3D%26field_year_value%3DAll%26title%3D%26field_full_name_value%3D%26field_verified_value%3DAll%26roles_target_id_1%3Dentity_focal_point", "__string_template__b8f818dc155bf64c31ffa6daecf2fd5c02609f6ac3e37eb3f9d52fe122172293", "");
    }
}
