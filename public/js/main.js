

$(function(){
    if ( $(window).width() > 768) {
        $("#burger").click(function(e){
            e.preventDefault();
            $("#burger").toggleClass("exit");
            $("#indexMenu").toggleClass("pos");
        });
    } else {
        $("#burger").click(function(e){
            e.preventDefault();
            $("#burger").toggleClass("exit");
            $(".top-cont__menu-block").toggleClass("pos");
        });
    }
});

$(".main-menu__link").click(function(){
    $("#burger").toggleClass("exit");
    $(".top-cont__menu-block").toggleClass("pos");
});

$(".select-block__link").click(function(e){
    e.preventDefault();
    $(".l-img").toggleClass("active");
    $(".block-rek").toggleClass("active");
});

var transfers = document.querySelectorAll(".transfersLink");
if (transfers) {
    for (var i = 0; i < transfers.length; i++) {
        transfers[i].onclick = function(e){
            e.preventDefault();
            $("#perevod2").toggleClass("active");
            $(".bg-mob").toggleClass("active");
            $(".mob-head").toggleClass("active");
        };
    }
}

var transfers = document.querySelectorAll(".transfersLink1");
if (transfers) {
    for (var i = 0; i < transfers.length; i++) {
        transfers[i].onclick = function(e){
            e.preventDefault();
            $("#perevod6").toggleClass("active");
            $(".bg-mob").toggleClass("active");
            $(".mob-head").toggleClass("active");
        };
    }
}

var transfers = document.querySelectorAll(".transfersLink2");
if (transfers) {
    for (var i = 0; i < transfers.length; i++) {
        transfers[i].onclick = function(e){
            e.preventDefault();
            $("#perevod7").toggleClass("active");
            $(".bg-mob").toggleClass("active");
            $(".mob-head").toggleClass("active");
        };
    }
}

var transfers = document.querySelectorAll(".transfersLink3");
if (transfers) {
    for (var i = 0; i < transfers.length; i++) {
        transfers[i].onclick = function(e){
            e.preventDefault();
            $("#perevod8").toggleClass("active");
            $(".bg-mob").toggleClass("active");
            $(".mob-head").toggleClass("active");
        };
    }
}


$("#linkPerevod").click(function(e){
    e.preventDefault();
    $("#perevod2").toggleClass("active");
    $(".bg-mob").toggleClass("active");
    $(".mob-head").toggleClass("active");
});

$("#linkPerevod2").click(function(e){
    e.preventDefault();
    $("#perevod2").toggleClass("active");
    $(".bg-mob").toggleClass("active");
    $(".mob-head").toggleClass("active");
});


$("#linkPerevod3").click(function(e){
    e.preventDefault();
    $("#perevod1").toggleClass("active");
    $(".bg-mob").toggleClass("active");
    $(".mob-head").toggleClass("active");
});

$(".userExit").click(function(e){
    e.preventDefault();
    $(".exit-mod").toggleClass("active");
    $(".bg-mob").toggleClass("active");
    $(".mob-head").toggleClass("active");
});

$(".exit-mod__link").click(function(e){
    //e.preventDefault();
    $(".exit-mod").removeClass("active");
    $(".bg-mob").removeClass("active");
    $(".mob-head").removeClass("active");
    $(".user-click").removeClass("active");
});

$(".block-link__prev").click(function(e){
    e.preventDefault();
    $("#perevod2").removeClass("active");
    $("#perevod1").removeClass("active");
    $("#perevod3").removeClass("active");
    $("#perevod5").removeClass("active");
    $("#perevod6").removeClass("active");
    $("#perevod7").removeClass("active");
    $("#perevod8").removeClass("active");
    $(".bg-mob").removeClass("active");
    $(".mob-head").removeClass("active");
});

$("#menuBurger").click(function(e){
    e.preventDefault();
    $(".mob-block").toggleClass("active");
    $(".bg-mob").toggleClass("active");
    $(".mob-head").toggleClass("active");
    $(".top-cont__menu-block").toggleClass("pos");
});

