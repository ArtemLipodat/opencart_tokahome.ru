// Создаём слайдер
// let slider = Peppermint(document.getElementById('slider'), {
//     slideshow: true,
//     speed: 500,
//     slideshowInterval: 6000,
//     dots: false,
// });

// document.addEventListener('DOMContentLoaded', function () {
//     $('.header-mobile-burder').onclick = function () {
//         $('.burger').toggleClass('.burger-active');
//     }
// })

document.addEventListener('DOMContentLoaded', function () {
    if (localStorage.getItem('city')) {
        $('#city').val(localStorage.getItem('city'))
    }

    $('#city').change(function () {
        localStorage.setItem('city', $(this).val())
    })
})

document.addEventListener('DOMContentLoaded', function () {
    if (localStorage.getItem('city')) {
        $('#mobile_city').val(localStorage.getItem('city'))
    }

    $('#mobile_city').change(function () {
        localStorage.setItem('city', $(this).val())
    })
})

function burger() {
    $('.burger').toggleClass('burger-active');
}

function remove(key) {
    $.ajax({
        url: 'index.php?route=checkout/cart/remove',
        type: 'post',
        data: 'key=' + key,
        dataType: 'json',
        success: function(json) {
            location.href = 'index.php?route=checkout/cart';
        },
    })
};

function telegram(idForm, idName, idTel, text){
    let form = document.getElementById(idForm);
    let name = form.querySelector('#'+idName);
    let tel = form.querySelector('#'+idTel);
    $.ajax({
        url: 'telegram.php',
        type: 'post',
        data: {nameVal: name.value, telVal: tel.value, textVal: text},
        dataType: 'json',
        success: function(json) {
            $.getScript('catalog/view/theme/toka/js/timer.js', function () {
                countDown();
            });
            let formContent = form.querySelector('.modal-form');
            formContent.innerHTML = "<div class='form-content'>" +
                "<span>В ближайшее время с Вами свяжется специалист и уточнит детали. \n" +
                "Спасибо за доверие!</span>" +
                "<h2 id='timer'>10 минут</h2>" +
                "<div class='form-content-a'>" +
                "<a target='_blank' href='https://t.me/rostecohrana'><svg width=\"20\" height=\"18\" viewBox=\"0 0 20 18\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n" +
                "<path d=\"M18.1892 1C18.7439 1 19.1623 1.51552 18.9385 2.47439L16.2235 16.0326C16.0337 16.9966 15.4839 17.2286 14.7249 16.7801L8.24867 11.7125C8.22356 11.6934 8.2031 11.6683 8.18898 11.6392C8.17487 11.61 8.16751 11.5777 8.16751 11.545C8.16751 11.5122 8.17487 11.48 8.18898 11.4508C8.2031 11.4217 8.22356 11.3965 8.24867 11.3774L15.7272 4.22201C16.0678 3.90239 15.6542 3.74773 15.2066 4.03642L5.82071 10.3103C5.79225 10.33 5.75993 10.3425 5.72621 10.347C5.69249 10.3515 5.65825 10.3477 5.62609 10.3361L1.64112 9.00089C0.755573 8.72767 0.755573 8.08326 1.84061 7.62445L17.7853 1.10826C17.9118 1.04398 18.0491 1.00718 18.1892 1V1Z\" stroke=\"#434C5E\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>\n" +
                "</svg>Написать в Telegram</a>" +
                "<a target='_blank' href='https://vk.com/toka_ru'><svg width=\"21\" height=\"13\" viewBox=\"0 0 21 13\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n" +
                "<path d=\"M12.2295 11.925V8.70521C14.4023 9.03495 15.0892 10.737 16.4728 11.925H20C19.1181 9.96546 17.8024 8.22982 16.1513 6.84801C17.4179 5.11203 18.7626 3.47789 19.4203 1H16.2146C14.9577 2.896 14.2951 5.11688 12.2295 6.58131V1H7.57692L8.68769 2.36744V7.24078C6.88513 7.03227 5.66718 3.74944 4.34692 1H1C2.21795 4.71441 4.78051 12.8657 12.2295 11.925V11.925Z\" stroke=\"#434C5E\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>\n" +
                "</svg>Написать в VK</a></div>" +
                "</div>";
        },
    })
}


