<?php include_once "../includes/header.php";

?>
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<body>
    <?php include_once "../includes/navbar.php" ?>
    <div class="container">
        <div class="row">
            <div class="offset-md-3 col-md-6">

                <form id="myForm" method="post">
                    <div class="form-inline">
                        <label for="user_input">Enter a message</label>
                        <input type="text" name="user_input" id="user_input" class="form-inline" autocomplete="off" autofocus>
                        <button type="submit"  class="btn btn-info"> <i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                    </div>
                </form>

            </div>
        </div>
        <div class="row">
            <div class="offset-md-3 col-md-6">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3>Response here</h3>
                    </div>
                    <div class="card-body" id="response">
                        <?php 
                        $ctr->loadModel();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>



<script>
    $('form').on('submit', function(event){
    event.preventDefault();
    var user_input = $('input[name="user_input"]').val();
    $.ajax({
        url: "http://127.0.0.1:5000/predict",
        type: 'post',
        data: {'user_input': user_input},
        success: function(response){
            $('#response').html(response);
            $('input[name="user_input"]').val(''); 
        }
    });
});
    // $(document).ready(function() {
    //     $("#myForm").submit(function(e) {
    //         e.preventDefault();
    //         $.ajax({
    //             type: "POST",
    //             url: "index2.php",
    //             data: $("#myForm").serialize(),
    //             success: function(response) {
    //                 alert(response);
    //             }
    //         });
    //     });
    // });
</script>

