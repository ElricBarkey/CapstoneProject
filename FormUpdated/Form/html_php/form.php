<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Client Form</title>
  <!-- jQuery
  <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
            crossorigin="anonymous"></script>
    -->
    <script src="https://code.jquery.com/jquery-latest.min.js"></script>

  <!-- Bootstrap core CSS-->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- My css -->
  <link href="../css/stylesForm.css" rel="stylesheet">

</head>

<body>

<?php
include("../includes/header.php");
?>
<div id="main" class="container">
  <form id="myForm" action="confirmForm.php" method="post">
    <!-- Contact Information -->
    <fieldset class="form-group">
      <legend>Please Complete the Intake Form</legend>

      <div class="form-group">
        <label for="firstName">First Name</label>
        <input placeholder="Your First Name (required)" type="text" class="form-control" id="firstName" name="firstName" >
        <span class="err" id="errFirst">Please enter your first name</span>
        <br>

        <label for="middleName">Middle Name</label>
        <input placeholder="Your Middle Name (if you have one otherwise enter none)" type="text" class="form-control" id="middleName" name="middleName" >
        <span class="err" id="errMiddle">Please enter your middle name</span>
        <br>

        <label for="lastName">Last Name</label>
        <input placeholder="Your Last Name (required - if you have more than one enter them all)" type="text" class="form-control" id="lastName" name="lastName" >
        <span class="err" id="errLast">Please enter your last name</span>
        <br>

        <label for="DOB">Date of Birth (format mm/dd/yyyy)</label>
        <input placeholder="Your Date of Birth (required) dd/mm/yyyy" type="text" class="form-control" id="DOB" name="DOB" >
        <span class="err" id="errDOB">Please enter your date of birth</span>
        <br>

        <label for="email">Email</label>
        <input placeholder="Your Email (required)" type="text" class="form-control" id="email" name="email" >
        <span class="err" id="errEmail">Please enter your email (format example@gmail.com)</span>
        <br>

        <label for="phoneNum">Phone Number</label>
        <input placeholder="Your Phone Number (required)" type="text" class="form-control" id="phoneNum" name="phoneNum" >
        <span class="err" id="errPhoneNum">Please enter your phone number (format 123 456 7890)</span>
        <br>

        <label for="address">Address</label>
        <input placeholder="Address (Required)" type="text" class="form-control" id="address" name="address">
        <span class="err" id="errAddress">Please enter your address</span>
        <br>

        <label for="city">City</label>
        <input placeholder="City (Required)" type="text" class="form-control" id="city" name="city">
        <span class="err" id="errCity">Please enter your city</span>
        <br>

        <label for="state">State</label>
        <input placeholder="State (Required)" type="text" class="form-control" id="state" name="state">
        <span class="err" id="errState">Please enter your state</span>
        <br>

        <label  for="zip">Zip</label>
        <input placeholder="Zip (Required)" type="text" class="form-control" id="zip" name="zip">
        <span class="err" id="errZip">Please enter your zip in format 00000</span>
      </div>

        <!-- Married check -->
      <p>Are you Legally Married? (required)</p>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="married" id="marriedYes" value="yes">
        <label class="form-check-label" for="marriedYes">
          Yes
        </label>
      </div>

      <div class="form-check">
        <input class="form-check-input" type="radio" name="married" id="marriedNo" value="no">
        <label class="form-check-label" for="marriedNo">
          No
        </label>
      </div>
      <span class="err" id="errMarried">Please select a option</span>
      <br>


