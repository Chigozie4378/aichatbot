<?php include_once "../includes/header.php" ?>

</div>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <?php include_once "../includes/navbar.php" ?>
    <?php include_once "../includes/sidebar.php" ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <?php include_once "../includes/header-title.php" ?>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">

          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-12">


              <!-- DIRECT CHAT -->
              <div class="card direct-chat direct-chat-primary">
                <div class="card-header">
                  <h3 class="card-title">Direct Chat</h3>


                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <!-- Conversations are loaded here -->
                  <div class="direct-chat-messages" style="height: 500px;" id="response">
                      <?php
                      $result = $ctr->displayChatHistory();
                      while ($row = mysqli_fetch_array($result)) { ?>
                        <div class="direct-chat-msg right">
                          <div class="direct-chat-infos clearfix">
                            <span class="direct-chat-name float-right">You</span>
                            <span class="direct-chat-timestamp float-left">
                              <?php
                              $date = $row["user_input_time"];
                              $formatted_date = date("d M g:i a", strtotime($date));
                              echo $formatted_date
                              ?>
                            </span>
                          </div>
                          <!-- /.direct-chat-infos -->
                          <img class="direct-chat-img" src="../assets/images/user-image.png" alt="message user image">
                          <!-- /.direct-chat-img -->
                          <div class="direct-chat-text">
                            <?php echo $row["user_chat"]; ?>
                          </div>
                          <!-- /.direct-chat-text -->
                        </div>
                        <!-- /.direct-chat-msg -->
                        <!-- Message. Default to the left -->
                        <div class="direct-chat-msg">
                          <div class="direct-chat-infos clearfix">
                            <span class="d>irect-chat-name float-left">AI Bot</span>
                            <span class="direct-chat-timestamp float-right">
                            <?php
                              $date1 = $row["chatbot_output_time"];
                              $formatted_date = date("d M g:i a", strtotime($date1));
                              echo $formatted_date
                              ?>
                            </span>
                          </div>
                          <!-- /.direct-chat-infos -->
                          <img class="direct-chat-img" src="../assets/images/PngItem_1584975.png" alt="message user image">
                          <!-- /.direct-chat-img -->
                          <div class="direct-chat-text">
                            <?php echo $row["bot_chat"]; ?>
                            <!-- /.direct-chat-text -->
                          </div>
                          <!-- /.direct-chat-msg -->
                          <!-- Message to the right -->


                        </div>
                        <!--/.direct-chat-messages-->
                      <?php }
                      ?>
                    
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <form method="post">
                      <div class="input-group">
                        <input type="text" name="user_input" id="user_input" placeholder="Type Message ..." class="form-control">
                        <span class="input-group-append">
                          <button type="submit" class="btn btn-info"> <i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                        </span>
                      </div>
                    </form>
                  </div>
                  <!-- /.card-footer-->
                </div>
                <!--/.direct-chat -->
            </section>
            <!-- /.Left col -->

            <!-- right col -->
          </div>
          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- <script src="../assets/plugins/jquery/jquery.min.js"></script> -->
    <?php include_once "../includes/footer.php" ?>
   
   <script>
      $('form').on('submit', function(event) {
        event.preventDefault();
        var user_input = $('input[name="user_input"]').val();
        if (user_input!=""){
          $.ajax({
          url: "../request/chat.php",
          type: 'post',
          data: {
            'user_input': user_input
          },
          success: function(response) {
            $('#response').html(response);
            $('input[name="user_input"]').val('');
            $('#response').scrollTop($('#response')[0].scrollHeight);
          }
        });
        }
       
      });
    </script>

    <script>
      onload = $('#response').scrollTop($('#response')[0].scrollHeight);
      // $(document).ready(function() {
      //   var chatContainer = $("#response");
      //   if (chatContainer[0].scrollHeight - chatContainer.scrollTop() === chatContainer.outerHeight()) {
      //     chatContainer.scrollTop(chatContainer[0].scrollHeight);
      //   }
      // });
    </script>