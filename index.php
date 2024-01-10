<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ChatApps</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <div class="container-fluid p-1">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-8 col-lg-6">
                <div class="chat-container p-3">
                    <div class="chat-header">
                        <h1>ChatApps</h1>
                    </div>
                    <div class="chat-content" style="overflow-y: scroll; height: 345px;">
                        <ul class="chat-list">
                        </ul>
                    </div>
                    <div class="chat-input">
                        <form id="chat-form">
                            <div class="input-group">
                                <input type="text" name="nama_chat" class="form-control" id="name"
                                    placeholder="Enter Name...">
                                <button type="button" class="btn btn-primary">Send</button>
                            </div>
                            <textarea class="form-control mt-6 mb-3" name="text_chat" id="chat" rows="4"
                                placeholder="Type Here..."></textarea>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

<script type="text/javascript">
$(document).ready(function() {

    getChat();
    $("button").click(function(e) {
        var values = $('#chat-form').serialize();

        // post
        $.ajax({
            type: "post",
            url: "postChat.php",
            data: values,
            success: function(response) {
                getChat();
                clearInput();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    });
});

function getChat() {
    $.ajax({
        type: "get",
        url: "getChat.php",
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        },
        success: function(response) {
            $(".chat-content").html(response);
        }
    });
}

function clearInput() {
    $('input').val('');
    $('textarea').val('');
}
</script>

</html>