function validate(e) {
    e.preventDefault(); 
    hideAllErrors();
    
    if(formHasErrors()) {
        return false; 
    } else {
        document.getElementById("contactform").submit();
        return true;
    }
}

function resetForm(e) {
    if(confirm('Clear survey?')) {
        hideAllErrors();
        hideReason();
        const fullnameElement = document.getElementById("fullname");
        if(fullnameElement) {
            fullnameElement.focus();
        }
        return true;
    }
    e.preventDefault();
    return false;
}

function hideAllErrors() {
    let errorFields = document.getElementsByClassName("error");
    for(let i=0; i<errorFields.length; i++) {
        errorFields[i].style.display = "none";
    }
}

function hideReason() {
    const divIds = ["volunteerdiv", "donatediv", "traildiv", "otherdiv"];
    divIds.forEach(id => {
        const div = document.getElementById(id);
        if(div) {
            div.style.display = "none";
        }
    });
}

function formFieldHasInput(fieldElement) {
    if(fieldElement == null || fieldElement.value == null || fieldElement.value.trim() === "") {
        return false;
    }
    return true;
}

function showError(errorId) {
    const errorElement = document.getElementById(errorId);
    if(errorElement) {
        errorElement.style.display = "block";
    }
}

function formHasErrors() {
    let errorFlag = false;
    let requiredFields = ["fullname", "email", "phoneNumber"];

    for(let i=0; i<requiredFields.length; i++) {
        let textInput = document.getElementById(requiredFields[i]);
        if(textInput && !formFieldHasInput(textInput)) {
            showError(`${requiredFields[i]}Req_error`);
            
            if(!errorFlag) {
                textInput.focus();
                textInput.select();
            }
            errorFlag = true;
        }
    }

    const emailElement = document.getElementById("email");
    if(emailElement) {
        let regexEmail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        let email = emailElement.value;
        if(email !== "" && !regexEmail.test(email)) {
            showError("emailFormat_error");
            if(!errorFlag) {
                emailElement.focus();
                emailElement.select();
            }
            errorFlag = true;
        }
    }

    const phoneElement = document.getElementById("phoneNumber");
    if(phoneElement) {
        let regexPhone = /^\d{10}$/;
        let phoneNumber = phoneElement.value;
        if(phoneNumber !== "" && !regexPhone.test(phoneNumber)) {
            showError("phoneNumberFormat_error");
            if(!errorFlag) {
                phoneElement.focus();
                phoneElement.select();
            }
            errorFlag = true;
        }
    }

    let reason = ["volunteer", "donate", "trail", "other"];
    let reasonChecked = false;
    let selectedReason = "";
    
    for(let i=0; i<reason.length; i++) {
        const radioElement = document.getElementById(reason[i]);
        if(radioElement && radioElement.checked) {
            reasonChecked = true;
            selectedReason = reason[i];
            break;
        }
    }
    
    if(!reasonChecked) {
        showError("reason_error");
        errorFlag = true;
    } else {
        let textareaId = "";
        if(selectedReason === "volunteer") textareaId = "join";
        else if(selectedReason === "donate") textareaId = "donates";
        else if(selectedReason === "trail") textareaId = "trails";
        else if(selectedReason === "other") textareaId = "otherinput";
        
        if(textareaId !== "") {
            const textarea = document.getElementById(textareaId);
            if(textarea && !formFieldHasInput(textarea)) {
                showError("reasonText_error");
                errorFlag = true;
            }
        }
    }

    return errorFlag;
}

function handleHamburgerMenu() {
    const hamburger = document.getElementById('hamburger');
    const nav = document.getElementById('nav');
    
    if (hamburger && nav) {
        hamburger.addEventListener('click', function() {
            hamburger.classList.toggle('active');
            nav.classList.toggle('active');
        });
    }
}

function load() {
    const form = document.getElementById("contactform");
    if(form) {
        form.addEventListener("submit", validate);
        form.addEventListener("reset", resetForm);
        
        const radioButtons = ["volunteer", "donate", "trail", "other"];
        radioButtons.forEach(id => {
            const radio = document.getElementById(id);
            if(radio) {
                radio.addEventListener("change", function() {
                    hideReason();
                    const div = document.getElementById(id + "div");
                    if(div) {
                        div.style.display = "flex";
                    }
                });
            }
        });
        
        hideAllErrors();
        hideReason();
    }
    handleHamburgerMenu();
}

if(document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", load);
} else {
    load();
}