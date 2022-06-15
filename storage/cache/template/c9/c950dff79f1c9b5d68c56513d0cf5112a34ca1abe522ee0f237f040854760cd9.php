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

/* toka/template/common/footer.twig */
class __TwigTemplate_59b2ae47af82a98ba1295e7866f7873fd70c6524331094f5206f3cff2169c20d extends \Twig\Template
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
        echo "<footer class=\"footer\">
  ";
        // line 2
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["informations"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["information"]) {
            // line 3
            echo "  <a href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["information"], "href", [], "any", false, false, false, 3);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["information"], "title", [], "any", false, false, false, 3);
            echo "</a>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['information'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 5
        echo "</footer>

<div class=\"burger\">
  ";
        // line 8
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["informations"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["information"]) {
            // line 9
            echo "    <a href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["information"], "href", [], "any", false, false, false, 9);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["information"], "title", [], "any", false, false, false, 9);
            echo "</a>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['information'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 11
        echo "</div>
<script type=\"text/javascript\" src=\"https://vk.com/js/api/openapi.js?169\"></script>
<div class=\"modal\" id=\"ask_question\">
  <div class=\"modal-header\">
    <svg width=\"20\" height=\"20\" viewBox=\"0 0 20 20\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
      <path d=\"M18.1892 1C18.7439 1 19.1623 1.57779 18.9385 2.65249L16.2235 17.8484C16.0337 18.9289 15.4839 19.1889 14.7249 18.6862L8.24867 13.0065C8.22356 12.9851 8.2031 12.9569 8.18898 12.9243C8.17487 12.8916 8.16751 12.8554 8.16751 12.8187C8.16751 12.782 8.17487 12.7459 8.18898 12.7132C8.2031 12.6805 8.22356 12.6524 8.24867 12.631L15.7272 4.6112C16.0678 4.25297 15.6542 4.07963 15.2066 4.4032L5.82071 11.4349C5.79225 11.457 5.75993 11.471 5.72621 11.476C5.69249 11.481 5.65825 11.4769 5.62609 11.4638L1.64112 9.96734C0.755573 9.66111 0.755573 8.93887 1.84061 8.42463L17.7853 1.12134C17.9118 1.0493 18.0491 1.00804 18.1892 1V1Z\" stroke=\"#434C5E\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>
    </svg>
    <span>Задать вопрос</span>
  </div>
  <div class=\"modal-form\">
    <input id=\"name\" type=\"text\" name=\"name\" placeholder=\"Ваше имя\">
    <input id=\"tel\" type=\"tel\" name=\"tel\" placeholder=\"Номер телефона\">
    <input id=\"email\" type=\"email\" name=\"email\" placeholder=\"E-mail\">
    <textarea id=\"message\" name=\"messages\" placeholder=\"Сообщение\"></textarea>
    <button>Отправить</button>
  </div>
</div>
<div class=\"modal\" id=\"orderModal1\">
  <div class=\"modal-header\">
    <span>Заказать монтаж из моего оборудования</span>
  </div>
  <div class=\"modal-form\">
    <input id=\"name\" type=\"text\" name=\"name\" placeholder=\"Ваше имя\">
    <input id=\"tel\" type=\"tel\" name=\"tel\" placeholder=\"Номер телефона\">
    <button onclick=\"telegram('orderModal1', 'name', 'tel', 'Заказать монтаж из моего оборудования')\">Отправить</button>
  </div>
</div>
<div class=\"modal\" id=\"orderModal2\">
  <div class=\"modal-header\">
    <span>Подобрать оборудование под мою задачу</span>
  </div>
  <div class=\"modal-form\">
    <input id=\"name\" type=\"text\" name=\"name\" placeholder=\"Ваше имя\">
    <input id=\"tel\" type=\"tel\" name=\"tel\" placeholder=\"Номер телефона\">
    <button onclick=\"telegram('orderModal2', 'name', 'tel', 'Подобрать оборудование под мою задачу')\">Отправить</button>
  </div>
</div>
<div class=\"modal\" id=\"query\">
  <div id=\"vk_community_message\"></div>
  <script type=\"text/javascript\">
    VK.Widgets.CommunityMessages(\"vk_community_message\", 61937464, {expandTimeout: true,disableExpandChatSound: \"1\",tooltipButtonText: \"Есть вопрос?\"});
  </script>
</div>
";
        // line 60
        echo "

<script>


    VK.Widgets.CommunityMessages(\"vk_community_messages\", 61937464, {disableExpandChatSound: \"1\",tooltipButtonText: \"Есть вопрос?\"});

</script>

<!-- VK Widget -->
<div id=\"vk_community_messages\"></div>
";
        // line 74
        echo "<script src=\"catalog/view/theme/toka/js/peppermint.min.js\" type=\"text/javascript\"></script>
<script src=\"catalog/view/theme/toka/js/common.js\" type=\"text/javascript\"></script>
<script src=\"catalog/view/theme/toka/js/magnific/jquery.magnific-popup.min.js\"></script>


";
        // line 80
        echo "<script src=\"catalog/view/javascript/bootstrap/js/bootstrap.min.js\" type=\"text/javascript\"></script>
<script src=\"catalog/view/javascript/jquery/datetimepicker/moment/moment.min.js\" type=\"text/javascript\"></script>
<script src=\"catalog/view/javascript/jquery/datetimepicker/moment/moment-with-locales.min.js\" type=\"text/javascript\"></script>
<script src=\"catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.js\" type=\"text/javascript\"></script>
<script src=\"catalog/view/javascript/lightcheckout/lightcheckout.js\" type=\"text/javascript\"></script>

</body>
</html>";
    }

    public function getTemplateName()
    {
        return "toka/template/common/footer.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  140 => 80,  133 => 74,  120 => 60,  75 => 11,  64 => 9,  60 => 8,  55 => 5,  44 => 3,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "toka/template/common/footer.twig", "");
    }
}
