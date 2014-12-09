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
        echo "\">
    <header class=\"entry-header\">
        <h1 class=\"entry-title\">";
        // line 3
        echo $this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "the_title", array());
        echo "</h1>

        <div class=\"entry-meta\">

        </div><!-- .entry-meta -->
    </header><!-- .entry-header -->

    <div class=\"entry-content\">
        ";
        // line 11
        echo $this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "the_content", array());
        echo "
    </div><!-- .entry-content -->

    <footer class=\"entry-footer\">

    </footer><!-- .entry-footer -->
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
        return array (  36 => 11,  25 => 3,  19 => 1,);
    }
}
