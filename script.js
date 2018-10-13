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
        $( ".item-content" ).each(function( index ) {
            $(this).css({"animation": "none !important", "animation-iteration-count": "0"})
        });
    } else {
        edit = true;
        document.getElementById("demo").innerHTML = edit;
        document.getElementById("demo").innerHTML = "shake " + rnd(1,3) + "s";
        $( ".item-content" ).each(function( index ) {
            $(this).css({"animation": "shake " + rnd(1,3) + "s", "animation-iteration-count": "infinite"})
        });
    }
}
function closeElem(elem) {
    alert(grid.getItems().indexOf(elem));
    grid.remove(1);
}
alert(grid.getItems().indexOf($("elem2").parent().parent()));