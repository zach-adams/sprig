<?php

/* content/content-single.twig */
class __TwigTemplate_117d37248cd02de77e9087c1de963f92303d2b426d059a55f0ada8abf03622ed extends Twig_Template
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
            ";
        // line 6
        $this->env->loadTemplate("includes/entry-meta.twig")->display($context);
        // line 7
        echo "        </div><!-- .entry-meta -->
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
        return "content/content-single.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 11,  33 => 7,  31 => 6,  25 => 3,  19 => 1,);
    }
}
