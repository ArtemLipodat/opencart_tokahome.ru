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

/* toka/template/checkout/cart.twig */
class __TwigTemplate_2df107329df86cb1d29f0b343f32fbf9835311b96f2cea739b7ecf3e3c325e1f extends \Twig\Template
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
    <h2>КОРЗИНА: <span>";
        // line 4
        if ((twig_length_filter($this->env, ($context["products"] ?? null)) == 1)) {
            echo twig_length_filter($this->env, ($context["products"] ?? null));
            echo " товар ";
        }
        echo " ";
        if ((twig_length_filter($this->env, ($context["products"] ?? null)) > 1)) {
            echo twig_length_filter($this->env, ($context["products"] ?? null));
            echo " товара ";
        }
        echo "</span> </h2>
    <a href=\"";
        // line 5
        echo ($context["back"] ?? null);
        echo "\">Назад</a>
  </div>
  ";
        // line 7
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["products"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 8
            echo "  <form action=\"";
            echo ($context["action"] ?? null);
            echo "\" method=\"post\" enctype=\"multipart/form-data\">
  <div class=\"shopping-cart-item\">
    <svg onclick=\"remove(";
            // line 10
            echo twig_get_attribute($this->env, $this->source, $context["product"], "cart_id", [], "any", false, false, false, 10);
            echo ")\" class=\"remove\" width=\"30\" height=\"30\" viewBox=\"0 0 16 17\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
      <path d=\"M16 2.22336L14.6 0.823364L8 7.42336L1.4 0.823364L0 2.22336L6.6 8.82336L0 15.4234L1.4 16.8234L8 10.2234L14.6 16.8234L16 15.4234L9.4 8.82336L16 2.22336Z\" fill=\"#C4C4C4\"/>
    </svg>
    <div class=\"shopping-cart-item-img\">
      <img style=\"width: 245px; height: 160px\" src=\"";
            // line 14
            echo twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 14);
            echo "\" alt=\"\">
    </div>
    <div class=\"shopping-cart-item-name\">
      <a style=\"color: #0D0D0D\" href=\"";
            // line 17
            echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 17);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 17);
            echo "</a>
    </div>
    <div class=\"shopping-cart-item-change\">
      <button type=\"button\" onclick=\"javascript: document.getElementById('change_";
            // line 20
            echo twig_get_attribute($this->env, $this->source, $context["product"], "cart_id", [], "any", false, false, false, 20);
            echo "').value--; \$('#update_";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "cart_id", [], "any", false, false, false, 20);
            echo "').trigger('click')\" id=\"minus_";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "cart_id", [], "any", false, false, false, 20);
            echo "\">-</button>
      <input type=\"text\" name=\"quantity[";
            // line 21
            echo twig_get_attribute($this->env, $this->source, $context["product"], "cart_id", [], "any", false, false, false, 21);
            echo "]\" id=\"change_";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "cart_id", [], "any", false, false, false, 21);
            echo "\" readonly  value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 21);
            echo "\" size=\"1\" min=\"1\"/>
      <button type=\"button\" onclick=\"javascript: document.getElementById('change_";
            // line 22
            echo twig_get_attribute($this->env, $this->source, $context["product"], "cart_id", [], "any", false, false, false, 22);
            echo "').value++;  \$('#update_";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "cart_id", [], "any", false, false, false, 22);
            echo "').trigger('click') \" id=\"plus_";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "cart_id", [], "any", false, false, false, 22);
            echo "\">+</button>
      <button style=\"margin-left: 20px; background-color: #7a7575 !important; display: none;\" id=\"update_";
            // line 23
            echo twig_get_attribute($this->env, $this->source, $context["product"], "cart_id", [], "any", false, false, false, 23);
            echo "\" type=\"submit\" data-toggle=\"tooltip\" title=\"";
            echo ($context["button_update"] ?? null);
            echo "\" class=\"btn btn-primary\"><svg style=\"width: 20px\" xmlns=\"http://www.w3.org/2000/svg\" class=\"h-6 w-6\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\" stroke-width=\"2\">
          <path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15\" />
        </svg></button>
    </div>
    <div class=\"shopping-cart-item-price\">
      <span>";
            // line 28
            echo twig_get_attribute($this->env, $this->source, $context["product"], "total", [], "any", false, false, false, 28);
            echo "</span>
";
            // line 30
            echo "    </div>
  </div>
  </form>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 34
        echo "  <div class=\"total\">
    <div class=\"total-price\">ИТОГО: <span>";
        // line 35
        echo twig_get_attribute($this->env, $this->source, (($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = ($context["totals"] ?? null)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4[0] ?? null) : null), "text", [], "any", false, false, false, 35);
        echo "</span></div>
    <div class=\"total-button\">
      <a href=\"";
        // line 37
        echo ($context["checkout"] ?? null);
        echo "\">ОФОРМИТЬ ЗАКАЗ</a>
    </div>
  </div>
</div>
";
        // line 41
        echo ($context["footer"] ?? null);
        echo "

<script>
  function minus(id) {
    let minus = document.getElementById(\"minus_\" + id);
    let change = document.getElementById('change_' + id);
    minus.onclick = function() {
      count = Number(change.value) - 1 > 0 ? Number(change.value) - 1 : 1;
      if (count < 10){
        change.style.width = '50px';
      }
      change.value = count;
      \$('#update').trigger('click')
    }
  }

  function plus(id) {
    let plus = document.getElementById(\"plus_\" + id);
    let change = document.getElementById('change_' + id);
    plus.onclick = function() {
      if (Number(change.value) > 8){
        change.style.width = '70px';
      }
      if (Number(change.value) > 98){
        change.style.width = '90px';
      }
      change.value = Number(change.value) + 1;
      \$('#update').trigger('click')
    };
  }

</script>
";
    }

    public function getTemplateName()
    {
        return "toka/template/checkout/cart.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  153 => 41,  146 => 37,  141 => 35,  138 => 34,  129 => 30,  125 => 28,  115 => 23,  107 => 22,  99 => 21,  91 => 20,  83 => 17,  77 => 14,  70 => 10,  64 => 8,  60 => 7,  55 => 5,  43 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "toka/template/checkout/cart.twig", "");
    }
}
