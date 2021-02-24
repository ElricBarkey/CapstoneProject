document.getElementById("myForm").onsubmit = validate;

function validate()
{
    //Create a flag variable
    let valid = true;

    //Clear all errors
    let errors = document.getElementsByClassName("err");
    for (let i=0; i<errors.length; i++) {
        errors[i].style.visibility = "hidden";
    }

    //Check first name
    let first = document.getElementById("firstName").value;
    if (first == "") {
        let errFirst = document.getElementById("errFirst");
        errFirst.style.visibility = "visible";
        valid = false;
    }

    //Check last name
    let last = document.getElementById("lastName").value;
    if (last == "") {
        let errLast = document.getElementById("errLast");
        errLast.style.visibility = "visible";
        valid = false;
    }

    //Check middle name
    let middle = document.getElementById("middleName").value;
    if (middle == "") {
        let errMiddle = document.getElementById("errMiddle");
        errMiddle.style.visibility = "visible";
        valid = false;
    }

    //properly set this so that I can check for a mm/dd/yyyy
    let DOB = document.getElementById("DOB").value;
    if (DOB == "") {
        let errDOB = document.getElementById("errDOB");
        errDOB.style.visibility = "visible";
        valid = false;
    }

    let email = document.getElementById("email").value;
    if (email == "") {
        let errEmail = document.getElementById("errEmail");
        errEmail.style.visibility = "visible";
        valid = false;
    }
    else
    {
        let validE = validateEmail(email);
        if(validE == false)
        {
            let errEmail = document.getElementById("errEmail");
            errEmail.style.visibility = "visible";
            valid = false;
        }
    }

    function validateEmail(email)
    {
        let symbols = /\S+@\S+\.\S+/;
        return symbols.test(email);
    }

    let phoneNum = document.getElementById("phoneNum").value;
    if (phoneNum == "") {
        let errPhoneNum = document.getElementById("errPhoneNum");
        errPhoneNum.style.visibility = "visible";
        valid = false;
    }

    let address = document.getElementById("address").value;
    if (address == "") {
        let errAddress = document.getElementById("errAddress");
        errAddress.style.visibility = "visible";
        valid = false;
    }

    let city = document.getElementById("city").value;
    if (city == "") {
        let errCity = document.getElementById("errCity");
        errCity.style.visibility = "visible";
        valid = false;
    }

    let state = document.getElementById("state").value;
    if (state == "") {
        let errState = document.getElementById("errState");
        errState.style.visibility = "visible";
        valid = false;
    }

    let zip = document.getElementById("zip").value;
    if (zip == "" || zip.length > 5 || zip.length < 5) {
        let errZip = document.getElementById("errZip");
        errZip.style.visibility = "visible";
        valid = false;
    }


    // add check if the are you legally married radio buttons are selected
    let marriedYes = document.getElementById("marriedYes").checked;
    let marriedNo = document.getElementById("marriedNo").checked;
    if (marriedYes == false && marriedNo == false) {
        let errMarried = document.getElementById("errMarried");
        errMarried.style.visibility = "visible";
        valid = false;
    }

    // add check if the are can we contact your spouse radio buttons are selected
    let spouseYes = document.getElementById("spouseYes").checked;
    let spouseNo = document.getElementById("spouseNo").checked;
    let doesNotApply = document.getElementById("doesNotApp").checked;

    if (spouseYes == false && spouseNo == false && doesNotApply == false) {
        let errSpouseCheck = document.getElementById("errSpouseCheck");
        errSpouseCheck.style.visibility = "visible";
        valid = false;
    }

    //spouse info validation

    if (spouseYes)
    {
        //Check first name
        let sFirst = document.getElementById("sFirst").value;
        if (sFirst == "") {
            let errsFirst = document.getElementById("errSFirst");
            errsFirst.style.visibility = "visible";
            valid = false;
        }

        //Check last name
        let sLast = document.getElementById("sLast").value;
        if (sLast == "") {
            let errsLast = document.getElementById("errSLast");
            errsLast.style.visibility = "visible";
            valid = false;
        }

        //Check middle name
        let sMiddle = document.getElementById("sMiddle").value;
        if (sMiddle == "") {
            let errsMiddle = document.getElementById("errSMiddle");
            errsMiddle.style.visibility = "visible";
            valid = false;
        }

        let sDOB = document.getElementById("sDOB").value;
        if (sDOB == "") {
            let errSDOB = document.getElementById("errSDOB");
            errSDOB.style.visibility = "visible";
            valid = false;
        }

        let sEmail = document.getElementById("sEmail").value;
        if (sEmail == "") {
            let errsEmail = document.getElementById("errSEmail");
            errsEmail.style.visibility = "visible";
            valid = false;
        }

        let sPhoneNum = document.getElementById("sPhoneNum").value;
        if (sPhoneNum == "") {
            let errsPhoneNum = document.getElementById("errSPhoneNum");
            errsPhoneNum.style.visibility = "visible";
            valid = false;
        }

        let sAddress = document.getElementById("sAddress").value;
        if (sAddress == "") {
            let errsAddress = document.getElementById("errSAddress");
            errsAddress.style.visibility = "visible";
            valid = false;
        }

        let sCity = document.getElementById("sCity").value;
        if (sCity == "") {
            let errsCity = document.getElementById("errSCity");
            errsCity.style.visibility = "visible";
            valid = false;
        }

        let sState = document.getElementById("sState").value;
        if (sState == "") {
            let errsState = document.getElementById("errSState");
            errsState.style.visibility = "visible";
            valid = false;
        }

        let sZip = document.getElementById("sZip").value;
        if (sZip == "" || sZip.length > 5 || sZip.length < 5) {
            let errsZip = document.getElementById("errSZip");
            errsZip.style.visibility = "visible";
            valid = false;
        }
    }



    //check the drop down for legal services
    let legalServices = document.getElementById("legalServices").value;
    if (legalServices == "---") {
        let errLegal = document.getElementById("errLegal");
        errLegal.style.visibility = "visible";
        valid = false;
    }

    return valid;
}