<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* toka/template/error/not_found.twig */
class __TwigTemplate_8988fd5c4a16f845eb4d7c6f8dfa32fc889a1d236b5271399d170545bccb816d extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo ($context["header"] ?? null);
        echo "
<div class=\"shopping-cart\" style=\"min-height: 100vh\">
  <div class=\"shopping-cart-header\">
    <h2>";
        // line 4
        echo ($context["heading_title"] ?? null);
        echo "</h2>
    <span>";
        // line 5
        echo ($context["text_error"] ?? null);
        echo "</span>
  </div>
  <div class=\"buttons clearfix\" style=\"margin-top: 50px\">
    <a style=\"text-decoration: none;padding: 15px 40px;border: none;border-radius: 10px;background-color: #434C5E;font-weight: 400;font-size: 18px; color: #fff;\" href=\"";
        // line 8
        echo ($context["continue"] ?? null);
        echo "\" >";
        echo ($context["button_continue"] ?? null);
        echo "</a>
  </div>
</div>
";
        // line 11
        echo ($context["footer"] ?? null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "toka/template/error/not_found.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 11,  53 => 8,  47 => 5,  43 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "toka/template/error/not_found.twig", "");
    }
}
