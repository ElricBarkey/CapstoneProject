<?php
echo "
<hr>
    <div class='container-fluid' id='tableTest'>
        <div>
            <a href='http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/index.php?&ownerTab=action'>actions</a>|
            <a href='http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/index.php?&ownerTab=attorneys'>attorneys</a>|
            <a href='http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/index.php?&ownerTab=category'>category</a>|
            <a href='http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/index.php?&ownerTab=subCategory'>subCategory</a>|
            <a href='http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/index.php?&ownerTab=purgatory'>purgatory</a>| Doesn't require client search
        </div>
    </div>
";

if($_GET['ownerTab'] == 'action'){
    include('actionTab.php');
}
if(isset($_GET['actionID'])){
    include('newAction.php');
}
if($_GET['ownerTab'] == 'attorneys'){
    include('attorneyTab.php');
}
if(isset($_GET['attorneyID'])){
    include('newAttorney.php');
}
if($_GET['ownerTab'] == 'category'){
    include('categoryTab.php');
}
if($_GET['ownerTab'] == 'subCategory'){
    include('subCategoryTab.php');
}
if($_GET['ownerTab'] == 'purgatory'){
    include('purgatoryTab.php');
}
?>
