const signupagenform = document.querySelector("#signupAgencyform form");
signupBtn = signupagenform.querySelector('#signupagency');
errorText = signupagenform.querySelector('.error-text');

signupagenform.onsubmit = (e)=>{
    e.preventDefault();
};

signupBtn.onclick = ()=>{
    console.log("Hello agent");
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "signupAgen.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data == "Success"){
                    location.href= "./agency/booked.php";
                }
                else{
                    errorText.textContent = data;
                    errorText.style.display = "block";
                }
            }
        }
    }
    let formData = new FormData(signupagenform);
    xhr.send(formData);
};