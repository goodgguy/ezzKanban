var master = document.getElementById('master');
var list_card_1 = document.getElementById('1');
var list_card_2 = document.getElementById('2');
var list_card_3 = document.getElementById('3');
var list_card_4 = document.getElementById('4');
var list_card_5 = document.getElementById('5');

new Sortable(master, {
    animation: 150,
    ghostClass: 'blue-background-class',
});

new Sortable(list_card_1, {
    group: 'shared', // set both lists to same group
    animation: 150,
    onEnd: function (/**Event*/ evt) {
        var itemEl = evt.item; // dragged HTMLElement
        evt.to; // target list
        evt.from; // previous list
        evt.oldIndex; // element's old index within old parent
        evt.newIndex; // element's new index within new parent
        evt.oldDraggableIndex; // element's old index within old parent, only counting draggable elements
        evt.newDraggableIndex; // element's new index within new parent, only counting draggable elements
        evt.clone; // the clone element
        evt.pullMode; // when item is in another sortable: `"clone"` if cloning, `true` if moving
        console.log(evt.to);
        console.log(evt.from);
    },
});

new Sortable(list_card_2, {
    group: 'shared',
    animation: 150
});
new Sortable(list_card_3, {
    group: 'shared',
    animation: 150
});
new Sortable(list_card_4, {
    group: 'shared',
    animation: 150
});
new Sortable(list_card_5, {
    group: 'shared',
    animation: 150
});