<?php

/* includes/head.twig */
class __TwigTemplate_057f03248b651608a6a20f7ec9229d1a03dab428c5f0fc54ea2cbdfb5e81b496 extends Twig_Template
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
        echo "<!doctype html>
<html class=\"no-js\" ";
        // line 2
        echo $this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "language_attributes", array(), "method");
        echo ">
<head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <title>";
        // line 6
        echo $this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "wp_title", array(0 => "|", 1 => true, 2 => "right"), "method");
        echo "</title>
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">

    ";
        // line 9
        echo $this->getAttribute((isset($context["wp"]) ? $context["wp"] : null), "wp_head", array(), "method");
        echo "

</head>
";
    }

    public function getTemplateName()
    {
        return "includes/head.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  35 => 9,  29 => 6,  22 => 2,  19 => 1,);
    }
}
