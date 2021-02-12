<?php
?>
<!-- look into inserting php if-thens into form. Think I can make it tab between forms -->

<form id="form" method="post" action="#">
    <div>
        <a href="#">General</a>|
        <a href="#">phones</a>|
        <a href="#">Notes</a>|
        <a href="#">Relatives</a>|
        <a href="#">Cases</a>|
        <a href="#">Activities List</a>|
    </div>
        <!-- Contact Information -->
        <fieldset class="form-group"><!-- gets first name, last name, and email -->
            <legend>Contact Info</legend>
            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="firstName">First Name</label>
                    <input type="text" class="form-control" id="firstName" name="firstName">
                </div>
                <div class="form-group col-sm-6">
                    <label for="firstName">SSN</label>
                    <input type="text" class="form-control" id="firstName" name="firstName">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="firstName">last Name</label>
                    <input type="text" class="form-control" id="firstName" name="firstName">
                </div>
                <div class="form-group col-sm-6">
                    <label for="firstName">DoB</label>
                    <input type="text" class="form-control" id="firstName" name="firstName">
                </div>
            </div><div class="row">
                <div class="form-group col-sm-6">
                    <label for="firstName">address</label>
                    <input type="text" class="form-control" id="firstName" name="firstName">
                </div>
                <div class="form-group col-sm-6">
                    <label for="firstName">Contact Name</label>
                    <input type="text" class="form-control" id="firstName" name="firstName">
                </div>
            </div>
        </fieldset>
    </form>

</form>


