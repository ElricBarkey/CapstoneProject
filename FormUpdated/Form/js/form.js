document.getElementById("myForm").onsubmit = validate;

function validateEmail(email)
{
    let symbols = /\S+@\S+\.\S+/;
    return symbols.test(email);
}

function validatePhoneNumber(phoneN)
{
    let phoneCheck = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
    if(phoneN.match(phoneCheck))
    {
        return true;
    }
    else
    {
        return false;
    }
}
/*
function validatedate(inputText)
{
    var dateformat = /^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/;
    // Match the date format through regular expression
    if(inputText.match(dateformat))
    {
        //document.form1.text1.focus();
        //Test which seperator is used '/' or '-'
        var opera1 = inputText.split('/');
        var opera2 = inputText.split('-');
        lopera1 = opera1.length;
        lopera2 = opera2.length;
        // Extract the string into month, date and year
        if (lopera1>1)
        {
            var pdate = inputText.split('/');
        }
        else if (lopera2>1)
        {
            var pdate = inputText.split('-');
        }
        var dd = parseInt(pdate[0]);
        var mm  = parseInt(pdate[1]);
        var yy = parseInt(pdate[2]);
        // Create list of days of a month [assume there is no leap year by default]
        var ListofDays = [31,28,31,30,31,30,31,31,30,31,30,31];
        if (mm==1 || mm>2)
        {
            if (dd>ListofDays[mm-1])
            {
                //alert('Invalid date format!');
                return false;
            }
        }
        if (mm==2)
        {
            var lyear = false;
            if ( (!(yy % 4) && yy % 100) || !(yy % 400))
            {
                lyear = true;
            }
            if ((lyear==false) && (dd>=29))
            {
                //alert('Invalid date format!');
                return false;
            }
            if ((lyear==true) && (dd>29))
            {
                //alert('Invalid date format!');
                return false;
            }
        }
    }
    else
    {
        //alert("Invalid date format!");
        //document.form1.text1.focus();
        return false;
    }
}
 */

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
    /*
    else{
        let validDOB = validatedate(DOB);
        if(validDOB == false)
        {
            let errDOB= document.getElementById("errDOB");
            errDOB.style.visibility = "visible";
            valid = false;
        }
    }

     */

    //Check email
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

    //Check phone number
    let phoneNum = document.getElementById("phoneNum").value;
    if (phoneNum == "") {
        let errPhoneNum = document.getElementById("errPhoneNum");
        errPhoneNum.style.visibility = "visible";
        valid = false;
    }
    else
    {
        let validP = validatePhoneNumber(phoneNum);
        if(validP == false)
        {
            let errPhoneNum = document.getElementById("errPhoneNum");
            errPhoneNum.style.visibility = "visible";
            valid = false;
        }
    }

    //Check address
    let address = document.getElementById("address").value;
    if (address == "") {
        let errAddress = document.getElementById("errAddress");
        errAddress.style.visibility = "visible";
        valid = false;
    }

    //Check city
    let city = document.getElementById("city").value;
    if (city == "") {
        let errCity = document.getElementById("errCity");
        errCity.style.visibility = "visible";
        valid = false;
    }

    //Check state
    let state = document.getElementById("state").value;
    if (state == "") {
        let errState = document.getElementById("errState");
        errState.style.visibility = "visible";
        valid = false;
    }

    //Check zip
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
        /*
        else{
            let validsDOB = validatedate(sDOB);
            if(validsDOB == false)
            {
                let errSDOB= document.getElementById("errSDOB");
                errSDOB.style.visibility = "visible";
                valid = false;
            }
        }

         */

        let sEmail = document.getElementById("sEmail").value;
        if (sEmail == "") {
            let errsEmail = document.getElementById("errSEmail");
            errsEmail.style.visibility = "visible";
            valid = false;
        }
        else
        {
            let validsE = validateEmail(sEmail);
            if(validsE == false)
            {
                let errsEmail = document.getElementById("errSEmail");
                errsEmail.style.visibility = "visible";
                valid = false;
            }
        }

        let sPhoneNum = document.getElementById("sPhoneNum").value;
        if (sPhoneNum == "") {
            let errsPhoneNum = document.getElementById("errSPhoneNum");
            errsPhoneNum.style.visibility = "visible";
            valid = false;
        }
        else
        {
            let validsP = validatePhoneNumber(sPhoneNum);
            if(validsP == false)
            {
                let errsPhoneNum = document.getElementById("errSPhoneNum");
                errsPhoneNum.style.visibility = "visible";
                valid = false;
            }
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


    //auto scroll to top
    if (valid == false){
        $(document).ready(function () {
            target_offset = $('#firstName').offset(),
                target_top = target_offset.top;
            $('html, body').animate({
                scrollTop: target_top
            }, 800);
        });
    }

    return valid;
}