$(".mob-head__link").click(function(e){
    e.preventDefault();
    $(".mob-block").removeClass("active");
    $(".bg-mob").removeClass("active");
    $(".mob-head").removeClass("active");
    $("#blockLeft").removeClass("active");
    $(".operations-two").removeClass("active");
    $("#perevod1").removeClass("active");
    $("#perevod2").removeClass("active");
    $("#perevod3").removeClass("active");
    $("#perevod4").removeClass("active");
    $("#perevod5").removeClass("active");
    $("#perevod6").removeClass("active");
    $("#perevod7").removeClass("active");
    $(".top-cont__menu-block").removeClass("pos");
    $(".str-two").removeClass("active");
    $(".footer").removeClass("active");
});

$(".notifications").click(function(e){
    e.preventDefault();
    $("#uved1").toggleClass("active");
});


$("#uvedom").click(function(e){
    e.preventDefault();
    $("#uved2").toggleClass("active");
});

var exitArror = document.getElementById('exitArror');
if (exitArror) {
    var blockArror = document.getElementById('blockArror');

    exitArror.onclick = function() {
        blockArror.style.display = 'none';
    }
}


$('.ajax').submit(function(e) {
    e.preventDefault();

    var errorEl = $(e.target).find('.error'),
        successEl = $(e.target).find('.success');

    $.ajax({
        url      : '/api',
        method   : 'POST',
        data     : $(this).serialize(),
        dataType : 'json',
        complete : function(jqXHR, textStatus) {
            var res = jqXHR.responseJSON;

            if(res['error'] == 1) {
                errorEl.removeClass('hide');
                errorEl.html(res['message']);
            } else {
                if(successEl) {
                    successEl.removeClass('hide');
                    successEl.html(res['message']);
                }

                if(res.hasOwnProperty('location')) {
                    setTimeout(function() {
                        if(res['location'] == 'reload') {
                            document.location.reload();
                        } else {
                            document.location.href = res['location'];
                        }
                    }, 3000);
                }
            }

            // Reset reCaptcha
            if(gRenders) {
                for(var i = 0; i < gRenders.length; i++)
                    grecaptcha.reset(gRenders[i]);
            }
        },
        beforeSend : function() {
            errorEl.addClass('hide');
            errorEl.html('');

            if(successEl) {
                successEl.addClass('hide');
                successEl.html('');
            }
        }
    });
});



var noActive = document.querySelectorAll(".header-menu__no-active");
if (noActive) {
    for (var i = 0; i < noActive.length; i++) {
        noActive[i].onclick = function(){
            $(".block-noactive").addClass("active");
            $(".mob-block").removeClass("active");
            $(".bg-mob").removeClass("active");
            $(".mob-head").removeClass("active");
        };
    }

    $(".noactive-cont__link").click(function(e){
        e.preventDefault();
        $(".block-noactive").removeClass("active");
        $(".block-noactive-two").removeClass("active");
        $(".mob-block").addClass("active");
        $(".bg-mob").addClass("active");
        $(".mob-head").addClass("active");
    });

    $(".noactive-header__prev").click(function(e){
        e.preventDefault();
        $(".block-noactive").removeClass("active");
        $(".mob-block").addClass("active");
        $(".bg-mob").addClass("active");
        $(".mob-head").addClass("active");
    });
}

$(function() {
    $(".comment-item").on("click", ".comment-item__link", function(e) {
        $(".comment-item__text", e.delegateTarget).toggleClass("active");
        e.preventDefault();
    })
});

$("#linkLeft").click(function(e){
    e.preventDefault();
    $("#blockLeft").toggleClass("active");
    $(".bg-mob").toggleClass("active");
    $(".mob-head").toggleClass("active");
    $(".str-two").toggleClass("active");
    $(".footer").toggleClass("active");
});

$(".operations-block__link").click(function(e){
    e.preventDefault();
    $(".operations-two").toggleClass("active");
    $(".mob-head").toggleClass("active");
});

