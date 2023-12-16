<?php
require_once 'include/classes/meekrodb.2.3.class.php';
require_once 'db_config.php';

if (isset($_POST['employe_update'])) {
    // Retrieve form data
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $cnic = $_POST['cnic'];
    $city = $_POST['city'];
    $phone1 = $_POST['phone1'];
    $phone2 = $_POST['phone2'];
    $address = $_POST['address'];
    $nationality = $_POST['nationality'];
    $marital_status = $_POST['marital_status'];
    $department = $_POST['department'];
    $designation = $_POST['designation'];
    $shift = $_POST['shift'];
    $account_name = $_POST['account_name'];
    $bank_name = $_POST['bank_name'];
    // ... (Retrieve other form fields)

    // Handle image upload
    $targetDir = "uploads/"; // Define the target directory for uploads
    $oldimage = $_POST['old_photo']; // Get the old image filename
   
    if (isset($_FILES["photo"])) {
        $imageFile = $_FILES["photo"];
        $imageFileName = $imageFile["name"];
        $image = time() . $imageFileName;
        // var_dump($image);

        // $uploadDirectory = "people/assets_people/"; 
        $uploadDirectory = 'uploads/';
        //$allowedTypes = array('jpg', 'jpeg');
        // $fileType = strtolower(pathinfo($image, PATHINFO_EXTENSION));
        // if (!in_array($fileType, $allowedTypes)) {
        //     echo "Only JPG and JPEG files are allowed.";
        //     exit();
        // }
        // die();

        // Move the uploaded image to the specified directory
        if (move_uploaded_file($imageFile["tmp_name"], $uploadDirectory . $image)) {
            if (!empty($oldimage)) {
                $oldImagePath = 'uploads/' . $oldimage;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            // echo "Image uploaded successfully.";
        } else {
            // echo "Image upload failed.";
            $image = $oldimage;
        }
    }
        $update = DB::update('employes', [
        'first_name' => $first_name,
        'last_name' => $last_name,
        'gender' => $gender,
        'cnic' => $cnic,
        'city' => $city,
        'phone1' => $phone1,
        'phone2' => $phone2,
        'address' => $address,
        'nationality' => $nationality,
        'marital_status' => $marital_status,
        'photo' => $image,
        'department' => $department,
        'designation' => $designation,
        'shift' => $shift,
        'account_name' => $account_name,
        'bank_name' => $bank_name
        ], "id=%i", $id);

         if ($update) {
            
?>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            alert();
            die();
            Swal.fire({
                title: "Data Saved",
                text: "Your data has been Updated successfully.",
                icon: "success"
            }).then(function() {
                window.location.href = "manage-employes.php";
            });
        </script>
<?php
    } else {
?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                title: "Error",
                text: "An error occurred. Changes were not saved.",
                icon: "error"
            });
        </script>
<?php
    }
    
} else {
    // Handle if the form was not submitted properly
    echo "Form was not submitted!";
}
?>
