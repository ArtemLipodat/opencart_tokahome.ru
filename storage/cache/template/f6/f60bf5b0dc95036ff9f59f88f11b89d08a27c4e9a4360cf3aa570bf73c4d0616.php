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

/* toka/template/extension/module/category.twig */
class __TwigTemplate_438ab96c90fa1087d471db9af771da51d2cb2e2989f33a9fa0c0dae0f15dea5e extends \Twig\Template
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
        // line 18
        echo "
<div class=\"catalog\">
  ";
        // line 20
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["categories"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 21
            echo "  <div class=\"catalog-item\">
    <a href=\"";
            // line 22
            echo twig_get_attribute($this->env, $this->source, $context["category"], "href", [], "any", false, false, false, 22);
            echo "\"><img src=\"";
            echo twig_get_attribute($this->env, $this->source, $context["category"], "img", [], "any", false, false, false, 22);
            echo "\" alt=\"\"></a>
    <div class=\"catalog-item-text\">
      <a href=\"";
            // line 24
            echo twig_get_attribute($this->env, $this->source, $context["category"], "href", [], "any", false, false, false, 24);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, false, 24);
            echo "</a>
      <a href=\"";
            // line 25
            echo twig_get_attribute($this->env, $this->source, $context["category"], "href", [], "any", false, false, false, 25);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["category"], "desc", [], "any", false, false, false, 25);
            echo "</a>
    </div>
";
            // line 28
            echo "  </div>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
        echo "</div>

<div class=\"button-order\">
  <a href=\"#orderModal1\" rel=\"modal:open\">Заказать монтаж из моего оборудования </a>
  <a href=\"#orderModal2\" rel=\"modal:open\">Подобрать оборудование под мою задачу</a>
</div>
";
    }

    public function getTemplateName()
    {
        return "toka/template/extension/module/category.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  75 => 30,  68 => 28,  61 => 25,  55 => 24,  48 => 22,  45 => 21,  41 => 20,  37 => 18,);
    }

    public function getSourceContext()
    {
        return new Source("", "toka/template/extension/module/category.twig", "");
    }
}