$(".bg-mob").click(function(e){
    e.preventDefault();
    $("#perevod3").removeClass("active");
    $("#perevod2").removeClass("active");
    $("#perevod5").removeClass("active");
    $("#perevod6").removeClass("active");
    $("#perevod7").removeClass("active");
    $(".exit-mod").removeClass("active");
    $(".user-click").removeClass("active");
    $(".top-cont__menu-block").removeClass("pos");
    $("#blockLeft").removeClass("active");
    $(".operations-two").removeClass("active");
    $("#perevod1").removeClass("active");
    $(".block-noactive").removeClass("active");
    $(".block-noactive-two").removeClass("active");
    $(".mob-block").removeClass("active");
    $(".mob-head").removeClass("active");
    $(".bg-mob").removeClass("active");
    $(".str-two").removeClass("active");
    $(".footer").removeClass("active");
});




// var operationsCont = document.querySelectorAll(".operations-cont");
// var noOperations = document.querySelectorAll(".operations-block__noOperations");
// if (!operationsCont) {
//     noOperations.style.display = 'flex';
// }

// $(".right-number__link").click(function(e){
// 	e.preventDefault();
// 	$(".active-simvol").toggleClass("active");
// 	$(".active-cod").toggleClass("active");
// });

$(function() {
    $(".number-block").on("click", ".right-number__link", function(e) {
        $(".active-simvol", e.delegateTarget).toggleClass("active");
        $(".active-cod", e.delegateTarget).toggleClass("active");
        e.preventDefault();
    })
});

// $(".item-serv").click(function(e){
//     e.preventDefault();
//     $(".div-text").addClass("active");
// });

$(".block-pos__link").click(function(e){
    e.preventDefault();
    $(".div-text-two").addClass("active");
});

$(".div-text__exit").click(function(e){
    e.preventDefault();
    $(".div-text").removeClass("active");
    $(".div-text-two").removeClass("active");
});


var cardsNumbersStars = $('#blockLeft .number-block .number-div .active-simvol');
var cardsNumbers = $('#blockLeft .number-block .number-div .active-cod');
for (var i = 10; i <= 31; i++) {
	if (i > 15 && i < 26) continue;
	$(cardsNumbersStars[i]).removeClass('active-simvol');
	$(cardsNumbers[i]).css('display', 'inline');
}


