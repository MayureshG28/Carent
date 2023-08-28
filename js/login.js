const form = document.querySelector(".form.Login form");
loginBtn = form.querySelector("#loginbtn");
errorTextlog = form.querySelector('.error-text');

form.onsubmit = (e)=>{
    e.preventDefault();
};

loginBtn.onclick = () =>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "login.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data == "Success"){
                    location.href = "./customer/available.php";
                }
                else if(data == "Agency"){
                    location.href = "./agency/booked.php";
                }
                else{
                    errorTextlog.textContent = data;
                    errorTextlog.style.display = "block";
                }
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
};