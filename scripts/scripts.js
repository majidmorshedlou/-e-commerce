let imgTag = document.querySelector('.pass-visibility');
let passwordId = document.querySelector('.password');

passwordId.addEventListener('keyup',()=>{
    let passLength = passwordId.value.length
    if(passLength > 0){
        imgTag.style.display = 'inline-block';
    }else{
        imgTag.style.display = 'none';
    }
})

imgTag.addEventListener('click',()=>{
    let passType = passwordId.getAttribute('type');
    if(passType == 'password'){
        imgTag.setAttribute("src","../images/invisible-eye.png");
        passwordId.setAttribute('type','text');
    }else{
        imgTag.setAttribute("src","../images/visible-eye.png");
        passwordId.setAttribute('type','password');
    }
})
////////////////////////
let imgTags = document.querySelector('.pass-conf-visibility');
let passwordIds = document.querySelector('.password-conf');
passwordIds.addEventListener('keyup',()=>{
    let passLength = passwordIds.value.length
    if(passLength > 0){
        imgTags.style.display = 'inline-block';
    }else{
        imgTags.style.display = 'none';
    }
})

imgTags.addEventListener('click',()=>{
    let passType = passwordIds.getAttribute('type');
    if(passType == 'password'){
    imgTags.setAttribute("src","../images/invisible-eye.png");
    passwordIds.setAttribute('type','text');
    }else{
        imgTags.setAttribute("src","../images/visible-eye.png");
    passwordIds.setAttribute('type','password');
    }
})