<?php

require_once "../server/autoload.php";
$ctr = new Controller();
$ctr->loadModel();
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
