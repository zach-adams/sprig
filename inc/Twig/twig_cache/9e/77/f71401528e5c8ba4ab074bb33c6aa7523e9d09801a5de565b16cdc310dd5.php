<?php

/* includes/searchform.twig */
class __TwigTemplate_9e77f71401528e5c8ba4ab074bb33c6aa7523e9d09801a5de565b16cdc310dd5 extends Twig_Template
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
        echo "<div class=\"col-lg-3\">
\t<form role=\"search\" method=\"get\" class=\"search-form\" action=\"";
        // line 2
        echo $this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "home_url", array(), "method");
        echo "\">
\t    <div class=\"input-group custom-search-form\">
\t\t\t<input type=\"text\" value=\"";
        // line 4
        echo $this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "get_search_query", array(), "method");
        echo "\" name=\"s\" class=\"form-control\">
\t\t\t<span class=\"input-group-btn\">
\t\t\t\t<button class=\"btn btn-default\" type=\"submit\">
\t\t\t\t\tSearch
\t \t\t\t</button>
\t \t\t</span>
\t     </div>
\t</form>
</div>";
    }

    public function getTemplateName()
    {
        return "includes/searchform.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  27 => 4,  22 => 2,  19 => 1,);
    }
}
