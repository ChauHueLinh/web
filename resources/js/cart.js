
const clientInfomation = document.querySelector('.client-infomation');
const buyButton = document.querySelector('.buy');
const backToCart = document.querySelector('.back-to-cart');
const minusButtons = document.querySelectorAll('.minus');
const plusButtons = document.querySelectorAll('.plus');
 
function showClientInfomation () {
    clientInfomation.classList.add('show');
};
function hideClientInfomation () {
    clientInfomation.classList.remove('show');
};
function showBuyButton () {
    buyButton.classList.remove('hide');
};
function hideBuyButton () {
    buyButton.classList.add('hide');
};
function showMinusButton () {
    minusButtons.forEach((minusButton) => {
        minusButton.classList.remove('hide');
    });
};
function hideMinusButton () {
    minusButtons.forEach((minusButton) => {
        minusButton.classList.add('hide');
    });
};
function showPlusButton () {
    plusButtons.forEach((plusButton) => {
        plusButton.classList.remove('hide');
    });
};
function hidePlusButton () {
    plusButtons.forEach((plusButton) => {
        plusButton.classList.add('hide');
    });
};

buyButton.addEventListener('click', function () {
    showClientInfomation();
    hideBuyButton();
    hideMinusButton();
    hidePlusButton();
});
backToCart.addEventListener('click', function () {
    hideClientInfomation();
    showBuyButton();
    showMinusButton();
    showPlusButton();
});

