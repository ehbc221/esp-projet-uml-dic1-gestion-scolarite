<?php

/* @Twig/Exception/traces.txt.twig */
class __TwigTemplate_52e0968212eb2e0707034766a8e6752a0b2f12d81a4aa2bd8fdaf83bae2dabcc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_47968bc18b151c834c8472c00d81c4aa24c379397c1dec13ad8ea84a8a4c43f7 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_47968bc18b151c834c8472c00d81c4aa24c379397c1dec13ad8ea84a8a4c43f7->enter($__internal_47968bc18b151c834c8472c00d81c4aa24c379397c1dec13ad8ea84a8a4c43f7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/traces.txt.twig"));

        $__internal_78cabe6a88ec706124ccecc63a6bb6e72224def80c36bc41b5d34cb3514c2c87 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_78cabe6a88ec706124ccecc63a6bb6e72224def80c36bc41b5d34cb3514c2c87->enter($__internal_78cabe6a88ec706124ccecc63a6bb6e72224def80c36bc41b5d34cb3514c2c87_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/traces.txt.twig"));

        // line 1
        if (twig_length_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), (isset($context["exception"]) || array_key_exists("exception", $context) ? $context["exception"] : (function () { throw new Twig_Error_Runtime('Variable "exception" does not exist.', 1, $this->getSourceContext()); })()), "trace", array()))) {
            // line 2
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->getSourceContext(), (isset($context["exception"]) || array_key_exists("exception", $context) ? $context["exception"] : (function () { throw new Twig_Error_Runtime('Variable "exception" does not exist.', 2, $this->getSourceContext()); })()), "trace", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["trace"]) {
                // line 3
                $this->loadTemplate("@Twig/Exception/trace.txt.twig", "@Twig/Exception/traces.txt.twig", 3)->display(array("trace" => $context["trace"]));
                // line 4
                echo "
";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['trace'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        
        $__internal_47968bc18b151c834c8472c00d81c4aa24c379397c1dec13ad8ea84a8a4c43f7->leave($__internal_47968bc18b151c834c8472c00d81c4aa24c379397c1dec13ad8ea84a8a4c43f7_prof);

        
        $__internal_78cabe6a88ec706124ccecc63a6bb6e72224def80c36bc41b5d34cb3514c2c87->leave($__internal_78cabe6a88ec706124ccecc63a6bb6e72224def80c36bc41b5d34cb3514c2c87_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/traces.txt.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  33 => 4,  31 => 3,  27 => 2,  25 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% if exception.trace|length %}
{% for trace in exception.trace %}
{% include '@Twig/Exception/trace.txt.twig' with { 'trace': trace } only %}

{% endfor %}
{% endif %}
", "@Twig/Exception/traces.txt.twig", "/var/www/html/projet-uml/vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle/Resources/views/Exception/traces.txt.twig");
    }
}
