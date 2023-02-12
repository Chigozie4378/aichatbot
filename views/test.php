

<form  method="post">
                    <div class="form-inline">
                        <label for="user_input">Enter a message</label>
                        <input type="text" name="user_input" id="user_input" class="form-inline" autocomplete="off" autofocus>
                        <button type="submit" name="send" class="btn btn-info"> <i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                    </div>
                </form>

<script>
$('form').on('submit', function(event){
    alert(1)
    
});
</script>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
