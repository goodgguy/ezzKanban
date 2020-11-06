var master = document.getElementById('master');
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

(function ($) {

    $.fn.boardMn = function (options) {
        let defaults = {
            "url": "http://localhost:8080/ezzKanban/",
            "addfield": "#addcolumn",
            "btnAddfield": "#btnAddcolumn",
            "board": "#master",
            "modalAlert":"#getAlert",
            "textAlert":"#modelAlert"
        };
        options = $.extend({}, defaults, options);

        let addfield = options.addfield;
        let btnAddfield = options.btnAddfield;
        let board = options.board;
        let modalAlert=options.modalAlert;
        let textAlert=options.textAlert;

        init();


        //cache=false;
        function init() {
            loadData();
            handleAddcolumn();
        }
        function loadData() {
            $(board).empty();
            $.ajax({
                url: options.url + "getboard",
                type: "GET",
                dataType: "json",
                cache: false
            }).done(function (data) {
                $.each(data, function (index, val) {
                    addColumn(val);
                })
            });
        }
        function addColumn(val) {
            let str = `<div class="col-sm-6 col-md-4 col-xl-3 list-columm">
            <div class="card bg-light">
                <div class="card-body" style="background-color: #ebecf0">
                    <div class="row">
                        <div class="col-sm-8 ">
                            <h6 class="card-title text-uppercase text-truncate py-2">${val.title}</h6>
                        </div>
                        <div class="col-sm-4 ">
                            <a href="#">
                                <img src="https://i.ibb.co/2SLrtRP/delete.png" class="rounded-circle float-right"
                                    width="25" height="25"></a>
                        </div>
                    </div>
                    <div id="${val.IDcolumn}" class="items border border-light list-card">
                        
                    </div>

                </div>
            </div>
        </div>`;
            $(board).append(str);
            handleDragdropCard(val.IDcolumn);
            addRow(val.IDcolumn, val.cardlist);
        }

        function addRow(idcol, cardlist) {
            $.each(cardlist, function (index, val) {
                let str = `<div class="card draggable shadow-sm mb-3" id="cd1" style="background-color: #f6f7d4;">
                <div class="card-body p-2" style="background-color: #${val.priority == 1 ? "28df99" : ""}">
                    <div class="card-title">
                        <a href="" class="lead">${val.title}</a>
                        <a href="#">
                            <img src="https://i.ibb.co/jzf1cFG/clear.png"
                                class="rounded-circle float-right" width="25" height="25"></a>
                    </div>
                    <p>
                        <span class="badge badge-warning">${val.create_date}</span>
                    </p>
                    <span class="badge badge-danger float-right">${val.priority == 1 ? "PRIORITY" : ""}</span>
                </div>
                <div id="user_${val.IDcard}" class="card-body p-3">
                    
                </div>
            </div>`;
                $("#" + idcol).append(str);
                addUser(val.IDcard, val.userList);
            });
        }
        function handleDragdropCard(idcol) {
            let card = $("#" + idcol).get(0);
            new Sortable(card, {
                group: 'shared',
                animation: 150
            });
        }
        function addUser(idcard, userlist) {
            $.each(userlist, function (index, val) {
                let str = `<img src="public/img/${val.image}"
            class="rounded-circle" width="30" height="30">`;
                $("#user_" + idcard).append(str);
            });
        }
        function handleAddcolumn() {
            $(btnAddfield).click(function () {
                const value = $(addfield).val();
                $.post(options.url + "addColumn", { column: value })
                    .done(function (data) {
                        console.log(data);
                        $(textAlert).html(`<p>${data}</p>`);
                        $(modalAlert).modal();
                    });
            });
        }
    };

}(jQuery));

$(document).ready(function () {
    var objBoard = {};
    $("#master").boardMn(objBoard);
});
