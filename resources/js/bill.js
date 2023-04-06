const moreButtons = document.querySelectorAll('.more');
const lessButtons = document.querySelectorAll('.less');
const detailBills = document.querySelectorAll('.detail-bills');


function showDetailBill (index) {
    detailBills[index].classList.add('show-detail');
}
function hideDetailBill (index) {
    detailBills[index].classList.remove('show-detail');
}
function hideMoreButton (index) {
    moreButtons[index].classList.add('hide-button');
}
function showMoreButton (index) {
    moreButtons[index].classList.remove('hide-button');
}
function hideLessButton (index) {
    lessButtons[index].classList.remove('show-button');
}
function showLessButton (index) {
    lessButtons[index].classList.add('show-button');
}

moreButtons.forEach((moreButton, index) => {
    moreButton.addEventListener('click', function () {
        showDetailBill(index);
        hideMoreButton(index);
        showLessButton(index);
    });
});
lessButtons.forEach((lessButton, index) => {
    lessButton.addEventListener('click', function () {
        hideDetailBill(index);
        showMoreButton(index);
        hideLessButton(index);
    });
});