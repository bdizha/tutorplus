jQuery.fn.AllowNumericOnly =
function()
{
    return this.each(function()
    {
        $(this).keydown(function(event)
        {
            // allow backspace, delete and numbers ONLY
            return ((event.keyCode == 46 || event.keyCode == 8) || !(event.keyCode < 48 || event.keyCode > 57) || (event.keyCode >= 96 && event.keyCode <= 105) || (event.keyCode == 110));
        })
    })
};
