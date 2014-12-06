<?php

/* template-sidebar.twig */
class __TwigTemplate_5c677c3d35099841acfa6f3920a38d7f52c74ef8250d58e4c3000276ec5d93a3 extends Twig_Template
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
        echo "    ";
        if ($this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "have_posts", array(), "method")) {
            // line 5
            echo "        ";
            echo $this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "the_post", array(), "method");
            echo "
        ";
            // line 6
            echo $this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "the_content", array(), "method");
            echo "
    ";
        }
    }

    public function getTemplateName()
    {
        return "template-sidebar.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 6,  34 => 5,  31 => 4,  28 => 3,);
    }
}
