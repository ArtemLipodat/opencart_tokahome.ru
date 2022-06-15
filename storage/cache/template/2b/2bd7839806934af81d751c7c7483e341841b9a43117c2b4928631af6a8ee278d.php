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

/* toka/template/checkout/login.twig */
class __TwigTemplate_a266d04ae277c02e6e99053b01abee6a284c00f00d89a60cf155890c58532dbe extends \Twig\Template
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
        echo "<script>
  \$(document).ready(function(){
    setTimeout(function(){
      \$('#button-account').trigger('click');
    },300);
  });
</script>

<div class=\"row\">
  <div class=\"col-sm-6\">
    <h2>";
        // line 11
        echo ($context["text_new_customer"] ?? null);
        echo "</h2>
    <p>";
        // line 12
        echo ($context["text_checkout"] ?? null);
        echo "</p>
    <div class=\"radio\">
      <label> ";
        // line 14
        if ((($context["account"] ?? null) == "register")) {
            // line 15
            echo "        <input type=\"radio\" name=\"account\" value=\"register\" />
        ";
        } else {
            // line 17
            echo "        <input type=\"radio\" name=\"account\" value=\"register\" />
        ";
        }
        // line 19
        echo "        ";
        echo ($context["text_register"] ?? null);
        echo "</label>
    </div>
    ";
        // line 21
        if (($context["checkout_guest"] ?? null)) {
            // line 22
            echo "    <div class=\"radio\">
      <label> ";
            // line 23
            if ((($context["account"] ?? null) == "guest")) {
                // line 24
                echo "        <input type=\"radio\" name=\"account\" value=\"guest\" checked=\"checked\"/>
        ";
            } else {
                // line 26
                echo "        <input type=\"radio\" name=\"account\" value=\"guest\" checked=\"checked\" />
        ";
            }
            // line 28
            echo "        ";
            echo ($context["text_guest"] ?? null);
            echo "</label>
    </div>
    ";
        }
        // line 31
        echo "    <p>";
        echo ($context["text_register_account"] ?? null);
        echo "</p>
    <input type=\"button\" value=\"";
        // line 32
        echo ($context["button_continue"] ?? null);
        echo "\" id=\"button-account\" data-loading-text=\"";
        echo ($context["text_loading"] ?? null);
        echo "\" class=\"btn btn-primary\" />
  </div>
  <div class=\"col-sm-6\">
    <h2>";
        // line 35
        echo ($context["text_returning_customer"] ?? null);
        echo "</h2>
    <p>";
        // line 36
        echo ($context["text_i_am_returning_customer"] ?? null);
        echo "</p>
    <div class=\"form-group\">
      <label class=\"control-label\" for=\"input-email\">";
        // line 38
        echo ($context["entry_email"] ?? null);
        echo "</label>
      <input type=\"text\" name=\"email\" value=\"\" placeholder=\"";
        // line 39
        echo ($context["entry_email"] ?? null);
        echo "\" id=\"input-email\" class=\"form-control\" />
    </div>
    <div class=\"form-group\">
      <label class=\"control-label\" for=\"input-password\">";
        // line 42
        echo ($context["entry_password"] ?? null);
        echo "</label>
      <input type=\"password\" name=\"password\" value=\"\" placeholder=\"";
        // line 43
        echo ($context["entry_password"] ?? null);
        echo "\" id=\"input-password\" class=\"form-control\" />
      <a href=\"";
        // line 44
        echo ($context["forgotten"] ?? null);
        echo "\">";
        echo ($context["text_forgotten"] ?? null);
        echo "</a></div>
    <input type=\"button\" value=\"";
        // line 45
        echo ($context["button_login"] ?? null);
        echo "\" id=\"button-login\" data-loading-text=\"";
        echo ($context["text_loading"] ?? null);
        echo "\" class=\"btn btn-primary\" />
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "toka/template/checkout/login.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  142 => 45,  136 => 44,  132 => 43,  128 => 42,  122 => 39,  118 => 38,  113 => 36,  109 => 35,  101 => 32,  96 => 31,  89 => 28,  85 => 26,  81 => 24,  79 => 23,  76 => 22,  74 => 21,  68 => 19,  64 => 17,  60 => 15,  58 => 14,  53 => 12,  49 => 11,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "toka/template/checkout/login.twig", "");
    }
}
