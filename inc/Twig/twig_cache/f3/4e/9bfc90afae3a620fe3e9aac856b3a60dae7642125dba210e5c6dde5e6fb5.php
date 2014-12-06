<?php

/* includes/comments.twig */
class __TwigTemplate_f34e9bfc90afae3a620fe3e9aac856b3a60dae7642125dba210e5c6dde5e6fb5 extends Twig_Template
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
        echo "<section id=\"comments\">
    ";
        // line 2
        if ((isset($context["comments"]) ? $context["comments"] : null)) {
            // line 3
            echo "        <h3>Comments</h3>

        <ol class=\"media-list\">
            ";
            // line 6
            $context["args"] = $this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "getCommentWalker", array(), "method");
            // line 7
            echo "            ";
            echo $this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "wp_list_comments", array(), "method");
            echo "
        </ol>

        ";
            // line 10
            if ((($this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "get_comment_pages_count", array(), "method") > 1) && $this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "get_option", array(0 => "page_comments"), "method"))) {
                // line 11
                echo "            <nav>
                <ul class=\"pager\">
                    ";
                // line 13
                if ($this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "get_previous_comments_link", array(), "method")) {
                    // line 14
                    echo "                        <li class=\"previous\">";
                    echo $this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "previous_comments_link", array(0 => "Older comments"), "method");
                    echo "</li>
                    ";
                }
                // line 16
                echo "                    ";
                if ($this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "get_next_comments_link", array(), "method")) {
                    // line 17
                    echo "                        <li class=\"next\">";
                    echo $this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "next_comments_link", array(0 => "Newer comments"), "method");
                    echo "</li>
                    ";
                }
                // line 19
                echo "                </ul>
            </nav>
        ";
            }
            // line 22
            echo "
        ";
            // line 23
            if ((((!$this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "comments_open", array(), "method")) && (!$this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "is_page", array(), "method"))) && $this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "post_type_supports", array(0 => $this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "get_post_type", array(), "method"), 1 => "comments"), "method"))) {
                // line 24
                echo "            <div class=\"alert alert-warning\">
                Comments are closed.
            </div>
        ";
            } elseif ((((!$this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "comments_open", array(), "method")) && (!$this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "is_page", array(), "method"))) && $this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "post_type_supports", array(0 => $this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "get_post_type", array(), "method"), 1 => "comments"), "method"))) {
                // line 28
                echo "            <div class=\"alert alert-warning\">
                Comments are closed
            </div>
        ";
            }
            // line 32
            echo "    ";
        }
        // line 33
        echo "</section><!-- /#comments -->

";
        // line 35
        echo $this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "comment_form", array(), "method");
        echo "
";
    }

    public function getTemplateName()
    {
        return "includes/comments.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  90 => 35,  86 => 33,  83 => 32,  77 => 28,  71 => 24,  69 => 23,  66 => 22,  61 => 19,  55 => 17,  52 => 16,  46 => 14,  44 => 13,  40 => 11,  38 => 10,  31 => 7,  29 => 6,  24 => 3,  22 => 2,  19 => 1,);
    }
}
