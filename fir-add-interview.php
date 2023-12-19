<?php 
require_once 'include/classes/meekrodb.2.3.class.php';
require_once 'db_config.php';

if(isset($_POST['btn-interview'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $position = $_POST['position'];
    $date = $_POST['date'];
    $asking_salary = $_POST['asking_salary'];
    $salary_offer = $_POST['salary_offer'];
    $working_experience = $_POST['working_experience'];
    $applicable_skills = $_POST['applicable_skills'];
    $appearance = $_POST['appearance'];
    $attitude = $_POST['attitude'];
    $education = $_POST['education'];
    $outcome_interview = isset($_POST['outcome_interview']) ? $_POST['outcome_interview'] : '';

    $query = DB::insert('interview', [
        'first_name' => $first_name,
        'last_name' => $last_name,
        'position' => $position,
        'date' => $date,
        'asking_salary' => $asking_salary,
        'salary_offer' => $salary_offer,
        'working_experience' => $working_experience,
        'applicable_skills' => $applicable_skills,
        'appearance' => $appearance,
        'attitude' => $attitude,
        'education' => $education,
        'outcome_interview' => $outcome_interview
    ]);

    if($query){
        echo '<script type="text/javascript">
                window.location = "add-interviews.php";
            </script>';
    }
}
?>
