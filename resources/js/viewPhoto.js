
const close = document.querySelector('.close');
const previous = document.querySelector('.previous');
const next = document.querySelector('.next');
const gallery = document.querySelector('.gallery');
const galleryImg = document.querySelector('.gallery-img img');

let index = 0;
let images = document.querySelectorAll('.photos img');
let length = images.length;


images.forEach((item, index) => {
    item.addEventListener('click', function() {
        index = index;
        gallery.classList.add('show');
        galleryImg.src = images[index].src;
    });
});
close.addEventListener('click', function() {
    gallery.classList.remove('show');
});

previous.addEventListener('click', function() {
    if(index > 0) {
        index--;
    } else {
        index = length - 1;
    }
    galleryImg.src = images[index].src;
});

next.addEventListener('click', function() {
    if(index < length - 1) {
        index++;
    } else {
        index = 0;
    }
    galleryImg.src = images[index].src;
});