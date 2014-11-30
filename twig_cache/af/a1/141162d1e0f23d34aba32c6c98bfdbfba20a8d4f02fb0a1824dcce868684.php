<?php

/* index.twig */
class __TwigTemplate_afa1141162d1e0f23d34aba32c6c98bfdbfba20a8d4f02fb0a1824dcce868684 extends Twig_Template
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
        echo "<h1>Hello World</h1>
";
        // line 2
        echo $this->getAttribute((isset($context["site"]) ? $context["site"] : null), "url", array());
    }

    public function getTemplateName()
    {
        return "index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  22 => 2,  19 => 1,);
    }
}
