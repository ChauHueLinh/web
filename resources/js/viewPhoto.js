
const close = document.querySelector('.close');
const previous = document.querySelector('.previous');
const next = document.querySelector('.next');
const gallery = document.querySelector('.gallery');
const galleryImg = document.querySelector('.gallery-img img');

let index = 0;
let images = document.querySelectorAll('.photos img');
let lengthImages = images.length;


images.forEach((item, index) => {
    item.addEventListener('click', function() {
        indexImage = index;
        showPhoto();
    });
});

function showPhoto () {
    galleryImg.src = images[indexImage].src;
    gallery.classList.add('show');
};
function previousPhoto() {
    if(indexImage > 0) {
        indexImage--;
    } else {
        indexImage = lengthImages - 1;
    }
    showPhoto();
};
function nextPhoto() {
    if(indexImage < lengthImages - 1) {
        indexImage++;
    } else {
        indexImage = 0;
    }
    showPhoto();
};

close.addEventListener('click', function() {
    gallery.classList.remove('show');
});

previous.addEventListener('click', function() {
    previousPhoto();
});

next.addEventListener('click', function() {
    nextPhoto();
});

document.addEventListener('keydown', function(e) {
    if(e.keyCode == 27) {
        gallery.classList.remove('show');
    }
    if(e.keyCode == 37) {
        if (gallery.getAttribute('class') === 'gallery') {

        } else {
            previousPhoto();
        };
    }
    if(e.keyCode == 39) {
        if (gallery.getAttribute('class') === 'gallery') {

        } else {
            nextPhoto();
        };
    }
});