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
        echo "
<article id=\"post-";
        // line 2
        echo $this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "the_ID", array());
        echo "\" ";
        echo $this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "post_class", array());
        echo ">
    <header class=\"page-header\">
        <h1>";
        // line 4
        echo $this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "the_title", array());
        echo "</h1>
    </header>
    <div class=\"entry-content\">
        ";
        // line 7
        echo $this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "the_content", array());
        echo "
        ";
        // line 8
        echo $this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "wp_link_pages", array(0 => "echo=0"), "method");
        echo "
    </div><!-- .entry-content -->

    <footer class=\"entry-footer\">
        ";
        // line 12
        echo $this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "edit_post_link", array());
        echo "
    </footer><!-- .entry-footer -->

    ";
        // line 15
        echo twig_include($this->env, $context, "includes/comments.twig");
        echo "
</article><!-- #post-## -->";
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
        return array (  52 => 15,  46 => 12,  39 => 8,  35 => 7,  29 => 4,  22 => 2,  19 => 1,);
    }
}
