<?php
if($_POST['fSearch'] && $_POST['lSearch']){
    $_SESSION['fSearch'] = $_POST['fSearch'];
    $_SESSION['lSearch'] = $_POST['lSearch'];

}
?>
<form method="post" action="#">
    <div>
        <input type="text" id="fSearch" name="fSearch" value="First">
        <input type="text" id="lSearch" name="lSearch" value="Last">
        <button type="submit">Search</button>
    </div>
</form>
