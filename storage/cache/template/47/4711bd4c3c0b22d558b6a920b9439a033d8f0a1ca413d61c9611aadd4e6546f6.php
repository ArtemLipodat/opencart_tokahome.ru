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

/* toka/template/common/cart.twig */
class __TwigTemplate_2c87146c4b5c49048ae80eac73114ab91581c605e2a37b7c3bc83d93f1fe402d extends \Twig\Template
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
        echo "<a id=\"header-cart\" style=\"border-radius: 10px\" href=\"";
        echo ($context["cart"] ?? null);
        echo "\">";
        if ((twig_length_filter($this->env, ($context["products"] ?? null)) > 0)) {
            echo " В Корзине ";
            echo twig_length_filter($this->env, ($context["products"] ?? null));
            echo " ";
        } else {
            echo " Корзина ";
        }
        echo " </a>
<a id=\"header-cart-mobile\" href=\"";
        // line 2
        echo ($context["cart"] ?? null);
        echo "\">";
        if ((twig_length_filter($this->env, ($context["products"] ?? null)) > 0)) {
            echo "<span>";
            echo twig_length_filter($this->env, ($context["products"] ?? null));
            echo "</span>";
        }
        // line 3
        echo "    <svg  width=\"35\" height=\"35\" viewBox=\"0 0 19 19\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
        <path d=\"M7.03516 16.8889C7.69099 16.8889 8.22266 16.3573 8.22266 15.7014C8.22266 15.0456 7.69099 14.5139 7.03516 14.5139C6.37932 14.5139 5.84766 15.0456 5.84766 15.7014C5.84766 16.3573 6.37932 16.8889 7.03516 16.8889Z\" fill=\"white\"/>
        <path d=\"M14.25 16.8889C14.9058 16.8889 15.4375 16.3573 15.4375 15.7014C15.4375 15.0456 14.9058 14.5139 14.25 14.5139C13.5942 14.5139 13.0625 15.0456 13.0625 15.7014C13.0625 16.3573 13.5942 16.8889 14.25 16.8889Z\" fill=\"white\"/>
        <path d=\"M17.4588 2.83415C17.4097 2.7736 17.3478 2.72469 17.2775 2.69093C17.2073 2.65716 17.1304 2.63938 17.0524 2.63887H6.06409L6.40715 3.69442H16.361L14.9519 10.0278H7.0352L4.62326 2.39081C4.59717 2.30978 4.55187 2.23626 4.49121 2.17652C4.43056 2.11678 4.35635 2.07261 4.27493 2.04776L2.11104 1.38276C2.0445 1.36231 1.97459 1.35517 1.90529 1.36174C1.836 1.36832 1.76867 1.38847 1.70717 1.42106C1.58295 1.48688 1.48997 1.59935 1.44868 1.73373C1.40738 1.86811 1.42116 2.01338 1.48698 2.1376C1.5528 2.26182 1.66527 2.3548 1.79965 2.39609L3.69437 2.97665L6.11687 10.6294L5.25132 11.3366L5.1827 11.4053C4.9686 11.652 4.84725 11.9657 4.83954 12.2922C4.83183 12.6188 4.93826 12.9379 5.14048 13.1944C5.28433 13.3694 5.46713 13.5082 5.67424 13.5998C5.88136 13.6915 6.10705 13.7334 6.33326 13.7222H15.1419C15.2818 13.7222 15.4161 13.6666 15.5151 13.5676C15.614 13.4686 15.6696 13.3344 15.6696 13.1944C15.6696 13.0544 15.614 12.9202 15.5151 12.8212C15.4161 12.7223 15.2818 12.6666 15.1419 12.6666H6.24882C6.18804 12.6646 6.12883 12.6469 6.0769 12.6152C6.02497 12.5836 5.98207 12.5391 5.95236 12.486C5.92265 12.433 5.90712 12.3731 5.90728 12.3123C5.90743 12.2515 5.92327 12.1918 5.95326 12.1389L7.2252 11.0833H15.3741C15.4961 11.0863 15.6154 11.0469 15.7116 10.9718C15.8078 10.8968 15.8751 10.7907 15.9019 10.6716L17.5749 3.28276C17.591 3.20407 17.5889 3.12277 17.5687 3.04503C17.5486 2.96729 17.511 2.89516 17.4588 2.83415Z\" fill=\"white\"/>
    </svg>
</a>


<style>
    .bulb{
        position: absolute !important;
        top: -20px !important;
        left: 90px !important;
    }
    .bulb svg{
        width: 50px;
        color: #1b9bfc;
    }
    .bulb p{
        top: -5px;
        position: absolute;
        left: 110px;
        color: #1b9bfc;
    }
</style>

";
    }

    public function getTemplateName()
    {
        return "toka/template/common/cart.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 3,  50 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "toka/template/common/cart.twig", "");
    }
}
