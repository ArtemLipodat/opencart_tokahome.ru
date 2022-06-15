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

/* toka/template/product/category.twig */
class __TwigTemplate_f703f2b8887870e27fe7f5eeceaadd364a9ace96220d76879ca777819601520a extends \Twig\Template
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
<div class=\"catalog-page\" style=\"min-height: 100vh\">
  <div class=\"catalog-page-header\">
    <h2>";
        // line 4
        echo ($context["heading_title"] ?? null);
        echo "</h2>
    <a href=\"";
        // line 5
        echo twig_get_attribute($this->env, $this->source, (($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = ($context["breadcrumbs"] ?? null)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4[0] ?? null) : null), "href", [], "any", false, false, false, 5);
        echo "\">Назад</a>
  </div>
  <div class=\"catalog-sort\">
    <label class=\"input-group-addon\" for=\"input-sort\">";
        // line 8
        echo ($context["text_sort"] ?? null);
        echo "</label>
    <select id=\"input-sort\" class=\"form-control\" onchange=\"location = this.value;\">
      ";
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($context["sorts"]);
        foreach ($context['_seq'] as $context["_key"] => $context["sorts"]) {
            // line 11
            echo "        ";
            if ((twig_get_attribute($this->env, $this->source, $context["sorts"], "value", [], "any", false, false, false, 11) == sprintf("%s-%s", ($context["sort"] ?? null), ($context["order"] ?? null)))) {
                // line 12
                echo "          <option value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["sorts"], "href", [], "any", false, false, false, 12);
                echo "\" selected=\"selected\">";
                echo twig_get_attribute($this->env, $this->source, $context["sorts"], "text", [], "any", false, false, false, 12);
                echo "</option>
        ";
            } else {
                // line 14
                echo "          <option value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["sorts"], "href", [], "any", false, false, false, 14);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["sorts"], "text", [], "any", false, false, false, 14);
                echo "</option>
        ";
            }
            // line 16
            echo "      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sorts'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 17
        echo "    </select>
  </div>
  <div class=\"catalog-page-item\">
    ";
        // line 20
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["products"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 21
            echo "    <div class=\"catalog-page-item-list\">
      <a href=\"";
            // line 22
            echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 22);
            echo "\"><img class=\"photo_catalog\" src=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 22);
            echo "\" alt=\"\"></a>
      <div class=\"catalog-page-item-list-thumb\">
        ";
            // line 24
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["product"], "images", [], "any", false, false, false, 24));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["image"]) {
                // line 25
                echo "          ";
                if ((twig_get_attribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 25) < 4)) {
                    // line 26
                    echo "          ";
                    echo ($context["break"] ?? null);
                    echo "
        <a class=\"thum-img-category\" href=\"\"><img src=\"";
                    // line 27
                    echo twig_get_attribute($this->env, $this->source, $context["image"], "thumb", [], "any", false, false, false, 27);
                    echo "\" alt=\"\"></a>
          ";
                }
                // line 29
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['image'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 30
            echo "        <a href=\"\" class=\"price\">";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 30);
            echo "</a>
        ";
            // line 31
            if (twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 31)) {
                // line 32
                echo "        <a href=\"\" class=\"seel_price\">";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 32);
                echo "</a>
        ";
            }
            // line 34
            echo "      </div>
      <a href=\"";
            // line 35
            echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 35);
            echo "\" class=\"desc\">
        <span>";
            // line 36
            echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 36);
            echo "</span>
        <span>";
            // line 37
            echo twig_get_attribute($this->env, $this->source, $context["product"], "description", [], "any", false, false, false, 37);
            echo "</span>
      </a>
    </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 41
        echo "  </div>
</div>
";
        // line 43
        echo ($context["footer"] ?? null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "toka/template/product/category.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  188 => 43,  184 => 41,  174 => 37,  170 => 36,  166 => 35,  163 => 34,  157 => 32,  155 => 31,  150 => 30,  136 => 29,  131 => 27,  126 => 26,  123 => 25,  106 => 24,  99 => 22,  96 => 21,  92 => 20,  87 => 17,  81 => 16,  73 => 14,  65 => 12,  62 => 11,  58 => 10,  53 => 8,  47 => 5,  43 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "toka/template/product/category.twig", "");
    }
}
