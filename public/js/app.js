window.addEventListener('load', () => {

    if ('serviceWorker' in navigator){

        navigator.serviceWorker.register('./sw.js')
        .then(registration => {
                // console.log('Service worker successfully registered', registration);
            })
        .catch(error => {
                // console.log('Service worker registration failed', error);
            });
    }

    const MLinks = document.querySelectorAll('.MLink');
    const mplayercode = '<video-js class="vjs-fluid" id="mediaplayer"></video-js>';
    const mplayerOptions = {
        controls: true,
        autoplay: false,
        preload: "auto"
    };
    // var mplayer = videojs('mediaplayer');

    for (let i = 0; i < MLinks.length; i++) {
        MLinks[i].onclick = function(e){
            e.preventDefault();
            const sourceLink = this.getAttribute('data-mlink');
            const sourceType = this.getAttribute('data-mtype');

            let mplayer;
            // init player
            if (!document.querySelector('#mediaplayer')) {
                console.log('tut');
                document.querySelector('div.mediaplayer').innerHTML = mplayercode;
                mplayer = videojs('mediaplayer', mplayerOptions);
                mplayer.mobileUi();
            } else {
                console.log('tam');
                mplayer = videojs('mediaplayer');
                mplayer.mobileUi();
            }

            mplayer.ready(function() {
                mplayer.src([
                    {type:sourceType, src:sourceLink}
                    ]);
                mplayer.volume(0.5);
                mplayer.play();
                // console.log(mplayer);
            });

        };
    }

    // Setup players volume
    const players = document.querySelectorAll('.video-js');
    for (let i = 0; i < players.length; i++) {
        if( players[i].hasAttribute('data-volume') ){
            players[i].firstElementChild.volume = players[i].getAttribute('data-volume');
        }
    }
});
// Jivo
function chatOpen() {
    const widget_id = '0UbgArqBIb';
    const s = document.createElement('script');
    s.type = 'text/javascript';
    s.async = true;
    s.src = '//code-ya.jivosite.com/widget/'+widget_id;
    const ss = document.getElementsByTagName('script')[0];
    if (ss.src.indexOf(widget_id) === -1) {
        ss.parentNode.insertBefore(s, ss);

    } else {
        // console.log('виджет уже имеется, открываю');
        jivo_api.open();
    }

}
function jivo_onLoadCallback() {
    // console.log('Виджет загрузился');
    const contractNumber = document.querySelector('#userInfo>strong').textContent;
    const userName = document.querySelector('#userName').textContent;
    jivo_api.setContactInfo({
        name: userName,
        description: "Номер договора: " + contractNumber
    });
    jivo_api.open();
}

// Market order
const orderButtons = document.querySelectorAll('.btn-buy>.btn');
const placeOrderForm = document.querySelector('#placeOrderForm');

orderButtons.forEach((el)=>el.addEventListener('click', makeModal));
placeOrderForm.addEventListener('submit', checkOrderForm);

function makeModal(e) {
    const marketOrderDetails = document.querySelector('#marketOrder .modal-body .orderDetails');
    const productIdInput = document.querySelector('#productId');
    productIdInput.value = e.target.dataset.id;
    marketOrderDetails.innerHTML = e.target.dataset.name;
    $('#marketOrder').modal('show');
    return true;
}

function checkOrderForm(e) {
    e.preventDefault();
    const phoneInput = document.querySelector('#orderPhone');
    const orderPhone = phoneInput.value;

    const regexp = /[\d\(\)\ \-+]{6,20}\d$/;
    if (orderPhone === '') {
        phoneInput.classList.add('is-invalid');
        return false;
    } else if (!regexp.test(orderPhone)) {
        phoneInput.classList.add('is-invalid');
        return false;
    }

    e.submitter.setAttribute('disabled', '');
    phoneInput.classList.remove('is-invalid');
    phoneInput.classList.add('is-valid');
    e.target.submit();

    return true;
}
// placeOrderButton.addEventListener('click', async (e) => {
//     e.preventDefault();
//     const phoneInput = document.querySelector('#orderPhone');
//     const orderPhone = phoneInput.value;
//     const regexp = /[\d\(\)\ \-+]{6,20}\d$/;
//     if (orderPhone === '') {
//         phoneInput.classList.add('is-invalid');
//         return false;
//     } else if (!regexp.test(orderPhone)) {
//         phoneInput.classList.add('is-invalid');
//         return false;
//     }
//     phoneInput.setAttribute('disabled', 'disabled');
//     placeOrderButton.setAttribute('disabled', 'disabled');
//     phoneInput.classList.remove('is-invalid');
//
//     let response = await fetch('./market/placeorder', {
//         method: 'POST',
//         body: {
//             orderPhone: orderPhone
//         },
//     });
//
//     let result = await response;
//     alert(result);
//
// });


// // Проверка полей
// var regexp = /^[\d\-]+$/;
// if (contractNum === '') {
//     inpContractNumError.fadeOut().fadeIn().text(errorEmpty);
//     inpContractNum.addClass('input_error');
//     return false;
// } else if (!regexp.test(contractNum)) {
//     inpContractNumError.fadeOut().fadeIn().text(errorContractNumMask);
//     inpContractNum.addClass('input_error');
//     return false;
// } else {
//     inpContractNumError.fadeOut();
//     inpContractNum.removeClass('input_error');
// }
// regexp = /^[\d]+$/i;
// if (amount === '') {
//     inpAmountError.fadeOut().fadeIn().text(errorEmpty);
//     inpAmount.addClass('input_error');
//     return false;
// } else if (!regexp.test(amount)) {
//     inpAmountError.fadeOut().fadeIn().text(errorAmountMask);
//     inpAmount.addClass('input_error');
//     return false;
// } else {
//     inpAmountError.fadeOut();
//     inpAmount.removeClass('input_error');
// }
// regexp = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,5})$/i;
// if (email === '' && $("#payform__input-fz54-check").is(':checked')) {
//     inpEmailError.fadeOut().fadeIn().text(errorEmail);
//     inpEmail.addClass('input_error');
//     return false;
// } else if (email !== '' && !regexp.test(email) && $("#payform__input-fz54-check").is(':checked')) {
//     inpEmailError.fadeOut().fadeIn().text(errorEmailMask);
//     inpEmail.addClass('input_error');
//     return false;
// } else {
//     inpEmailError.fadeOut();
//     inpEmail.removeClass('input_error');
// }


// function jivo_onClose() {
//     console.log('Widget closed');
// }
// function jivo_onOpen() {
//     console.log('Widget opened');
//     var contractNumber = document.querySelector('#userInfo>strong').textContent;
//     var userName = document.querySelector('#userName').textContent;
//     // console.log(contractNumber + userName);
//     jivo_api.setContactInfo({
//         name: userName,
//         description: "Номер договора: " + contractNumber
//     });
// }


// Для мобильных

// var player = videojs('#player-id');
// // can also be `tap` or `touchend` or some other event instead of `click`
// player.on('click', function() {
//   if (player.paused()) {
//     player.play();
//   } else {
//     player.pause();
//   }
// });
