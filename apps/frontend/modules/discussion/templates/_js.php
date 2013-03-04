<script type='text/javascript'>
    //<![DATA[
    $(document).ready(function(){
        $('.message-edit textarea').redactor();

        $(".sf_admin_action_new_topic input").click(function(){
            openPopup($(this).attr("href"),'<?php echo $helper->getPopupWidth() ?>','<?php echo $helper->getPopupHeight() ?>',"New Topic");
            return false;
        });

        $(".discussion-topic .button-edit").click(function(){
            openPopup($(this).attr("href"),'<?php echo $helper->getPopupWidth() ?>','<?php echo $helper->getPopupHeight() ?>',"Edit Topic");
            return false;
        });

        $(".sf_admin_action_invite_peers input").click(function(){
            openPopup($(this).attr("href"),'420px','480px','+ Invite Disucssion Peers');
            return false;
        });

        $(".discussion-topic").hover(function(){
            $(this).children(".inline-content-actions").show();
        },
            function(){
                $(this).children(".inline-content-actions").hide();
            });

        $(".message").hover(function(){
            if (!$(this).hasClass("editing")) {
                $(this).children(".inline-content-actions").show();
            }
        },
            function(){
                $(this).children(".inline-content-actions").hide();
            });

        $(".message .button-edit").click(function(){
            $("#message-" + $(this).attr("id")).addClass("editing");
            $("#message-" + $(this).attr("id") + " .view-mode").hide();
            $("#message-" + $(this).attr("id") + " .edit-mode").show();
            return false;
        });

        $('.update').click(function(){
            var postid = $(this).attr("id");
            var message = $("#discussion_post_form_" + postid + " textarea").val();
            if ($.trim(message) == "") {
                alert("Please enter your post!");
                return;
            }

            if ($(this).val() != "Loading...") {
                $(this).val("Loading...");
                $("#discussion_post_form_" + postid).ajaxSubmit(function(data){
                    if (data == "success") {
                        $("#message-" + postid).html(message);
                    }
                    else{
                        alert("Oops! Your post couldn't be edited at this time.");
                    }
                });
                $("#message-" + postid).removeClass("editing");
                $(this).val("Update");
            }
        });
    });

    function fetchDiscussionTopics(){
        loadUrl(window.location.href);
    }
    //]]
</script>