<!-- spouse information -->
      <p>Can we contact your spouse? (required)</p>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="spouse" id="spouseYes" value="yes">
        <label class="form-check-label" for="spouseYes">
          Yes
        </label>
      </div>

      <div class="form-check">
        <input class="form-check-input" type="radio" name="spouse" id="spouseNo" value="no">
        <label class="form-check-label" for="spouseNo">
          No
        </label>
      </div>

      <div class="form-check">
        <input class="form-check-input" type="radio" name="spouse" id="doesNotApp" value="Does not apply">
        <label class="form-check-label" for="doesNotApp">
          Doesn't Apply
        </label>
      </div>
      <span class="err" id="errSpouseCheck">Please select a option</span>


      <br>
      <div id="hidden">
        <div class="form-group">
          <label for="sFirst">Spouse First Name</label>
          <input placeholder="Spouse First Name" type="text" class="form-control" id="sFirst" name="sFirst" >
          <span class="err" id="errSFirst">Please enter your spouse's first name</span>
          <br>

          <label for="sMiddle">Spouse Middle Name</label>
          <input placeholder="Spouse Middle Name" type="text" class="form-control" id="sMiddle" name="sMiddle" >
          <span class="err" id="errSMiddle">Please enter your spouse's middle name</span>
          <br>

          <label for="sLast">Spouse Last Name</label>
          <input placeholder="Spouse Last Name" type="text" class="form-control" id="sLast" name="sLast" >
          <span class="err" id="errSLast">Please enter your spouse's last name</span>
          <br>

          <label for="sDOB">Spouse Date of Birth</label>
          <input placeholder="Spouse Date of Birth" type="text" class="form-control" id="sDOB" name="sDOB" >
          <span class="err" id="errSDOB">Please enter your spouse's date of birth</span>
          <br>

          <label for="sEmail">Spouse Email</label>
          <input placeholder="Spouse Email" type="text" class="form-control" id="sEmail" name="sEmail" >
          <span class="err" id="errSEmail">Please enter your spouse's email</span>
          <br>

          <label for="sPhoneNum">Spouse Phone Number</label>
          <input placeholder="Spouse Phone Number 123-456-7890" type="text" class="form-control" id="sPhoneNum" name="sPhoneNum" >
          <span class="err" id="errSPhoneNum">Please enter your spouse's phone number (format 123 456 7890)</span>
          <br>

          <label for="sAddress">Spouse Address</label>
          <input placeholder="Spouse Street Address (if different)" type="text" class="form-control" id="sAddress" name="sAddress" >
          <span class="err" id="errSAddress">Please enter your spouse's address</span>
          <br>

          <label for="sCity">Spouse City</label>
          <input placeholder="Spouse City" type="text" class="form-control" id="sCity" name="sCity" >
          <span class="err" id="errSCity">Please enter your spouse's city</span>
          <br>

          <label for="sState">Spouse State</label>
          <input placeholder="Spouse State" type="text" class="form-control" id="sState" name="sState" >
          <span class="err" id="errSState">Please enter your spouse's state</span>
          <br>

          <label for="sZip">Spouse Zip</label>
          <input placeholder="Spouse Zip" type="text" class="form-control" id="sZip" name="sZip" >
          <span class="err" id="errSZip">Please enter your spouse's zip in format 00000</span>
          <br>
        </div>

      </div><!--end of spouse form-->

      <div class="form-group">
        <label for="legalServices">Legal Services Requested(required)</label>
        <select class="form-control" id="legalServices" name="legalServices">
          <option value="---">---</option>
          <option value="Bankruptcy-Personal">Bankruptcy-Personal</option>
          <option value="Bankruptcy-Business">Bankruptcy-Business</option>
          <option value="Probate">Probate</option>
          <option value="Estate Planning">Estate Planning</option>
          <option value="Debt Help - Non-Bankruptcy">Debt Help - Non-Bankruptcy</option>
          <option value="Personal Injury">Personal Injury</option>
          <option value="Contract Dispute">Contract Dispute</option>
          <option value="Other - Describe in Msg Box">Other - Describe in Msg Box</option>
        </select>
        <span class="err" id="errLegal">Please select a option</span>
      </div>

      <div class="form-group">
        <label for="message">Your Message</label>
        <textarea class="form-control" id="message" name="message" ></textarea>
      </div>


    </fieldset>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  <br>
  <br>
    <!-- invis field for reroute -->
    <label for="un"></label>
    <input hidden type="text" class="form-control" id="un" name="un" value="hi">
</div>

<?php
    include("../includes/footer.php");
?>


  <!-- Bootstrap core JavaScript -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../js/functions.js"></script>
  <script src="../js/form.js"></script>
  <script src="../js/navFunctions.js"></script>

</body>

</html>
