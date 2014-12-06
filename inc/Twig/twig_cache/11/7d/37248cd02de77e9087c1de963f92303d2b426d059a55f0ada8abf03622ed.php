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
        echo "<article ";
        echo $this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "post_class", array());
        echo ">
    <header>
        <h2 class=\"entry-title\"><a href=\"";
        // line 3
        echo $this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "the_permalink", array(), "method");
        echo "\">";
        echo $this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "the_title", array(), "method");
        echo "</a></h2>
        ";
        // line 4
        $this->env->loadTemplate("includes/entry-meta.twig")->display($context);
        // line 5
        echo "    </header>
    <div class=\"entry-summary\">
        ";
        // line 7
        echo $this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "the_excerpt", array(), "method");
        echo "
    </div>
</article>";
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
        return array (  37 => 7,  33 => 5,  31 => 4,  25 => 3,  19 => 1,);
    }
}
