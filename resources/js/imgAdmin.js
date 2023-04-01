const images = document.getElementById('img');
const imgs = [
    './photos/default/1.jpg',
    './photos/default/2.jpg',
    './photos/default/3.jpg',
    './photos/default/4.jpg',
    './photos/default/5.jpg',
];

let indexImg = 0;
let lengthImgs = imgs.length;

function changeImg() {
    indexImg++
    if(indexImg >= lengthImgs) {
        indexImg = 0;
    }
    srcImg = imgs[indexImg]
    images.setAttribute('src', imgs[indexImg]);
    // console.log(srcImg);
}
setInterval(changeImg, 2000);