document.addEventListener("DOMContentLoaded", function() {

    // calculator
    const sumInput = document.querySelector('#sum-input'),
        termInput = document.querySelector('#term-input'),
        sumSlider = document.querySelector('#sum-slider'),
        termSlider = document.querySelector('#term-slider'),
        inputs = document.querySelectorAll('.input'),
        sliderInputs = document.querySelectorAll('.slider-input'),
        paymentMonthlyOutput = document.querySelector('#payment-month'),
        creditSum = document.querySelector('#creditSum'),
        creditTerm = document.querySelector('#creditTerm'),
        creditPercent = document.querySelector('#creditPercent'),
        monthlyPayment = document.querySelector('#monthlyPayment'),
        yearPercent = 9.5,
        monthlyPercent = yearPercent / 12;


    const assignSliderValue = () => {
        if(sumSlider) {
            sumInput.value = sumSlider.value;
        }
        if(termSlider) {
            termInput.value = termSlider.value;
        }
    };
    assignSliderValue();

    for (let input of sliderInputs) {
        input.addEventListener('input', () => {
            assignSliderValue();
            calculation(Number(sumInput.value), Number(termInput.value), monthlyPercent);
        })
    }


    const assignInputValue = () => {
        if(sumInput) {
            sumSlider.value = sumInput.value;
        }
        if(termInput) {
            termSlider.value = termInput.value;
        }
    };
    assignInputValue();

    for (let input of inputs) {
        input.addEventListener('input', () => {
            assignInputValue();
            calculation(Number(sumSlider.value), Number(termSlider.value), monthlyPercent);
        })
    }

    const calculation = (sum = 1, term = 1, percent = 1) => {
        /*
        *   monthlyPercentSum = sum * percent / 100
        *
        *   monthlyPaymentSum = sum / term + monthlyPercentSum
        *
        * */

        let monthlyPercentSum = Math.round(sum * percent / 100);
        let monthlyPaymentSum = Math.round(sum / term + monthlyPercentSum);
        let totalPaymentSum = monthlyPercentSum * term + sum;

        if (!monthlyPayment) {
            return false;
        } else {
            paymentMonthlyOutput.innerHTML = `${monthlyPaymentSum} руб`;
            creditSum.value = sum;
            creditTerm.value = term;
            creditPercent.value = yearPercent;
            monthlyPayment.value = monthlyPaymentSum;
        }

    };


// identify form
    const identifyForm = document.querySelector('#identifyForm');
    const citizenshipInputs = document.querySelectorAll('input[name="citizenship"]');
    const codeKazWrap = document.querySelector('#code-kaz-wrap');
    const codeKazHtml = '<p class="block-input__text">Код (КАЗ)</p>\n' +
        '<input type="text" name="code_kaz" id="code_kaz" placeholder="">';
    const passportIssuerWrapper = document.querySelector('#passportIssuerWrapper');
    const passportIssuerHtml = '<p class="block-input__text">Кем выдан</p>\n' +
        '<input type="text" name="passport_issuer" id="passport_issuer" placeholder="">';
    const issuerCodeWrapper = document.querySelector('#issuerCodeWrapper');
    const issuerCodeHtml = '<p class="block-input__text">Код подразделения</p>\n' +
        '<input type="text" name="issuer_address" id="issuer_address" placeholder="">';
    const inputRus = document.querySelector('#inputRus');

    if (inputRus) {
        inputRus.checked = true;
    }

    const removeKazHtml = () => {
        let codeKazHtmlP = document.querySelector('#passportIssuerWrapper p');
        let codeKazHtmlInput = document.querySelector('#passportIssuerWrapper input');

        if (codeKazHtmlP || codeKazHtmlInput) {
            codeKazHtmlP.remove();
            codeKazHtmlInput.remove();
        }
    };

    const removeIssuer = () => {
        let issuerP = document.querySelector('#passportIssuerWrapper p');
        let issuerInput = document.querySelector('#passportIssuerWrapper input');
        if (issuerP) {
            issuerP.remove();
        }
        if (issuerInput) {
            issuerInput.remove();
        }
    };

    const insertIssuer = () => {
        passportIssuerWrapper.insertAdjacentHTML('afterbegin', passportIssuerHtml);
    };

    const removeIssuerCode = () => {
        let issuerCodeP = document.querySelector('#issuerCodeWrapper p');
        let issuerCodeInput = document.querySelector('#issuerCodeWrapper input');
        if (issuerCodeP) {
            issuerCodeP.remove();
        }
        if (issuerCodeInput) {
            issuerCodeInput.remove();
        }
    };

    const insertIssuerCode = () => {
        issuerCodeWrapper.insertAdjacentHTML('afterbegin', issuerCodeHtml);

    };

    const insertTitle = (parentId, titleId, title) => {
        let parentElement = document.querySelector(parentId);
        let titleElement = document.querySelector(titleId);
        let newTitleElement = titleElement.cloneNode(false);

        newTitleElement.innerText = title;
        titleElement.remove();
        parentElement.insertAdjacentElement('afterbegin', newTitleElement);
    };

    for (let input of citizenshipInputs) {
        input.addEventListener('input', (event) => {
            if (event.target.value == 'Россия') {
                removeKazHtml();
                insertIssuer();

                removeIssuerCode();
                insertIssuerCode();

                passportIssuerWrapper.style.display = 'block';
                issuerCodeWrapper.style.display = 'block';

                insertTitle('#passportNum', '#passportNum p', 'Серия и номер паспорта');
                insertTitle('#identifyingNum', '#identifyingNum p', 'ИНН');
            } else if (event.target.value == 'Казахстан') {
                removeIssuer();
                removeIssuerCode();
                passportIssuerWrapper.style.display = 'block';
                passportIssuerWrapper.insertAdjacentHTML('afterbegin', codeKazHtml);
                issuerCodeWrapper.style.display = 'none';

                insertTitle('#passportNum', '#passportNum p', 'Паспорт №');
                insertTitle('#identifyingNum', '#identifyingNum p', 'РНН');
            } else if (event.target.value == 'Узбекистан') {
                removeKazHtml();

                insertTitle('#passportNum', '#passportNum p', 'Серия и номер документа');
                insertTitle('#identifyingNum', '#identifyingNum p', 'Номер идентификации');
                removeIssuer();
                removeIssuerCode();
                passportIssuerWrapper.style.display = 'none';
                issuerCodeWrapper.style.display = 'none';
            } else if (event.target.value == 'Беларусь') {
                removeKazHtml();

                insertTitle('#passportNum', '#passportNum p', 'Паспорт №');
                insertTitle('#identifyingNum', '#identifyingNum p', 'Идентификационный номер');
                removeIssuer();
                removeIssuerCode();
                passportIssuerWrapper.style.display = 'none';
                issuerCodeWrapper.style.display = 'none';
            } else if (event.target.value == 'Таджикистан') {
                removeKazHtml();

                insertTitle('#passportNum', '#passportNum p', 'Паспорт №');
                insertTitle('#identifyingNum', '#identifyingNum p', 'Номер идентификации');
                removeIssuer();
                removeIssuerCode();
                passportIssuerWrapper.style.display = 'none';
                issuerCodeWrapper.style.display = 'none';
            } else if (event.target.value == 'Украина') {
                removeKazHtml();

                insertTitle('#passportNum', '#passportNum p', 'Паспорт №');
                insertTitle('#identifyingNum', '#identifyingNum p', 'Идентификационный код');
                removeIssuer();
                removeIssuerCode();
                passportIssuerWrapper.style.display = 'none';
                issuerCodeWrapper.style.display = 'none';
            } else if (event.target.value == 'Польша') {
                removeKazHtml();

                insertTitle('#passportNum', '#passportNum p', 'Паспорт №');
                insertTitle('#identifyingNum', '#identifyingNum p', 'Идентификационный номер');
                removeIssuer();
                removeIssuerCode();
                passportIssuerWrapper.style.display = 'none';
                issuerCodeWrapper.style.display = 'none';
            } else if (event.target.value == 'Чехия') {
                removeKazHtml();

                insertTitle('#passportNum', '#passportNum p', 'Паспорт №');
                insertTitle('#identifyingNum', '#identifyingNum p', 'Идентификационный номер');
                removeIssuer();
                removeIssuerCode();
                passportIssuerWrapper.style.display = 'none';
                issuerCodeWrapper.style.display = 'none';
            }
        });
    }

// validate form inputs for empty value
    if (identifyForm) {
        identifyForm.addEventListener('submit', (event) => {
            let isEmptyField = false;
            let citizenship = event.target.elements.citizenship.value;

            let formFields = [
                document.querySelector('#passport_num'),
                document.querySelector('#last_name'),
                document.querySelector('#first_name'),
                document.querySelector('#patronymic'),
                document.querySelector('#issue_date'),
                document.querySelector('#birth_date'),
                document.querySelector('#user_address'),
                document.querySelector('#inn')
            ];

            switch(citizenship) {
                case 'Россия':
                    formFields.push(document.querySelector('#passport_issuer'),
                        document.querySelector('#issuer_address'));
                    for (let field of formFields) {
                        if (field.value === '') {
                            isEmptyField = true;
                            field.classList.add('arror-input');
                        }
                    }
                    break;
                case 'Казахстан':
                    formFields.push(document.querySelector('#code_kaz'));
                    for (let field of formFields) {
                        if (field.value === '') {
                            isEmptyField = true;
                            field.classList.add('arror-input');
                        }
                    }
                    break;
                case 'Узбекистан':
                    for (let field of formFields) {
                        if (field.value === '') {
                            isEmptyField = true;
                            field.classList.add('arror-input');
                        }
                    }
                    break;
                case 'Таджикистан':
                    for (let field of formFields) {
                        if (field.value === '') {
                            isEmptyField = true;
                            field.classList.add('arror-input');
                        }
                    }
                    break;
                case 'Украина':
                    for (let field of formFields) {
                        if (field.value === '') {
                            isEmptyField = true;
                            field.classList.add('arror-input');
                        }
                    }
                    break;
                case 'Беларусь':
                case 'Польша':
                case 'Чехия':
                    for (let field of formFields) {
                        if (field.value === '') {
                            isEmptyField = true;
                            field.classList.add('arror-input');
                        }
                    }
                    break;
            }

            if (isEmptyField) {
                event.preventDefault();
            }
        });
    }


// identify popup message
    const bindCardLink = document.querySelector('#bindCardLink');
    const bindCardLinkBack = document.querySelector('#bindCardLinkBack');

    if (bindCardLink) {
        bindCardLink.addEventListener('click', (event) => {
            event.preventDefault();
            document.querySelector('.block-noactive').classList.add('active');
        });
    }

    if (bindCardLinkBack) {
        bindCardLinkBack.addEventListener('click', (event) => {
            event.preventDefault();
            document.querySelector('.block-noactive').classList.remove('active');
            document.querySelector('.bg-mob').classList.remove('active');
        });
    }


// convertation
    const firstCurrencySumInput = document.querySelector('#first_currency_sum');
    const firstCurrencyInput = document.querySelector('#first_currency');

    if (firstCurrencySumInput || firstCurrencyInput) {
        firstCurrencySumInput.addEventListener('input', (event) => {
            let firstCurrencySum = event.target.value;
            let firstCurrency = document.querySelector('#first_currency').value;
            let secondCurrency = document.querySelector('#second_currency').value;

            fetch('/convert/handle', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json;charset=utf-8'
                },
                body: JSON.stringify({
                    first_currency_sum: firstCurrencySum,
                    first_currency: firstCurrency,
                    second_currency: secondCurrency
                })
            }).then(response => response.json())
                .then(data => {
                    let inputElement = document.querySelector('#second_currency_sum');
                    let errorElement = document.querySelector('#error');
                    if (data.errorSameCurrency) {
                        inputElement.classList.add('arror-input');
                        errorElement.innerText = data.errorSameCurrency;
                        errorElement.style.border = '2px solid red';
                        errorElement.style.padding = '5px';

                        setTimeout(() => {
                            inputElement.classList.remove('arror-input');
                            errorElement.innerText = '';
                            errorElement.style.border = 'none';
                            errorElement.style.padding = '0';
                        }, 4000);
                    } else {
                        inputElement.value = data.second_currency_sum;
                    }
                });
        });

        firstCurrencyInput.addEventListener('change', (event) => {
            let firstCurrency = event.target.value;
            let firstCurrencySum = document.querySelector('#first_currency_sum').value;
            let secondCurrency = document.querySelector('#second_currency').value;

            fetch('/convert/handle', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json;charset=utf-8'
                },
                body: JSON.stringify({
                    first_currency_sum: firstCurrencySum,
                    first_currency: firstCurrency,
                    second_currency: secondCurrency
                })
            }).then(response => response.json())
                .then(data => {
                    let inputElement = document.querySelector('#second_currency_sum');
                    let errorElement = document.querySelector('#error');
                    if (data.errorSameCurrency) {
                        inputElement.classList.add('arror-input');
                        errorElement.innerText = data.errorSameCurrency;
                        errorElement.style.border = '2px solid red';
                        errorElement.style.padding = '5px';

                        setTimeout(() => {
                            inputElement.classList.remove('arror-input');
                            errorElement.innerText = '';
                            errorElement.style.border = 'none';
                            errorElement.style.padding = '0';
                        }, 4000);
                    } else {
                        inputElement.value = data.second_currency_sum;
                    }
                });
        });
    }

// transactions inputs validation
    const inputNumElements = document.querySelectorAll('.input-num');
    const inputNumPhoneElements = document.querySelectorAll('.input-num-phone');

    if (inputNumElements) {
        for (let input of inputNumElements) {
            input.addEventListener('input', (event) => {
                let inputValue = event.target.value.replace(/\D/g, '');
                event.target.value = inputValue;
            });
        }
    }

    if (inputNumPhoneElements) {
        for (let input of inputNumPhoneElements) {
            input.addEventListener('input', (event) => {
                let inputValue = event.target.value.replace(/[^+\d]/g, '');
                event.target.value = inputValue;
            });
        }
    }


});






if ($(".block-pos__link")) {
    $(".block-pos__link").click(function(e){
        e.preventDefault();
        $(".block-noactive-two").addClass("active");
    });
}