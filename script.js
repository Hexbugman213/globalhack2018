var edit = false;
var grid = new Muuri('.grid', {
    dragEnabled: true,
    dragStartPredicate: function (item, event) {
        return edit;

    },
});
document.getElementById("demo").innerHTML = edit;
function rnd(min, max) {
    return Math.random() * (max - min) + min;
}
function toggleEdit() {
    if (edit) {
        edit = false;
        document.getElementById("demo").innerHTML = edit;
        $(".btn").html("Edit");
        $( ".shake-item" ).each(function( index ) {
            $(this).css({"animation": "none !important", "animation-iteration-count": "0"})
        });
    } else {
        edit = true;
        document.getElementById("demo").innerHTML = edit;
        $( ".shake-item" ).each(function( index ) {
            $(this).css({"animation": "shake " + rnd(1,3) + "s", "animation-iteration-count": "infinite"})
        });
        $(".btn").html("Save Changes");
    }
}
function closeElem(elem) {
    grid.remove([$('elem1')], true);
}
/*
        CODE FOR CLOSE BUTTON AND ADD - CURRENTLY UNUSED
        $( ".close" ).each(function( index ) {
            $(this).css({"visibility": "visible"})
        });
        $(".add-item").css({"visibility": "visible"})
 */