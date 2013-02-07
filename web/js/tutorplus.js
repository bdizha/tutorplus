var closeHtml = "<img src=\"/css/colorbox/images/close.png\" alt=\"Close\" width=\"27\" height=\"27\">";
var loadingHtml = "<div class=\"loading\"><img src=\"/images/loading.gif\" alt=\"Loading...\"></div>";
var redactorDefaultHtml = "<p><br></p>";
var middleContentWidth = 940;
$(document).ready(function(){
    $(".prompt").live('focus',function(){
        if ($(this).val() == this.title) {
            $(this).val("");
            $(this).height(50);
        }
    });

    $(".prompt").live('blur',function(){
        if ($(this).val() == "") {
            $(this).val(this.title);
            $(this).height(15);
        }
    });
});

function convertToDecimal(val){

    if (is_numeric(val) && (parseFloat(val) <= parseFloat("100.00")))
    {
        return $().number_format(val,{
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

function isSuccess(value){
    var regex = /successfully/;

    return regex.test(value);
}

function reloadWindow(){
    setTimeout(function(){
        window.location.reload();
    }, 5000);
}

function fetchContent(url){
    // get content
    $.get(url, showContent);
}

function loadUrl(url){
    document.location.href = url;
    return false
}

function showContent(res){
    $('#sf_admin_container').html(res);
}

function showLoading(){
    $('#sf_admin_container').html(loadingHtml);
}

function openPopup(url,width, height, title){
    // always check popup urls first for a live session
    $.get("/profile/check/login", function(result){
        if(result.status === '401'){
            window.location.reload();
            return false;
        }
        else{    
            $.fn.colorbox({
                top: "59px",
                title: "<span>" + title + "</span>",
                href: url,
                width: width,
                overlayClose: false,
                "close": closeHtml
            });            
        }
    }, 'json');
}

function convertToDecimal(val){
    if (is_numeric(val) && (parseFloat(val) <= parseFloat("100.00")))
    {
        return $().number_format(val,{
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

function isNumeric(value){
    var regex = /^[0-9]{1,3}(\.([0-9]{1,2}))?$/;
    return regex.test(value);
}