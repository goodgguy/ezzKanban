(function ($) {

    $.fn.boardMn = function (options) {
        let defaults = {
            "url": "http://localhost:8080/ezzKanban/",
            "addfield": "#addcolumn",
            "btnAddfield": "#btnAddcolumn",
            "board": "#master",
            "modalAlert": "#getAlert",
            "textAlert": "#modelAlert",
            "col_del": "#col_del_",
            "getConfirmDel": "#getConfirmDel",
            "textConfirmDel": "#modelConfirmDel",
            "confirmBtn": "confirmBtn",
            "col_edit": "#col_edit_",
            "getEditColumn": "#getEditColumn",
            "inputEditCol": "#inputEditCol",
            "confirmEditCol": "#confirmEditCol"

        };
        options = $.extend({}, defaults, options);

        const addfield = options.addfield;
        const btnAddfield = options.btnAddfield;
        const board = options.board;
        const modalAlert = options.modalAlert;
        const textAlert = options.textAlert;
        const col_del = options.col_del;
        const getConfirmDel = options.getConfirmDel;
        const textConfirmDel = options.textConfirmDel;
        const col_edit = options.col_edit;
        const getEditColumn = options.getEditColumn;
        const inputEditCol = options.inputEditCol;
        const confirmEditCol = options.confirmEditCol;

        init();


        //cache=false;
        function init() {
            addEventDragDropBoard();
            loadData();
            handleAddcolumn();
        }
        function addEventDragDropBoard() {
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
                    // console.log(evt.oldIndex);
                    // console.log(evt.newIndex);
                    // console.log(evt.item);
                    //console.log(evt.related);
                },
                onMove: function (/**Event*/ evt, /**Event*/ originalEvent) {
                    // evt.dragged;
                    // evt.draggedRect;
                    // evt.related;
                    // evt.relatedRect;
                    // evt.willInsertAfter;
                    // originalEvent.clientY;
                     console.log(evt.related);
                },
            });
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
                        <div class="col-sm-4">
                            <a col_delete_id=${val.IDcolumn} id="col_del_${val.IDcolumn}">
                                <img src="https://i.ibb.co/2SLrtRP/delete.png" class="rounded-circle float-right"
                                    width="25" height="25">
                            </a>
                            <a col_edit_id=${val.IDcolumn} id="col_edit_${val.IDcolumn}">
                                <img src="https://i.ibb.co/5MKxrvT/edit.png" class="float-right"
                                    width="25" height="25">
                            </a>
                            <a col_add_id=${val.IDcolumn} id="col_add_${val.IDcolumn}">
                                <img src="https://i.ibb.co/2srq9nT/plus.png" class="float-right"
                                    width="25" height="25">
                            </a>
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
            handledeleteColumn(val.IDcolumn);
            handleeditColumn(val.IDcolumn, val.title);
        }

        function addRow(idcol, cardlist) {
            $.each(cardlist, function (index, val) {
                let str = `<div class="card draggable shadow-sm mb-3" id="cd_${val.IDcard}" style="background-color: #f6f7d4;">
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
            let col = $("#" + idcol).get(0);
            new Sortable(col, {
                group: 'shared',
                animation: 150,
                onEnd: function (evt) {
                    let idCard = evt.item.id;
                    idCard = idCard.split("_").pop();
                    $.post(options.url + "card/changState", { toColumn: evt.to.id, idCard: idCard })
                        .done(function (data) {
                            if (data.length > 0) {
                                //RELOAD();
                            }
                        });
                },
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
                        $(textAlert).html(`<p>${data}</p>`);
                        $(modalAlert).modal();
                        $(addfield).val("");
                    });
            });
        }
        function handledeleteColumn(IDcolumn) {
            $(col_del + IDcolumn).on("click", function () {
                let id = $(this).attr("col_delete_id");
                $(textConfirmDel).html(`<p>Are you sure you want to delete this column</p>`);
                $(getConfirmDel).modal();
                $(confirmBtn).on("click", function () {
                    $.post(options.url + "deleteColumn", { column: id })
                        .done(function (data) {
                            if (data.length > 0) {
                                $(textAlert).html(`<p>${data}</p>`);
                                $(modalAlert).modal();
                            }
                        });
                });
            })
        }
        function handleeditColumn(IDcolumn, title) {
            $(col_edit + IDcolumn).on("click", function () {
                $(inputEditCol).val(title);
                $(getEditColumn).modal();
                $(confirmEditCol).on("click", function () {
                    const titleChanged = $(inputEditCol).val();
                    $.post(options.url + "editColumn", { column: IDcolumn, title: titleChanged })
                        .done(function (data) {
                            if (data.length > 0) {
                                $(textAlert).html(`<p>${data}</p>`);
                                $(modalAlert).modal();
                            }
                        });
                })
            });
        }
        function handleaddCard() {

        }

    };

}(jQuery));

$(document).ready(function () {
    var objBoard = {};
    $("#master").boardMn(objBoard);
});
