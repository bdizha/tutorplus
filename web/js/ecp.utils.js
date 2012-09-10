$(document).ready(function(){
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