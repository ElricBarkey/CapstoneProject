<footer> <!--STYLES AND SCRIPTS TO PULL-->
    <hr>
<?php
if(!isset($_GET['ownerTab']) && !isset($_GET['caseTab'])) {
    include("clientSearchBar.php");
}
else if(!isset($_GET['ownerTab']) && !isset($_GET['tab'])) {
    include("caseSearchBar.php");
}
?>


<!-- Bootstrap core JavaScript -->
<script src="//code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

<script>
    $('#test').DataTable( {
    });

    $('#clientInfoTable').DataTable( {
        "info": false,
        "scrollY": "120px",
        "scrollCollapse": true,
        "paging": false
    });

    $('#clients').DataTable( {
        "info": false,
        "scrollY": "140px",
        "scrollCollapse": true,
        "paging": false
    });
    $('#searchBar').DataTable( {
        "info": false,
        "scrollY": "140px",
        "scrollCollapse": true,
        "paging": false
    });
</script>

</footer>
<style>
    footer {
        background-color: lightgrey;
        position: fixed;
        bottom: 0;
    }
</style>
</html>
