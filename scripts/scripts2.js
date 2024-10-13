passConfInput.addEventListener('keyup', function(){
    let passLength = passConfInput.value.length;
    if (passLength == 0){
        eyeImg.style.display = 'none';
    }else{
        eyeImg.style.display = 'inline-block';
    }
})
eyeImg.addEventListener('click', function(){
    // alert('hi')
    let passConfInputType = passConfInput.getAttribute('type');
    // console.log(passInputType)
    if (passConfInputType == 'password'){
        // alert("this is a password")
        passConfInput.setAttribute('type','text')
        coloseEyeImg.setAttribute('src','../images/invisible-eye.png')
        
    }else{
        passConfInput.setAttribute('type','password')
        closeEyeImg.setAttribute('src','../images/visible-eye.png')
    }
})