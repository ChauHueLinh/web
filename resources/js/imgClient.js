const images = document.getElementById('img');

let cards = document.getElementsByClassName('card');
console.log(cards);
// let imgs = card.getElementByTagName('img')
// console.log(imgs);
function changeImg() {
    // indexImg++
    // if(indexImg >= lengthImgs) {
    //     indexImg = 0;
    // }
    // srcImg = imgs[indexImg]
    // images.setAttribute('src', imgs[indexImg]);
    // console.log(imgs);
}
setInterval(changeImg, 2000);