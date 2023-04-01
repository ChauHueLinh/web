
const close = document.querySelector('.close');
const previous = document.querySelector('.previous');
const next = document.querySelector('.next');
const gallery = document.querySelector('.gallery');
const galleryImg = document.querySelector('.gallery-img img');

let imgIndex = 0;
let images = document.querySelectorAll('.item img');
let lengthImages = images.length;

images.forEach((item, index) => {
    item.addEventListener('click', function() {
        imgIndex = index;
        gallery.classList.add('show');
        galleryImg.src = images[imgIndex].src;
    })
});

close.addEventListener('click', function() {
    gallery.classList.remove('show');
});

previous.addEventListener('click', function() {
    if(imgIndex > 0) {
        imgIndex--;
    } else {
        imgIndex = lengthImages - 1;
    }
    galleryImg.src = images[imgIndex].src;
});

next.addEventListener('click', function() {
    if(imgIndex < lengthImages - 1) {
        imgIndex++;
    } else {
        imgIndex = 0;
    }
    galleryImg.src = images[imgIndex].src;
});
// console.log(imgs);