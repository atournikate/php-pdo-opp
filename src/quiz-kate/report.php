<?php
    // Preset path to include folder
    set_include_path($_SERVER['DOCUMENT_ROOT'] . '/quiz-kate/php');

    // Page includes
    include 'auth.php';
    include 'quiz-kate-data.php';

    // Start the session and initialize the result array
    session_start();
    $_SESSION["quiz-kate-results"] = array();

    // Get quiz data
    $quizData = q_data();
    $pageData = $quizData['report'];


    // Session object: Update number of achieved points

    // echo '<br><br>';
    // var_dump($_POST);
    // echo '<br><br>';
    // var_dump($_SESSION);

    $_SESSION['achievedPoints'] = $_SESSION['achievedPoints'] + $_POST['radio'];

    $percentage = ($_SESSION['achievedPoints'] / count($quizData['questions']) * 100);

    
    echo '<br><br>';
    echo 'this is the number of questions: ';
    echo count($quizData['questions']);
    
    echo '<br><br>';
    echo 'this is the percentage: ';
    echo $percentage;



?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/kateQuiz.css">
</head>

<body>
    <div class="bgimg-1">
        <div class="caption">
            
            <img src="<?php echo $pageData['imageURL']?>" style="width: 50%; border-radius: 5px;"><br>
            <span class="border">
            <?php
                echo '<a href="/index.php">' . $pageData['title'] . '</a><br>';
                
                    if ($percentage == 0) {
                        echo $pageDate['feedback_00'];
                    } elseif ($percentage == 10) {
                        echo $pageData['feedback_10'];
                    } elseif ($percentage == 20) {
                        echo $pageData['feedback_20'];
                    } elseif ($percentage == 30) {
                        echo $pageData['feedback_30'];
                    } elseif ($percentage == 40) {
                        echo $pageData['feedback_40'];
                    } elseif ($percentage == 50) {
                        echo $pageData['feedback_50'];
                    } elseif ($percentage == 60) {                     
                        echo $pageData['feedback_60'];
                    }  elseif ($percentage == 70) {                      
                        echo $pageData['feedback_70'];
                    } elseif ($percentage == 80) {                      
                        echo $pageData['feedback_80'];
                    } elseif ($percentage == 90) {                        
                        echo  $pageData['feedback_90'];
                    } elseif ($percentage == 100) {                       
                        echo $pageData['feedback_100'];
                    }
                echo '<p>You have answered ' . $_SESSION['achievedPoints'] . ' question(s) correctly.</p>';
                echo '<br><a href="/index.php">Return Home</a>';
                session_destroy();
            ?></span>
        </div>
    </div>
</body>

</html>