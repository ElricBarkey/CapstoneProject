<?php //owner tabs being left for later

if(isset($_GET['ownerTab'])){
    if($_GET['ownerTab'] == 'action'){
        include('OwnerTabs/actionTab.php');
    }
    if(isset($_GET['actionID'])){
        include('OwnerTabs/newAction.php');
    }
    if($_GET['ownerTab'] == 'attorneys'){
        include('OwnerTabs/attorneyTab.php');
    }
    if(isset($_GET['attorneyID'])){
        include('OwnerTabs/newAttorney.php');
    }
    if($_GET['ownerTab'] == 'category'){
        include('OwnerTabs/categoryTab.php');
    }
    if($_GET['ownerTab'] == 'subCategory'){
        include('OwnerTabs/subCategoryTab.php');
    }
    if($_GET['ownerTab'] == 'purgatory'){
        include('OwnerTabs/purgatoryTab.php');
    }
}
?>
