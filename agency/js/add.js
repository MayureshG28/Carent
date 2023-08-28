const addform = document.querySelector(".add-car form");
addBtn = addform.querySelector('#Add');
errorTextadd = addform.querySelector('.error-text');

addform.onsubmit = (e)=>{
    e.preventDefault();
};

addBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "add_car.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data == "Success"){
                    location.href= "./booked.php";
                }
                else{
                    errorTextadd.textContent = data;
                    errorTextadd.style.display = "block";
                }
            }
        }
    }
    let formData = new FormData(addform);
    xhr.send(formData);
};