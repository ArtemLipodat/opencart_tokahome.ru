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

/* toka/template/product/product.twig */
class __TwigTemplate_2473f524816009414397602685aa789e1aebfd67b51699fdddd7058382a6fb80 extends \Twig\Template
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
<div class=\"product-cart\" style=\"min-height: 100vh; margin-top: 35px\">
    <div class=\"product-cart-header\">
        <h2 style=\"width: 60%\">";
        // line 4
        echo ($context["heading_title"] ?? null);
        echo "</h2>
        <a href=\"";
        // line 5
        echo twig_get_attribute($this->env, $this->source, (($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = ($context["breadcrumbs"] ?? null)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4[1] ?? null) : null), "href", [], "any", false, false, false, 5);
        echo "\">Назад</a>
    </div>
    <div class=\"product-cart-info\">
        <div class=\"product-cart-info-photo\">
            <ul class=\"thumbnails\">
                <li><a class=\"thumbnail\" href=\"";
        // line 10
        echo ($context["popup"] ?? null);
        echo "\"><img class=\"images\" src=\"";
        echo ($context["thumb"] ?? null);
        echo "\" alt=\"\"></a></li>
                ";
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["images"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["image"]) {
            // line 12
            echo "                <li class=\"image-additional\"><a class=\"thumbnail\" href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["image"], "popup", [], "any", false, false, false, 12);
            echo "\"><img src=\"";
            echo twig_get_attribute($this->env, $this->source, $context["image"], "thumb", [], "any", false, false, false, 12);
            echo "\" alt=\"\"></a></li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['image'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 14
        echo "            </ul>
        </div>
        <div class=\"product-cart-info-text\">
            <span class=\"price\">Цена:</span>
            <div class=\"cart-price\">
                ";
        // line 19
        if (twig_get_attribute($this->env, $this->source, (($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = ($context["discounts"] ?? null)) && is_array($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144) || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 instanceof ArrayAccess ? ($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144[0] ?? null) : null), "price", [], "any", false, false, false, 19)) {
            // line 20
            echo "                <span>";
            echo twig_get_attribute($this->env, $this->source, (($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b = ($context["discounts"] ?? null)) && is_array($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b) || $__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b instanceof ArrayAccess ? ($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b[0] ?? null) : null), "price", [], "any", false, false, false, 20);
            echo "</span>
                ";
        }
        // line 22
        echo "                <span>";
        echo ($context["price"] ?? null);
        echo "</span>
            </div>
            <a type=\"button\" id=\"button-cart\" data-loading-text=\"Загрузка...\">Купить</a>
            ";
        // line 25
        if ((($context["stock"] ?? null) == "Есть в наличии")) {
            // line 26
            echo "            <span class=\"instock\">В наличии</span>
            ";
        }
        // line 28
        echo "            <p>ГАРАНТИЯ НА ОБОРУДОВАНИЕ 7 лет</p>
            ";
        // line 29
        if ((($context["catId"] ?? null) == 59)) {
            // line 30
            echo "            <a  class=\"online_video\" style=\"text-decoration: none; width: 370px\" href=\"#onlineVideo\" rel=\"modal:open\">Видеонаблюдение онлайн</a>
            ";
        }
        // line 32
        echo "        </div>
        <div class=\"modal\" id=\"onlineVideo\">
            <iframe id=\"iframe\" src=\"https://rtsp.me/embed/zYbSibYN/\" width=\"870px\" height=\"600px\"></iframe>
        </div>
    </div>
    <div class=\"product-cart-desc\">
        <h2>Описание</h2>
        ";
        // line 39
        echo ($context["description"] ?? null);
        echo "
    </div>
</div>
";
        // line 42
        echo ($context["footer"] ?? null);
        echo "


<script type=\"text/javascript\">
    \$(document).ready(function() {
        \$('.thumbnails').magnificPopup({
            type:'image',
            delegate: 'a',
            gallery: {
                enabled: true
            },
            image: {
                verticalFit: true,
            }
        });
    });


    \$('#button-cart').on('click', function() {
        \$.ajax({
            url: 'index.php?route=checkout/cart/add',
            type: 'post',
            data: {quantity:1, product_id:";
        // line 64
        echo ($context["product_id"] ?? null);
        echo " },
            dataType: 'json',
            beforeSend: function() {
                \$('#button-cart').text('Загрузка');
            },
            complete: function(json) {
                \$('#button-cart').replaceWith('<a type=\"button\" id=\"button-cart\" href=\"https://tokahome.ru/index.php?route=checkout/cart\">В Корзину</a>');
                \$('#button-cart').css('background-color', '#acacad');
                \$('.instock').before('<div class=\"product\">Товар добавлен в корзину</div>')
                \$.ajax({
                    url: 'index.php?route=common/cart/info',
                    type: 'post',
                    dataType: 'json',
                    complete: function (json){
                        // \$('#shoppingBag').children('a').replaceWith(json.responseText);
                        \$('#shoppingBag').html(json.responseText);
                        \$('#mobile-replace').html(json.responseText);
                        // \$('#shoppingBag').text(json.responseText)
                    }
                })
            },
            // success: function(json) {
            //     \$('.alert-dismissible, .text-danger').remove();
            //     \$('.form-group').removeClass('has-error');
            //
            //     if (json['error']) {
            //         if (json['error']['option']) {
            //             for (i in json['error']['option']) {
            //                 var element = \$('#input-option' + i.replace('_', '-'));
            //
            //                 if (element.parent().hasClass('input-group')) {
            //                     element.parent().after('<div class=\"text-danger\">' + json['error']['option'][i] + '</div>');
            //                 } else {
            //                     element.after('<div class=\"text-danger\">' + json['error']['option'][i] + '</div>');
            //                 }
            //             }
            //         }
            //
            //         if (json['error']['recurring']) {
            //             \$('select[name=\\'recurring_id\\']').after('<div class=\"text-danger\">' + json['error']['recurring'] + '</div>');
            //         }
            //
            //         // Highlight any found errors
            //         \$('.text-danger').parent().addClass('has-error');
            //     }
            //
            //     if (json['success']) {
            //         \$('.breadcrumb').after('<div class=\"alert alert-success alert-dismissible\">' + json['success'] + '<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>');
            //
            //         \$('#cart > button').html('<span id=\"cart-total\"><i class=\"fa fa-shopping-cart\"></i> ' + json['total'] + '</span>');
            //
            //         \$('html, body').animate({ scrollTop: 0 }, 'slow');
            //
            //         \$('#cart > ul').load('index.php?route=common/cart/info ul li');
            //     }
            // },
            // error: function(xhr, ajaxOptions, thrownError) {
            //     alert(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
            // }
        });
    });
</script>



";
    }

    public function getTemplateName()
    {
        return "toka/template/product/product.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  153 => 64,  128 => 42,  122 => 39,  113 => 32,  109 => 30,  107 => 29,  104 => 28,  100 => 26,  98 => 25,  91 => 22,  85 => 20,  83 => 19,  76 => 14,  65 => 12,  61 => 11,  55 => 10,  47 => 5,  43 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "toka/template/product/product.twig", "");
    }
}
