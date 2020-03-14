
<?php

  include('utube.php');

  if (isset($_POST['submit'])) {

    $answer          = $_POST['answer'];
    $has_warning       = 0;

    echo $question;

    //DB Insert
      /* disable autocommit */
      $conn->autocommit(FALSE);
      
      if($has_warning != 1) {

        $query          = "INSERT INTO `qa`(answer) VALUES ('$answer')";
        $result         = mysqli_query($conn, $query);
        
        if(!$result) {
          
          /* Rollback */
          $conn->rollback();

          die("User Added Failed. Please Try Again." . $result->error);
        }

      }

      /* commit insert */
      $conn->commit();

      $message = "SA Successful";

      redirect_form($message, 'success');
    //DB Insert Ends

  }

  //Form Data Sanitize
  function form_input($data) 
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  function redirect_form($message, $type){

    $_SESSION['message']          = $message;
    $_SESSION['message_type']     = $type;

    header('Location: sa.php');

  }

?>
