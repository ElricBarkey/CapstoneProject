<?php
//validate married check box
function validMarriedOption($selectedOption)
{
    $validOptions = array("yes", "no");
    return in_array($selectedOption, $validOptions);
}

//validate spouse options
function validSpouseOption($selection)
{
    $validOps = array("yes", "no", "Does not apply");
    return in_array($selection, $validOps);
}

//validate legal services
function validLegalServices($selectedLegal)
{
    $validLegal = array("Bankruptcy-Personal", "Bankruptcy-Business", "Probate", "Estate Planning",
        "Debt Help - Non-Bankruptcy", "Personal Injury", "Contract Dispute", "Other - Describe in Msg Box");
    return in_array($selectedLegal, $validLegal);
}

