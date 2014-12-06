<?php

/* content/content-page.twig */
class __TwigTemplate_e0c11b9529e0bf4d069739526ae9d7d26cc7079cc124277a2572320211a5412c extends Twig_Template
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
        // line 1
        echo $this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "the_content", array());
        echo "
";
        // line 2
        echo $this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "wp_link_pages", array(0 => array(0 => array("before" => "<nav class=\"pagination\">"), 1 => array("after" => "</nav>"))), "method");
    }

    public function getTemplateName()
    {
        return "content/content-page.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  23 => 2,  19 => 1,);
    }
}
