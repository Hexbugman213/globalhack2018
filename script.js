var order = [2,1,3];
var edit = false;
function init(order) {
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
    return grid
}
var grid = init(order);
function getOrder() {
    return order;
}
function rnd(min, max) {
    return Math.random() * (max - min) + min;
}

function toggleEdit() {
    if (edit) {
        edit = false;
        $(".shake-item").each(function (index) {
            $(this).css({"animation": "none !important", "animation-iteration-count": "0"})
        });
        //saving routine
        order = grid.getItems().map(item => item.getElement().getAttribute('data-id'));
        $(".save-btn").addClass("hidden");
        $(".edit-btn").removeClass("hidden");
    } else {
        edit = true;
        $(".shake-item").each(function (index) {
            $(this).css({"animation": "shake " + rnd(1, 3) + "s", "animation-iteration-count": "infinite"})
        });
        $(".edit-btn").addClass("hidden");
        $(".save-btn").removeClass("hidden");
    }
}

function closeElem(elem) {
    grid.remove([$('elem1')], true);
}
function submitOrder() {
    order = grid.getItems().map(item => item.getElement().getAttribute('data-id'));
    alert(order);
    $('#hiddenboi').attr("value", order);
}
/*
        CODE FOR CLOSE BUTTON AND ADD - CURRENTLY UNUSED
        $( ".close" ).each(function( index ) {
            $(this).css({"visibility": "visible"})
        });
        $(".add-item").css({"visibility": "visible"})
 */