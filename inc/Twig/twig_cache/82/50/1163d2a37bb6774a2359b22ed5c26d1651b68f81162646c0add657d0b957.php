<?php

/* template-search.twig */
class __TwigTemplate_82501163d2a37bb6774a2359b22ed5c26d1651b68f81162646c0add657d0b957 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layouts/base.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layouts/base.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "        ";
        echo $this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "get_search_form", array());
        echo "
";
    }

    public function getTemplateName()
    {
        return "template-search.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 4,  28 => 3,);
    }
}
