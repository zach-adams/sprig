<?php

/* layouts/base.twig */
class __TwigTemplate_0ad6010e3b7123b741a4241c4c1f08149fd715f944b714512af3611eb3d6d73d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'page_header' => array($this, 'block_page_header'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->env->loadTemplate("includes/head.twig")->display($context);
        // line 2
        echo "
<body ";
        // line 3
        echo $this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "body_class", array(), "method");
        echo " >

<!--[if lt IE 8]>
<div class=\"alert alert-warning\">
    You are using an <strong>outdated</strong> browser. Please <a href=\"http://browsehappy.com/\">upgrade your browser</a> to improve your experience.
</div>
<![endif]-->

";
        // line 11
        $this->env->loadTemplate("includes/header.twig")->display($context);
        // line 12
        echo "
<div class=\"wrap container\" role=\"document\">
    ";
        // line 14
        $this->displayBlock('page_header', $context, $blocks);
        // line 17
        echo "    ";
        $this->displayBlock('content', $context, $blocks);
        // line 18
        echo "</div><!-- /.wrap -->

";
        // line 20
        $this->env->loadTemplate("includes/footer.twig")->display($context);
        // line 21
        echo "
";
        // line 22
        echo $this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "wp_footer", array(), "method");
        echo "
</body>
</html>";
    }

    // line 14
    public function block_page_header($context, array $blocks = array())
    {
        // line 15
        echo "        ";
        $this->env->loadTemplate("content/page-header.twig")->display($context);
        // line 16
        echo "    ";
    }

    // line 17
    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "layouts/base.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  74 => 17,  70 => 16,  67 => 15,  64 => 14,  57 => 22,  54 => 21,  52 => 20,  48 => 18,  45 => 17,  43 => 14,  39 => 12,  37 => 11,  26 => 3,  23 => 2,  21 => 1,);
    }
}
