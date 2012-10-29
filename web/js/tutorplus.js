
var closeHtml = "<img src=\"/css/colorbox/images/close.png\" alt=\"Close\" width=\"27\" height=\"27\">";
var loadingHtml = "<div class=\"loading\"><img src=\"/images/loading.gif\" alt=\"Loading...\"></div>";
$(document).ready(function(){
    
    // submit discussion topic replies
    $('.submit-discussion-topic-reply').live("click", function() {
        $this = $(this);
        $messageId = $this.attr('messageid');
        
        $('#discussion-topic-reply-form-' + $messageId).hide();
        $('#discussion-topic-reply-form-holder-' + $messageId).append(loadingHtml);
            
        $('#discussion-topic-reply-form-' + $messageId).ajaxSubmit(function(data){             
            if(data != 'failure'){
                $.get('/backend.php/discussion_topic_reply/' + data, {}, function(replyData){   
                    $('#discussion-topic-replies-' + $messageId).append(replyData);
                }, 'html');                    
                    
                // increment the replies count
                var $messageRepliesCount = $('#replies-count-' + $messageId).html();           
                var $topicRepliesCount = $('#replies-count').html();           
                $messageRepliesCount = parseInt($messageRepliesCount) + 1;  
                $topicRepliesCount = parseInt($topicRepliesCount) + 1;
                
                $('#replies-count-' + $messageId).html($messageRepliesCount);
                $('#replies-count').html($topicRepliesCount);
                
                $('#discussion-topic-reply-form-holder-' + $messageId).load('/backend.php/discussion_topic_reply/new');                
            }
        });
        return false;
    });
    
    $('.discussion-reply textarea').live("focus", function() {
        $this = $(this);
        $button = $this.parent().siblings('.discussion_topic_actions').find('input');
        $button.removeClass('hide');
    }).live("blur", function(){
        $this = $(this);
        $button = $this.parent().siblings('.discussion_topic_actions').find('input');

        // if empty then show up the label
        if(!$.trim($this.val())) {
            $button.addClass('hide');
        }
    });
        
    $(".prompt").live('focus', function(){
        if($(this).val() == this.title){
            $(this).val("");
            $(this).height(50);
        }
    });
	
    $(".prompt").live('blur', function(){
        if($(this).val() == ""){
            $(this).val(this.title);
            $(this).height(15);
        }
    });
});
    
function convertToDecimal(val){
    
    if(is_numeric(val) && (parseFloat(val) <= parseFloat("100.00")))
    {
        return $().number_format(val, {
            numberOfDecimals: 2,
            decimalSeparator: '.',
            thousandSeparator: '',
            symbol: ''
        });
    }
    else
    {
        //alert("Only values 0.00 to 100.00 allowed!");
        return "0.00";
    }
}
    
function is_numeric(value){  
    var regex = /^[0-9]{1,3}(\.([0-9]{1,2}))?$/;
        
    return regex.test(value);
}  
    
function isSuccess(value){  
    var regex = /successfully/;
        
    return regex.test(value);
}

function reloadWindow(){
    setTimeout(function(){
        window.location.reload();
    }, 5000);
}

function requestLogin(){    
    $.fn.colorbox({
        href: '/profile-register',
        width:"890px", 
        height:"555px", 
        overlayClose: false,		
        "close":closeHtml
    });
}
		
function fetchContent(url){
    // get content
    $.get(url, showContent);
}		
		
function showContent(res){
    $('#sf_admin_container').html(res);
}

function showLoading(){
    $('#sf_admin_container').html(loadingHtml);
}

function openPopup(url, width, height, title){    
    $.fn.colorbox({
        title: title,
        href: url,
        width: width,
        overlayClose: false,		
        "close": closeHtml
    });
}
    
function convertToDecimal(val){    
    if(is_numeric(val) && (parseFloat(val) <= parseFloat("100.00")))
    {
        return $().number_format(val, {
            numberOfDecimals: 2,
            decimalSeparator: '.',
            thousandSeparator: '',
            symbol: ''
        });
    }
    else
    {
        return "0.00";
    }
}
    
function is_numeric(value){  
    var regex = /^[0-9]{1,3}(\.([0-9]{1,2}))?$/;
        
    return regex.test(value);
}