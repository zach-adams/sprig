<?php

/* 404.twig */
class __TwigTemplate_76cd15c3fdaf801c56ba7177521ccd8dd7cd78881b44d23baeaa53bfcdd1d57f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("base.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "    <div id=\"primary\" class=\"content-area\">
        <main id=\"main\" class=\"site-main\" role=\"main\">
            ";
        // line 6
        $this->env->loadTemplate("content/content-404.twig")->display($context);
        // line 7
        echo "        </main><!-- #main -->
    </div><!-- #primary -->
";
    }

    public function getTemplateName()
    {
        return "404.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  37 => 7,  35 => 6,  31 => 4,  28 => 3,);
    }
}
