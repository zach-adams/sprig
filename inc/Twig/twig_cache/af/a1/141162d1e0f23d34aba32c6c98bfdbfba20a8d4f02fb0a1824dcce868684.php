<?php

/* index.twig */
class __TwigTemplate_afa1141162d1e0f23d34aba32c6c98bfdbfba20a8d4f02fb0a1824dcce868684 extends Twig_Template
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
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "get_posts", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
                echo " ";
                echo $this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "the_post", array(), "method");
                echo "
            ";
                // line 6
                echo $this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "the_content", array(), "method");
                echo "
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 8
            echo "    ";
        }
    }

    public function getTemplateName()
    {
        return "index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  51 => 8,  43 => 6,  34 => 5,  31 => 4,  28 => 3,);
    }
}
