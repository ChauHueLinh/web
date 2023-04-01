
const origin = document.getElementById('origin');
const user = document.getElementById('user');
const originAction = document.getElementById('origin-action');
const userAction = document.getElementById('user-action');

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
user.addEventListener("click", changeClassUserAction);
function changeClassUserAction() {
    let userActionClassAtrribute = document.getElementById("user-action").getAttribute("class");
    if (userActionClassAtrribute.search(/hide/) !== -1) {
        userAction.setAttribute('class', 'user-action');
    } else {
        userAction.setAttribute('class', 'user-action-hide');
    }
    // console.log(userActionClassAtrribute);
}

