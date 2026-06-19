<!DOCTYPE html>
<html>
  <head>
    <title>E Learning</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.green.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/Chat_style.css?v=<?php echo time(); ?>">
  </head>
  <body>
      <?php 
          include 'config.php';
          include 'session_check.php';
          include 'RFL.php';
          include 'Header_top.php';
          include 'Navbar.php';
          include 'Header_search.php';
          if (!(isset($_SESSION['id'])) && !(isset($_SESSION['admin_id']))) {
            echo "<script>alert('Please Login Our Site...');</script>";
            echo "<script>window.location = 'index.php'</script>";
          }
          $incoming_msg_id = $_GET['unique_id'];
          if (isset($_SESSION['stu_unique_id'])) {$outgoing_msg_id = $_SESSION['stu_unique_id'];}else if (isset($_SESSION['admin_unique_id'])) {$outgoing_msg_id = $_SESSION['admin_unique_id'];}
       ?>
        <div class="container-fluid chat_content">
          <div class="row">
            <div class="col-xl-12 px-0 chat_main_content">
              <div class="d-flex justify-content-between">
                <div id="breadcrumbs" class="col-xl-8">
                  <ul>
                    <li><a href="index.php"><i class="ti-home"></i>  Home</a></li>
                    <li>/</li>
                    <li>Add Quiz</li>
                  </ul>
                </div>
                <div id="back-button">
                  <button class="btn btn-danger btn-sm"><a href="stu_chat.php" class="text-light"><i class="ti-angle-double-left"></i>  Back</a></button>
                </div>              
              </div>
              <!-- CHAT AREA START -->
               <div class="col-xl-12 col-sm-12 d-flex align-self-center justify-content-center">
                  <div class="col-xl-5 col-lg-7 col-md-10 col-sm-12 chat_wrapper px-0">
                    <div class="col-xl-12 chat_account d-flex justify-content-between align-items-center">
                      <a class="account_holder_title chat_aht text-dark d-flex align-items-center">
                        <?php
                          $row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `login` WHERE unique_id = $incoming_msg_id"));
                          echo '
                                  <div>
                                    <img class="img" src="'.$row['profile_img'].'" alt="">  
                                  </div>
                                  <div>
                                    <p>'.$row['username'].'</p>
                                    <p>'.$row['chat_status'].'</p>                        
                                  </div>

                          ';

                        ?>
                      </div>
                    </a>
                    <div class="chat_middle_are" style="display: flex;flex-direction: column-reverse;">
                      
                    </div>
                      <form action="" class="msg_send_form w-100 px-0">
                        <div class="col-xl-12 col-sm-12 justify-content-center chat_end_area d-flex">
                            <input type="number" id="incoming_msg_id" value="<?php echo($incoming_msg_id); ?>" hidden>
                            <input type="number" id="outgoing_msg_id" value="<?php echo($outgoing_msg_id); ?>" hidden>
                            <input type="text" placeholder="Type a message here..." id="message" autocomplete="off">  
                            <button class="btn btn-dark btn-sm px-3 py-0" id="send_btn"> <span class="fa fa-paper-plane"></span></button>  
                        </div>
                      </form>
              </div>
              <!-- CHAT AREA END -->
              <script>
        $(document).ready(function() {
          setInterval(function(){
            var incoming_msg_id = $('#incoming_msg_id').val();
            var outgoing_msg_id = $('#outgoing_msg_id').val();
            $.ajax({
              url : 'chat_loadMsg.php',
              type : 'POST',
              data : {incoming_msg_id:incoming_msg_id,
                      outgoing_msg_id:outgoing_msg_id},
              success : function(data){
                    $('.chat_middle_are').html(data);
                    //$('.chat_middle_are').scrollTop($(document).height());
                    
              }
            });
          },500);
          
          $(document).on('click', '#send_btn', function(event) {
            event.preventDefault();
            var incoming_msg_id = $('#incoming_msg_id').val();
            var outgoing_msg_id = $('#outgoing_msg_id').val();
            var message = $('#message').val();
            $.ajax({
              url : 'chat_send_msg.php',
              type : 'POST',
              data : {incoming_msg_id:incoming_msg_id, 
                      outgoing_msg_id:outgoing_msg_id, 
                      message:message},
              success : function(data){
                if (data == 1) {
                  $('.msg_send_form').trigger('reset');
                }else{
                  alert('Not Send...');
                }
              }
            });            
          });
        });
      </script>
            </div>
          </div>
        <?php include 'footer.php'; ?>
        <script type="text/javascript" src="js/script.js"></script>
        </div>
  </body>
</html>
