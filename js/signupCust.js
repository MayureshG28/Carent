const signupform = document.querySelector(".Signup.Customer form");
signupBtn = signupform.querySelector('#signupcustomer');
errorText = signupform.querySelector('.error-text');

signupform.onsubmit = (e)=>{
    e.preventDefault();
};

signupBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "signupCust.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data == "Success"){
                    location.href= "./customer/available.php";
                }
                else{
                    errorText.textContent = data;
                    errorText.style.display = "block";
                }
            }
        }
    }
    let formData = new FormData(signupform);
    xhr.send(formData);
};