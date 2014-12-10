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
        echo "<article id=\"post-";
        echo $this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "the_ID", array());
        echo "\" ";
        echo $this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "post_class", array());
        echo ">
    <header class=\"page-header\">
        <h1>";
        // line 3
        echo $this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "the_title", array());
        echo "</h1>
    </header>
    <div class=\"entry-content\">
        ";
        // line 6
        echo $this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "the_content", array());
        echo "
        ";
        // line 7
        echo $this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "wp_link_pages", array(0 => array("echo" => "0")), "method");
        echo "
    </div><!-- .entry-content -->

    <footer class=\"entry-footer\">
        ";
        // line 11
        echo $this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "edit_post_link", array(0 => "Edit", 1 => "<small>", 2 => "</small>"), "method");
        echo "
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->
<hr/>
";
        // line 15
        echo twig_include($this->env, $context, "includes/comments.twig");
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
        return array (  51 => 15,  44 => 11,  37 => 7,  33 => 6,  27 => 3,  19 => 1,);
    }
}
