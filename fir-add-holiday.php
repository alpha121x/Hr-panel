<?php 
require_once 'include/classes/meekrodb.2.3.class.php';
require_once 'db_config.php';
if(isset($_POST['holiday'])){

    
    $date = $_POST['date'];
    $description = $_POST['description'];

    $query = DB::insert('holiday', [
        'date' => $date,
        'description' => $description
        ]);
        if($query){
            
            
            
            echo '<script type="text/javascript">
                    window.location = "add-holiday.php";
                </script>';
        }
}

?>