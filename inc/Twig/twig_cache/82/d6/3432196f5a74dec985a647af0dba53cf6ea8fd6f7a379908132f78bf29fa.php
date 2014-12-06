<?php

/* single.twig */
class __TwigTemplate_82d63432196f5a74dec985a647af0dba53cf6ea8fd6f7a379908132f78bf29fa extends Twig_Template
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
            echo " ";
            echo $this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "the_post", array(), "method");
            echo "
        ";
            // line 5
            echo $this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "the_content", array(), "method");
            echo "
        ";
            // line 6
            echo twig_include($this->env, $context, "includes/comments.twig");
            echo "
    ";
        }
    }

    public function getTemplateName()
    {
        return "single.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 6,  38 => 5,  31 => 4,  28 => 3,);
    }
}
