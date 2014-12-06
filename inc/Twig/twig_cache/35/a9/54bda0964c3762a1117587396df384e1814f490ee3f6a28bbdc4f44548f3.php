<?php

/* content/page-header.twig */
class __TwigTemplate_35a954bda0964c3762a1117587396df384e1814f490ee3f6a28bbdc4f44548f3 extends Twig_Template
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
        echo "<div class=\"page-header\">
    <h1>
        ";
        // line 3
        echo $this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "sprig_title", array(), "method");
        echo "
    </h1>
</div>";
    }

    public function getTemplateName()
    {
        return "content/page-header.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  23 => 3,  19 => 1,);
    }
}
