<?php 
require_once 'include/classes/meekrodb.2.3.class.php';
require_once 'db_config.php';
if(isset($_POST['employe_save'])){

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $date_of_birth = $_POST['date_of_birth'];
    $gender = $_POST['gender'];
    $cnic = $_POST['cnic'];
    $city = $_POST['city'];
    $phone1 = $_POST['phone1'];
    $phone2= $_POST['phone2'];
    $address= $_POST['address'];
    $nationality = $_POST['nationality'];
    $marital_status = $_POST['marital_status'];
    $photo =$_POST['photo'];

    $department = $_POST['department'];
    $designation = $_POST['designation'];
    $date_of_join = $_POST['date_of_join'];
    $shift = $_POST['shift'];

    $account_name = $_POST['account_name'];
    $account_number = $_POST['account_number'];
    $bank_name = $_POST['bank_name'];

    $query = DB::insert('employes', [
        'first_name' => $first_name,
        'last_name' => $last_name,
        'date_of_birth' => $date_of_birth,
        'gender' => $gender,
        'cnic' => $cnic,
        'city' => $city,
        'phone1' => $phone1,
        'phone2' => $phone2,
        'address' => $address,
        'nationality' => $nationality,
        'marital_status' => $marital_status,
        'photo' => $photo,

        'department' => $department,
        'designation' => $designation,
        'date_of_join' => $date_of_join,
        'shift' => $shift,

        'account_name' => $account_name,
        'account_number' => $account_number,
        'bank_name' => $bank_name
        ]);
        if($query){
            
            
            
            echo '<script type="text/javascript">
                    window.location = "add-employe.php";
                </script>';
        }
}

?>