/********f************
    
    Project 4 Stylesheet
    Name: Kyle Sontag
    Date: 2025-04-24
    Description: JS for project 4 - Trail Guardians

*********************/
function validate(e) {
    e.preventDefault(); 
    hideAllErrors();
    
    if(formHasErrors()) {
        return false; 
    } else {
        document.getElementById("contactform").submit();
        return true;
    }
}//Prevents form submission if errors are present 

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
}//Confirms if user is wanting to reset form before resetting

function hideAllErrors() {
    let errorFields = document.getElementsByClassName("error");
    for(let i=0; i<errorFields.length; i++) {
        errorFields[i].style.display = "none";
    }
}//Hides error messages, sets display to none

function hideReason() {
    const divIds = ["volunteerdiv", "donatediv", "traildiv", "otherdiv"];
    divIds.forEach(id => {
        const div = document.getElementById(id);
        if(div) {
            div.style.display = "none";
        }
    });
}//Hides textareas for radio buttons

function formFieldHasInput(fieldElement) {
    if(fieldElement == null || fieldElement.value == null || fieldElement.value.trim() === "") {
        return false;
    }
    return true;
}//Checks if a field has characters inputted

function showError(errorId) {
    const errorElement = document.getElementById(errorId);
    if(errorElement) {
        errorElement.style.display = "block";
    }
}//Makes error message visible

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
    }//Check if required fields have input

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
    }//Uses regex to validate email

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
    }//Uses regex to validate phone number

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
    }//Determines if a radio button has been selected
    
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
    }//Confirms that the textarea corresponding to the radio button has content

    return errorFlag;
}//Validates form returning error message when needed

function handleHamburgerMenu() {
    const hamburger = document.getElementById('hamburger');
    const nav = document.getElementById('nav');
    
    if (hamburger && nav) {
        hamburger.addEventListener('click', function() {
            hamburger.classList.toggle('active');
            nav.classList.toggle('active');
        });
    }
}//Creates functionality for the 'hamburger' nav

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
}//Initializes the page setting up event listeners and start states

if(document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", load);
} else {
    load();
}