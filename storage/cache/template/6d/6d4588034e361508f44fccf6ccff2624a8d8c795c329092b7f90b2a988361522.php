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

/* toka/template/information/information.twig */
class __TwigTemplate_d935e7aa8cfc658a63108135a69449a1ab785f630db3f1cc076f23304f99f99b extends \Twig\Template
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
        // line 17
        echo "
";
        // line 18
        echo ($context["header"] ?? null);
        echo "
<div class=\"information\" style=\"min-height: 100vh\">
  <div class=\"information-header\">
    <h2>";
        // line 21
        echo ($context["heading_title"] ?? null);
        echo "</h2>
    <a href=\"/\">Назад</a>
  </div>
  <div class=\"information-text\">
    ";
        // line 25
        echo ($context["description"] ?? null);
        echo "
  </div>
</div>
";
        // line 28
        echo ($context["footer"] ?? null);
    }

    public function getTemplateName()
    {
        return "toka/template/information/information.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 28,  53 => 25,  46 => 21,  40 => 18,  37 => 17,);
    }

    public function getSourceContext()
    {
        return new Source("", "toka/template/information/information.twig", "");
    }
}
