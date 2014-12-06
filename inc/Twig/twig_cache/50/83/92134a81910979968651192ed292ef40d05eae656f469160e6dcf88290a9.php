<?php

/* includes/entry-meta.twig */
class __TwigTemplate_508392134a81910979968651192ed292ef40d05eae656f469160e6dcf88290a9 extends Twig_Template
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
        echo "<time class=\"updated\" datetime=\"";
        echo $this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "get_the_time", array(0 => "c"), "method");
        echo "\">";
        echo $this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "get_the_date", array(), "method");
        echo "</time>
<p class=\"byline author vcard\">By <a href=\"";
        // line 2
        echo $this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "get_author_posts_url", array(0 => $this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "get_the_author_meta", array(0 => "ID"), "method")), "method");
        echo "\" rel=\"author\" class=\"fn\">";
        echo $this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "get_the_author", array(), "method");
        echo "</a></p>";
    }

    public function getTemplateName()
    {
        return "includes/entry-meta.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  26 => 2,  19 => 1,);
    }
}
