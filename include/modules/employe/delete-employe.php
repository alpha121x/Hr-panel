<?php
require_once 'include/classes/meekrodb.2.3.class.php';
require_once 'db_config.php';

$id = $_GET['id'];
$query = DB::query("DELETE FROM employes WHERE id=%i", $id);

if ($query) {
    echo '<script type="text/javascript">
                window.location = "manage-employes.php";
            </script>';
}
?>
