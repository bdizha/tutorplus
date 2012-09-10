
var closeHtml = "<img src=\"/css/colorbox/images/close.png\" alt=\"Close\" width=\"27\" height=\"27\">";
var loadingHtml = "<div class=\"loading\"><img src=\"/images/loading.gif\" alt=\"Loading...\"></div>";
$(document).ready(function(){
    $("#login-btn").click(function(){            
        $('#login-box').toggle();
    });
    
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
        
    // resize widths
    resizeWidths();
    
// resize heights
// resizeHeights();
});
    
function myModal(title, url, minHeight, minWidth){
    $('#modal-title').html(title);
    $('#modal-body').load(url);  
        
    $('#simple-modal').modal({
        close: true,
        closeHTML: '<div id="simplemodal-close"></div>',
        overlayClose: true,
        autoPosition: true,
        minWidth: minWidth,
        minHeight: minHeight,
        position: ['150px']
    });
    
    $("#modal-body").height(minHeight + 66);        
    $("#simple-modal").removeClass('hide');
    return false;        
}

function resizeWidths(){
    var bodyWidth = $("body").width();
    
    // calculate the main body's width
    if($("body").width() <= 1060)
    {
        bodyWidth = 1060;  
    }
    
    bodyWidth = 1060;
    
    $("#main-container").width("100%");
    $("#middle-column").width(bodyWidth - 230);   
    
    // cater for the main welcome page
    if($("#sf_admin_container").val() != undefined)
    {   
        // set the content sub block's width
        var content_width = $("#sf_admin_container").width();
        
        $(".left-block, .right-block").each(function(){
            $(this).width(content_width / 2 - 5);            
        });
    }
    if($("#sf_admin_content").val() != undefined)
    {         
        $("#sf_admin_content").width($("#sf_admin_content").width());
    }
}

function resizeHeights(){
//alert("Are you reaching this end?");
//$("#container-wrapper").height($("#main-container").height());
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