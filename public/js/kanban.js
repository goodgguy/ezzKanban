var master = document.getElementById('master');
var list_card_1 = document.getElementById('1');
var list_card_2 = document.getElementById('2');
var list_card_3 = document.getElementById('3');
var list_card_4 = document.getElementById('4');
var list_card_5 = document.getElementById('5');

new Sortable(master, {
    animation: 150,
    ghostClass: 'blue-background-class',
    onEnd: function (evt) {
        var itemEl = evt.item; 
        evt.to; 
        evt.from; 
        evt.oldIndex; 
        evt.newIndex; 
        evt.oldDraggableIndex; 
        evt.newDraggableIndex; 
        evt.clone; 
        evt.pullMode;
        console.log(evt.oldIndex);
        console.log(evt.newIndex);
    }, 
});

new Sortable(list_card_1, {
    group: 'shared', // set both lists to same group
    animation: 150,
    onEnd: function (evt) {
        var itemEl = evt.item; 
        evt.to; 
        evt.from; 
        evt.oldIndex; 
        evt.newIndex; 
        evt.oldDraggableIndex; 
        evt.newDraggableIndex; 
        evt.clone; 
        evt.pullMode; 
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

(function ( $ ) {
 
    $.fn.boardMn = function(options) {
        let defaults = {
            "url":"http://localhost:8080/ezzKanban/getboard",
            "addfield":"#addcolumn",
            "btnAddfield":"#btnAddcolumn",
            "board": "#master"
        };
        options=$.extend({},defaults, options);

        let addfield=options.addfield;
        let btnAddfield=options.btnAddfield;
        let board=options.board;

        init();
        //cache=false;
        function init()
        {
           loadData();
        }
        function loadData()
        {
            $.ajax({
                url: options.url,
                type: "GET",
                dataType: "json"
              }).done(function(data)
              {
                  $.each(data, function(index,val)
                  {
                      console.log(val);
                      //addColumn(val);
                  })
              });
        }
        function addColumn(val)
        {
            $(board).empty();
            let str=``;
            $(board).append(str);
        }

    };
 
}( jQuery ));

$(document).ready(function () {
    var objBoard={};
    $("#master").boardMn(objBoard);
});
