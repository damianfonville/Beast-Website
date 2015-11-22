$(document).ready(function(){
var heights = $(".features").map(function ()
    {
        return $(this).height();
    }).get();

    var maxHeight = Math.max.apply(null, heights);

    $(".features").each(function(){

        var dif = maxHeight - $(this).height();

        var height = $(this).find(".text-left").height() + dif;
        $(this).find(".text-left").height(height);
        return;
    });
});