const girl = document.getElementById('girl');
const origin = document.getElementById('origin');
const photo = document.getElementById('photo');
const level = document.getElementById('level');
const account = document.getElementById('account');
const user = document.getElementById('user');
const girlAction = document.getElementById('girl-action');
const originAction = document.getElementById('origin-action');
const photoAction = document.getElementById('photo-action');
const levelAction = document.getElementById('level-action');
const accountAction = document.getElementById('account-action');
const userAction = document.getElementById('user-action');

girl.addEventListener("click", changeClassgirlAction);
function changeClassgirlAction() {
    let girlActionClassAtrribute = document.getElementById("girl-action").getAttribute("class");
    if (girlActionClassAtrribute.search(/hide/) !== -1) {
        girlAction.setAttribute('class', 'girl-action');
    } else {
        girlAction.setAttribute('class', 'girl-action-hide');
    }
    // console.log(girlActionClassAtrribute);
}
origin.addEventListener("click", changeClassOriginAction);
function changeClassOriginAction() {
    let originActionClassAtrribute = document.getElementById("origin-action").getAttribute("class");
    if (originActionClassAtrribute.search(/hide/) !== -1) {
        originAction.setAttribute('class', 'origin-action');
    } else {
        originAction.setAttribute('class', 'origin-action-hide');
    }
    // console.log(originActionClassAtrribute);
}
photo.addEventListener("click", changeClassPhotoAction);
function changeClassPhotoAction() {
    let photoActionClassAtrribute = document.getElementById("photo-action").getAttribute("class");
    if (photoActionClassAtrribute.search(/hide/) !== -1) {
        photoAction.setAttribute('class', 'photo-action');
    } else {
        photoAction.setAttribute('class', 'photo-action-hide');
    }
    // console.log(photoActionClassAtrribute);
}
if(level) {
    level.addEventListener("click", changeClassLevelAction);
}

function changeClassLevelAction() {
    let levelActionClassAtrribute = document.getElementById("level-action").getAttribute("class");
    if (levelActionClassAtrribute.search(/hide/) !== -1) {
        levelAction.setAttribute('class', 'level-action');
    } else {
        levelAction.setAttribute('class', 'level-action-hide');
    }
    // console.log(levelActionClassAtrribute);
}
if(account) {
    account.addEventListener("click", changeClassAccountAction);
}

function changeClassAccountAction() {
    let accountActionClassAtrribute = document.getElementById("account-action").getAttribute("class");
    if (accountActionClassAtrribute.search(/hide/) !== -1) {
        accountAction.setAttribute('class', 'account-action');
    } else {
        accountAction.setAttribute('class', 'account-action-hide');
    }
    // console.log(accountActionClassAtrribute);
}
user.addEventListener("click", changeClassUserAction);
function changeClassUserAction() {
    let userActionClassAtrribute = document.getElementById("user-action").getAttribute("class");
    if (userActionClassAtrribute.search(/hide/) !== -1) {
        userAction.setAttribute('class', 'user-action');
    } else {
        userAction.setAttribute('class', 'user-action-hide');
    }
    console.log(userActionClassAtrribute);
}

