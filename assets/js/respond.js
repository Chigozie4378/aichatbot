$('form').on('submit', function(event){
    event.preventDefault();
    var user_input = $('input[name="user_input"]').val();
    $.ajax({
        url: "http://127.0.0.1:5000/predict",
        type: 'post',
        data: {'user_input': user_input},
        success: function(response){
            $('#response').html(response);
        }
    });
});
