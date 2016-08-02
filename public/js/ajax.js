$(document).ready(function(){
    $.ajaxSetup(
    {
        headers:
        {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('a.thumb-up-button').click(function(e) {
        var task_id = $(this).attr('value');
        console.log("clicked thumb up button");
        sendRequest("post", "like", task_id);
        //Prevent default action (scrooling to specified element for example)
        e.preventDefault();
    });

    function sendRequest(action, subaction, id) {
        $.ajax({
            type: "POST",
            dataType : 'json',
            url: "/" + action + "/" + id + "/" + subaction,
            success: function (data) {
                console.log(data);
                alert(data['message']);
            },
            error: function (data) {
                console.log('Error:', data);
                alert("something went wrong");
            }
        });
    }
});
