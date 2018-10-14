var edit = false;
var order = [1,3,2];
var grid = new Muuri('.grid', {
    dragEnabled: true,
    dragStartPredicate: function (item, event) {
        return edit;

    },
    layoutOnInit: true,
    sortData: {
        id: function (item, element) {
            return order[parseFloat(element.getAttribute('data-id')) - 1];
        }
    },
});
grid.sort('id', {layout: 'instant'});
document.getElementById("demo").innerHTML = edit;
function rnd(min, max) {
    return Math.random() * (max - min) + min;
}
function toggleEdit() {
    if (edit) {
        edit = false;
        document.getElementById("demo").innerHTML = edit;
        $( ".shake-item" ).each(function( index ) {
            $(this).css({"animation": "none !important", "animation-iteration-count": "0"})
        });
        //saving routine
        var order = grid.getItems().map(item => item.getElement().getAttribute('data-id'));
        alert(order)
        $(".btn").html("Edit");
        $(".btn").removeClass("btn-success");
        $(".btn").addClass("btn-primary");

    } else {
        edit = true;
        document.getElementById("demo").innerHTML = edit;
        $( ".shake-item" ).each(function( index ) {
            $(this).css({"animation": "shake " + rnd(1,3) + "s", "animation-iteration-count": "infinite"})
        });
        $(".btn").html("Save Changes");
        $(".btn").addClass("btn-success");
        $(".btn").removeClass("btn-primary");
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