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

/* default/template/extension/payment/yoomoney/kassa_form.twig */
class __TwigTemplate_f00edac2067d635ea54bf787cca694bad195527cb22cc0df55225e1452cb95f5 extends \Twig\Template
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
        if ((array_key_exists("fullView", $context) && ($context["fullView"] ?? null))) {
            // line 2
            echo ($context["header"] ?? null);
            echo ($context["column_left"] ?? null);
            echo ($context["column_right"] ?? null);
            echo "
<div class=\"container\">
    ";
            // line 4
            echo ($context["content_top"] ?? null);
            echo "
    ";
        }
        // line 6
        echo "
    ";
        // line 7
        if ( !twig_get_attribute($this->env, $this->source, ($context["kassa"] ?? null), "getEPL", [], "method", false, false, false, 7)) {
            // line 8
            echo "        <h3>";
            echo twig_get_attribute($this->env, $this->source, ($context["kassa"] ?? null), "getDisplayName", [], "method", false, false, false, 8);
            echo "</h3>
    ";
        }
        // line 10
        echo "    <style type=\"text/css\">
        .yoomoney_kassa_buttons {
            display: flex;
            justify-content: space-between;
        }

        .yoomoney_kassa_buttons_reverse {
            flex-direction: row-reverse;
        }

        .yoomoney-pay-button {
            position: relative;
            height: 60px;
            width: 155px;
            font-family: YandexSansTextApp-Regular, Arial, Helvetica, sans-serif;
            text-align: center;
        }

        .yoomoney-pay-button button {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 4px;
            transition: 0.1s ease-out 0s;
            color: #000;
            box-sizing: border-box;
            outline: 0;
            border: 0;
            background: #FFDB4D;
            cursor: pointer;
            font-size: 12px;
        }

        .yoomoney-pay-button button:hover, .yoomoney-pay-button button:active {
            background: #f2c200;
        }

        .yoomoney-pay-button button span {
            display: block;
            font-size: 20px;
            line-height: 20px;
        }

        .yoomoney-pay-button_type_fly {
            box-shadow: 0 1px 0 0 rgba(0, 0, 0, 0.12), 0 5px 10px -3px rgba(0, 0, 0, 0.3);
        }
    </style>
    <form method=\"post\" action=\"\" id=\"yoomoney-payment-form\">
        ";
        // line 60
        if (twig_get_attribute($this->env, $this->source, ($context["kassa"] ?? null), "getEPL", [], "method", false, false, false, 60)) {
            // line 61
            echo "            <input type=\"hidden\" name=\"kassa_payment_method\" value=\"\"/>
            <div class=\"yoomoney_kassa_buttons ";
            // line 62
            if ( !twig_get_attribute($this->env, $this->source, ($context["kassa"] ?? null), "useInstallmentsButton", [], "method", false, false, false, 62)) {
                echo " yoomoney_kassa_buttons_reverse";
            }
            echo "\">
                ";
            // line 63
            if (twig_get_attribute($this->env, $this->source, ($context["kassa"] ?? null), "useInstallmentsButton", [], "method", false, false, false, 63)) {
                // line 64
                echo "                    <div class=\"yoomoney_kassa_installments_button_container\"></div>
                ";
            }
            // line 66
            echo "            </div>
        ";
        } else {
            // line 68
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["kassa"] ?? null), "getEnabledPaymentMethods", [], "method", false, false, false, 68));
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
            foreach ($context['_seq'] as $context["_key"] => $context["method"]) {
                // line 69
                echo "                ";
                if ((($context["method"] == "installments") && (($context["amount"] ?? null) < twig_constant("YooMoneyModule\\Model\\KassaModel::MIN_INSTALLMENTS_AMOUNT")))) {
                    // line 70
                    echo "                ";
                } else {
                    // line 71
                    echo "                    <label class=\"kassa_payment_method_";
                    echo $context["method"];
                    echo "\">
                        <input type=\"radio\" name=\"kassa_payment_method\"
                               value=\"";
                    // line 73
                    echo $context["method"];
                    echo "\"";
                    echo ((twig_get_attribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 73)) ? (" checked") : (""));
                    echo " />
                        <img src=\"";
                    // line 74
                    echo ($context["image_base_path"] ?? null);
                    echo "/";
                    echo $context["method"];
                    echo ".png\"
                             alt=\"";
                    // line 75
                    echo twig_get_attribute($this->env, $this->source, ($context["language"] ?? null), "get", [0 => ("text_method_" . $context["method"])], "method", false, false, false, 75);
                    echo "\"/>
                        ";
                    // line 76
                    echo twig_get_attribute($this->env, $this->source, ($context["language"] ?? null), "get", [0 => ("text_method_" . $context["method"])], "method", false, false, false, 76);
                    echo "
                    </label>
                ";
                }
                // line 79
                echo "                ";
                if (($context["method"] == "qiwi")) {
                    // line 80
                    echo "                    <div id=\"payment-qiwi\" class=\"additional\" style=\"display: none;\">
                        <label for=\"qiwi-phone\">";
                    // line 81
                    echo twig_get_attribute($this->env, $this->source, ($context["language"] ?? null), "get", [0 => "text_payment_method_qiwi_phone"], "method", false, false, false, 81);
                    echo "</label><br/>
                        <input name=\"qiwiPhone\" id=\"qiwi-phone\" value=\"\"/>
                    </div>
                ";
                } elseif ((                // line 84
$context["method"] == "alfabank")) {
                    // line 85
                    echo "                    <div id=\"payment-alfabank\" class=\"additional\" style=\"display: none;\">
                        <label for=\"alfa-login\">";
                    // line 86
                    echo twig_get_attribute($this->env, $this->source, ($context["language"] ?? null), "get", [0 => "text_payment_method_alfa_login"], "method", false, false, false, 86);
                    echo "</label><br/>
                        <input name=\"alfaLogin\" id=\"alfa-login\" value=\"\"/>
                    </div>
                ";
                }
                // line 90
                echo "                <br/>
            ";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['method'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 92
            echo "        ";
        }
        // line 93
        echo "
        ";
        // line 94
        if (( !twig_get_attribute($this->env, $this->source, ($context["kassa"] ?? null), "getEPL", [], "method", false, false, false, 94) || twig_get_attribute($this->env, $this->source, ($context["kassa"] ?? null), "getEPL", [], "method", false, false, false, 94))) {
            // line 95
            echo "            <div class=\"buttons\">
                <div class=\"pull-right\">
                    <button class=\"btn btn-primary\" id=\"continue-button\" data-loading-text=\"";
            // line 97
            echo twig_get_attribute($this->env, $this->source, ($context["language"] ?? null), "get", [0 => "text_loading"], "method", false, false, false, 97);
            echo "\" type=\"button\">
                        ";
            // line 98
            echo twig_get_attribute($this->env, $this->source, ($context["language"] ?? null), "get", [0 => "text_continue"], "method", false, false, false, 98);
            echo "
                    </button>
                </div>
            </div>
        ";
        }
        // line 103
        echo "    </form>
    <div id=\"payment-form\" style=\"display: none;\"></div>
    <script src=\"https://yookassa.ru/checkout-ui/v2.js\"></script>
    <script type=\"text/javascript\"><!--
        var paymentType = jQuery('input[name=kassa_payment_method]');
        paymentType.change(function () {
            var id = '#payment-' + jQuery(this).val();
            jQuery('.additional').css('display', 'none');
            jQuery(id).css('display', 'block');
        });

        var continueButton = '#continue-button';
        jQuery(document).off('click.default', continueButton).on('click.default', continueButton, function (e) {
            e.preventDefault();
            createPayment(jQuery(this));
        });

        function buttonAction(button, action) {
            if (jQuery.fn.button && button) {
                button.button(action);
            }
        }

        function createPayment(button) {
            button = button || null;
            var form = jQuery(\"#yoomoney-payment-form\")[0];
            jQuery('#payment-form').hide();
            jQuery.ajax({
                url: \"";
        // line 131
        echo ($context["validate_url"] ?? null);
        echo "\",
                dataType: \"json\",
                method: \"GET\",
                data: {
                    paymentType: form.kassa_payment_method.value,
                    qiwiPhone: (form.qiwiPhone ? form.qiwiPhone.value : ''),
                    alphaLogin: (form.alfaLogin ? form.alfaLogin.value : '')
                },
                beforeSend: function() {
                    buttonAction(button, 'loading');
                },
                success: function (data) {
                    if (data.success) {
                        if (data.token) {
                            initWidget(data);
                        } else {
                            document.location = data.redirect;
                        }
                    } else {
                        onValidateError(data.error);
                        buttonAction(button, 'reset');
                    }
                },
                failure: function () {
                    onValidateError('Failed to create payment');
                    buttonAction(button, 'reset');
                }
            });
        }

        function initWidget(data) {
            var widget_form = jQuery('#payment-form');
            widget_form.empty();
            const checkout = new window.YooMoneyCheckoutWidget({
                confirmation_token: data.token,
                return_url: data.redirect,
                embedded_3ds: true,
                error_callback: function(error) {
                    if (error.error === 'token_expired') {
                        resetToken();
                        createPayment();
                    }
                }
            });

            checkout.render('payment-form');
            jQuery('#yoomoney-payment-form').hide();
            widget_form.show();
        }

        function resetToken() {
            jQuery.ajax({
                url: \"";
        // line 183
        echo ($context["reset_token_url"] ?? null);
        echo "\",
                dataType: \"json\",
                method: \"GET\",
                failure: function () {
                    onValidateError(\"Failed to reset token\");
                }
            });
        }

        ";
        // line 192
        if (twig_get_attribute($this->env, $this->source, ($context["kassa"] ?? null), "isInstallmentsOn", [], "method", false, false, false, 192)) {
            // line 193
            echo "            function createCheckoutCreditUI() {
                if (typeof CheckoutCreditUI === \"undefined\") {
                    setTimeout(createCheckoutCreditUI, 200);
                    return;
                }
                const yoomoneyCheckoutCreditUI = CheckoutCreditUI({
                    shopId: ";
            // line 199
            echo twig_get_attribute($this->env, $this->source, ($context["kassa"] ?? null), "getShopId", [], "method", false, false, false, 199);
            echo ",
                    sum: ";
            // line 200
            echo ($context["amount"] ?? null);
            echo ",
                    language: \"";
            // line 201
            echo twig_get_attribute($this->env, $this->source, ($context["language"] ?? null), "get", [0 => "code"], "method", false, false, false, 201);
            echo "\"
                });
                const checkoutCreditButton = yoomoneyCheckoutCreditUI({
                    type: 'button',
                    tag: 'button',
                    domSelector: '.yoomoney_kassa_installments_button_container'
                });
                jQuery('.yoomoney_kassa_installments_button_container button').off('click').on('click', function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    jQuery.ajax({
                        url: \"";
            // line 212
            echo ($context["validate_url"] ?? null);
            echo "\",
                        dataType: \"json\",
                        method: \"GET\",
                        data: {
                            paymentType: \"installments\",
                        },
                        success: function (data) {
                            if (data.success) {
                                document.location = data.redirect;
                            } else {
                                onValidateError(data.error);
                            }
                        },
                        failure: function () {
                            onValidateError(\"Failed to create payment\");
                        }
                    });
                });
            }

            setTimeout(createCheckoutCreditUI, 200);

            jQuery.get(\"https://yoomoney.ru/credit/order/ajax/credit-pre-schedule?shopId=\"
                + ";
            // line 235
            echo twig_get_attribute($this->env, $this->source, ($context["kassa"] ?? null), "getShopId", [], "method", false, false, false, 235);
            echo " +\"&sum=\" + ";
            echo ($context["amount"] ?? null);
            echo ", function (data) {
                const yoomoney_installments_amount_text = \"";
            // line 236
            echo twig_get_attribute($this->env, $this->source, ($context["language"] ?? null), "get", [0 => "text_method_installments_amount"], "method", false, false, false, 236);
            echo "\";
                if (yoomoney_installments_amount_text && data && data.amount) {
                    jQuery('label.kassa_payment_method_installments').append(yoomoney_installments_amount_text.replace('%s', data.amount));
                }
            });
        ";
        }
        // line 242
        echo "
        function onValidateError(errorMessage) {
            var warning = jQuery('#yoomoney-payment-form .alert');
            if (warning.length > 0) {
                warning.fadeOut(300, function () {
                    warning.remove();
                    var content = '<div class=\"alert alert-danger\">' + errorMessage + '<button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button></div>';
                    jQuery('#yoomoney-payment-form').prepend(content);
                    jQuery('#yoomoney-payment-form .alert').fadeIn(300);
                });
            } else {
                var content = '<div class=\"alert alert-danger\">' + errorMessage + '<button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button></div>';
                jQuery('#yoomoney-payment-form').prepend(content);
                jQuery('#yoomoney-payment-form .alert').fadeIn(300);
            }
        }
    //--></script>

    ";
        // line 260
        if ((array_key_exists("fullView", $context) && ($context["fullView"] ?? null))) {
            // line 261
            echo "    ";
            echo ($context["content_bottom"] ?? null);
            echo "
</div>
";
            // line 263
            echo ($context["footer"] ?? null);
            echo "
";
        }
    }

    public function getTemplateName()
    {
        return "default/template/extension/payment/yoomoney/kassa_form.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  448 => 263,  442 => 261,  440 => 260,  420 => 242,  411 => 236,  405 => 235,  379 => 212,  365 => 201,  361 => 200,  357 => 199,  349 => 193,  347 => 192,  335 => 183,  280 => 131,  250 => 103,  242 => 98,  238 => 97,  234 => 95,  232 => 94,  229 => 93,  226 => 92,  211 => 90,  204 => 86,  201 => 85,  199 => 84,  193 => 81,  190 => 80,  187 => 79,  181 => 76,  177 => 75,  171 => 74,  165 => 73,  159 => 71,  156 => 70,  153 => 69,  135 => 68,  131 => 66,  127 => 64,  125 => 63,  119 => 62,  116 => 61,  114 => 60,  62 => 10,  56 => 8,  54 => 7,  51 => 6,  46 => 4,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/extension/payment/yoomoney/kassa_form.twig", "");
    }
}
