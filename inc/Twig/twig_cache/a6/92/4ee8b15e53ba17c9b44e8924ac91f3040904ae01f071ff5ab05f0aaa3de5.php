<?php

/* includes/header.twig */
class __TwigTemplate_a6924ee8b15e53ba17c9b44e8924ac91f3040904ae01f071ff5ab05f0aaa3de5 extends Twig_Template
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
        echo "<header class=\"banner navbar navbar-default navbar-static-top\" role=\"banner\">
    <div class=\"container\">
        <div class=\"navbar-header\">
            <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\".navbar-collapse\">
                <span class=\"sr-only\">Toggle navigation</span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
            </button>
            <a class=\"navbar-brand\" href=\"";
        // line 10
        echo $this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "home_url", array(), "method");
        echo "\">";
        echo bloginfo("name");
        echo "</a>
        </div>

        <nav class=\"collapse navbar-collapse\" role=\"navigation\">
            ";
        // line 14
        $context["args"] = $this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "getBootstrapNavwalker", array(), "method");
        // line 15
        echo "            ";
        echo $this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "wp_nav_menu", array(0 => (isset($context["args"]) ? $context["args"] : null)), "method");
        echo "
        </nav>
    </div>
</header>";
    }

    public function getTemplateName()
    {
        return "includes/header.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  41 => 15,  39 => 14,  30 => 10,  19 => 1,);
    }
}
