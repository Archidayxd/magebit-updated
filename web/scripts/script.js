let form = document.getElementById("form");
let errorElement = document.getElementById("error")
form.classList.add("valid");
let emailCheck = document.getElementById("email");
let checkBox = document.getElementById("checkBox");
let subButton = document.getElementById("subButton");

window.onload = function() {
    emailCheck.value = "";
    checkBox.checked = false;
    }

function checkEmail(){


let pattern = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;


if(emailCheck.value.match(pattern)){
    form.classList.add("valid")
    form.classList.remove("invalid")
    subButton.disabled = false
    errorElement.textContent = ""
    errorElement.textContent = "Please provide a valid e-mail address"
    errorElement.style.visibility = "hidden"
    if(/.co\s*$/.test(emailCheck.value)){
        form.classList.add("invalid")
        form.classList.remove("valid")
        subButton.disabled = true;
        errorElement.textContent = "We are not accepting subscriptions from Colombia emails"
        errorElement.style.visibility = "visible"
    }
} else{
    form.classList.add("invalid")
    form.classList.remove("valid")
    subButton.disabled = true;
    errorElement.textContent = "Please provide a valid e-mail address"
    errorElement.style.visibility = "visible"
}
}

form.addEventListener("submit" , (e) =>{
    let errorMessages=[]
    if(emailCheck.value == "" || emailCheck.value==null){
        errorMessages.push("Email address is required")
        errorElement.style.visibility = "visible"
        console.log(errorMessages)
    }

    if(!checkBox.checked){
        errorMessages.push("You must accept the terms and conditions")
        e.preventDefault()
    }


    if(errorMessages.length>0){
        e.preventDefault()
        console.log("error")
        form.classList.add("invalid")
        form.classList.remove("valid")
        errorElement.innerText = errorMessages.join("\r\n")
    } 
})
