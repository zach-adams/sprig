<?php

/* home.twig */
class __TwigTemplate_334092ab8f8e07321bec3934e13566572644847e935554538a1d9d315dfb6d93 extends Twig_Template
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
            $context['_seq'] = twig_ensure_traversable((isset($context["posts"]) ? $context["posts"] : null));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
                echo " ";
                echo $this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "the_post", array());
                echo "
            ";
                // line 6
                $this->env->loadTemplate("content/content-single.twig")->display($context);
                // line 7
                echo "        ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 8
            echo "    ";
        }
        // line 9
        echo "    ";
        if (($this->getAttribute($this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "wp_query", array()), "max_num_pages", array()) > 1)) {
            // line 10
            echo "        <nav class=\"post-nav\">
        <ul class=\"pager\">
            <li class=\"previous\">";
            // line 12
            echo $this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "next_posts_link", array(0 => "Older posts"), "method");
            echo "</li>
            <li class=\"next\">";
            // line 13
            echo $this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "previous_posts_link", array(0 => "Newer posts"), "method");
            echo "</li>
        </ul>
    ";
        }
    }

    public function getTemplateName()
    {
        return "home.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  86 => 13,  82 => 12,  78 => 10,  75 => 9,  72 => 8,  58 => 7,  56 => 6,  34 => 5,  31 => 4,  28 => 3,);
    }
}
