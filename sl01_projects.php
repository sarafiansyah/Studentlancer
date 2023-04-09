<?php

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: main_login_success.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link rel="stylesheet" href="assets/css/styles.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <style>
        .comment-form-container {
            background: #F0F0F0;
            border: #e0dfdf 1px solid;
            padding: 20px;
            border-radius: 4px;
        }

        .input-row {
            margin-bottom: 20px;
        }

        .input-field {
            width: 100%;
            border-radius: 4px;
            padding: 10px;
            border: #e0dfdf 1px solid;
        }

        .btn-submit {
            padding: 10px 20px;
            background: #333;
            border: #1d1d1d 1px solid;
            color: #f0f0f0;
            font-size: 0.9em;
            width: 100px;
            border-radius: 4px;
            cursor: pointer;
        }

        ul {
            list-style-type: none;
        }

        .comment-row {
            border-bottom: #e0dfdf 1px solid;
            margin-bottom: 15px;
            padding: 15px;
        }

        .outer-comment {
            background: #F0F0F0;
            padding: 20px;
            border: #dedddd 1px solid;
            border-radius: 4px;
        }

        span.comment-row-label {
            color: #484848;
        }

        span.posted-by {
            font-weight: bold;
        }

        .comment-info {
            font-size: 0.9em;
            padding: 0 0 10px 0;
        }

        .comment-text {
            margin: 10px 0px 30px 0;
        }

        .btn-reply {
            color: #2f20d1;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-reply:hover {
            text-decoration: underline;
        }

        #comment-message {
            margin-left: 20px;
            color: #005e00;
            display: none;
        }

        .label {
            padding: 0 0 4px 0;
        }
    </style>
</head>

<body>
    <header>
        <?php include '_fw/main_nav.php'; ?>
    </header>
    <main>
        <div class="container" style="margin-top: 100px;">
            <h1>Comment System using PHP and Ajax</h1>
            <div class=" comment-form-container">
                <form id="frm-comment">
                    <div class="input-row">
                        <div class="label">Name:</div>
                        <input type="hidden" name="comment_id" id="commentId" /> <input class="input-field" type="text" name="name" id="name" placeholder="Enter your name" />
                    </div>
                    <div class="input-row">
                        <textarea class="input-field" name="comment" id="comment" placeholder="Your comment here"></textarea>
                    </div>
                    <div>
                        <input type="button" class="btn-submit" id="submitButton" value="Publish" />
                        <div id="comment-message">Comment added successfully.</div>
                    </div>
                </form>
            </div>
            <div id="output"></div>
            <div class="container">
                <div class="card w-100" style="">
                    <div class="card-body">
                        <h5 class="card-title"><b>Card title</b></h5>
                        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a class="btn btn-primary rounded-pill" href="#" role="button">Reply</a>

                    </div>
                </div>
            </div>
    </main>
    </div>

    <footer>
        <?php include '_fw/main_footer.php'; ?>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script>
        document.onreadystatechange = function() {
            let lastScrollPosition = 0;
            const navbar = document.querySelector(".navbar");
            window.addEventListener("scroll", function(e) {
                lastScrollPosition = window.scrollY;

                if (lastScrollPosition > 100)
                    navbar.classList.remove("navbar-dark"), navbar.classList.add("bg-light", "navbar-light");

                else navbar.classList.remove("bg-light"), navbar.classList.add("navbar-dark");
            });
        };
    </script>
    <script>
        function postReply(commentId) {
            $('#commentId').val(commentId);
            $("#name").focus();
        }

        $("#submitButton").click(function() {
            $("#comment-message").css('display', 'none');
            var str = $("#frm-comment").serialize();

            $.ajax({
                url: "_php/comment-add.php",
                data: str,
                type: 'post',
                success: function(response) {
                    var result = eval('(' + response + ')');
                    if (response) {
                        $("#comment-message").css('display', 'inline-block');
                        $("#name").val("");
                        $("#comment").val("");
                        $("#commentId").val("");
                        listComment();
                    } else {
                        alert("Failed to add comments !");
                        return false;
                    }
                }
            });
        });

        $(document).ready(function() {
            listComment();
        });

        function listComment() {
            $.post("_php/comment-list.php",
                function(data) {
                    var data = JSON.parse(data);

                    var comments = "";
                    var replies = "";
                    var item = "";
                    var parent = -1;
                    var results = new Array();

                    var list = $("<ul class='outer-comment'>");
                    var item = $("<li>").html(comments);

                    for (var i = 0;
                        (i < data.length); i++) {
                        var commentId = data[i]['comment_id'];
                        parent = data[i]['parent_comment_id'];

                        if (parent == "0") {
                            comments = "<div class='card w-100' style=''>" +
                                " <div class='card-body'> " +
                                "<h5 class='card-title'><b>" + data[i]['comment_sender_name'] + "</b></h5> " +
                                "<h6 class='card-subtitle mb-2 text-muted'>" + data[i]['comment_at'] + "</h6>" +
                                "<p class='card-text'> " + data[i]['comment'] + "</p>  " +
                                "</p><a class='btn btn-primary rounded-pill btn-reply'  onClick='postReply(" + commentId + ")'>Reply</a>  </div></div>";

                            var item = $("<li>").html(comments);
                            list.append(item);
                            var reply_list = $('<ul>');
                            item.append(reply_list);
                            listReplies(commentId, data, reply_list);
                        }
                    }
                    $("#output").html(list);
                });
        }

        function listReplies(commentId, data, list) {
            for (var i = 0;
                (i < data.length); i++) {
                if (commentId == data[i].parent_comment_id) {
                    var comments = "<div class='comment-row'>" +
                        " <div class='comment-info'><span class='comment-row-label'>from</span> <span class='posted-by'>" + data[i]['comment_sender_name'] + " </span> <span class='comment-row-label'>at</span> <span class='posted-at'>" + data[i]['comment_at'] + "</span></div>" +
                        "<div class='comment-text'>" + data[i]['comment'] + "</div>" +
                        "<div><a class='btn-reply' onClick='postReply(" + data[i]['comment_id'] + ")'>Reply</a></div>" +
                        "</div>";
                    var item = $("<li>").html(comments);
                    var reply_list = $('<ul>');
                    list.append(item);
                    item.append(reply_list);
                    listReplies(data[i].comment_id, data, reply_list);
                }
            }
        }
    </script>
</body>

</html>