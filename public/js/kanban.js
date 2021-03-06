(function ($) {

    $.fn.boardMn = function (options) {
        let defaults = {
            "url": "http://10.192.0.210:8080/ezzKanban/",
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
            "confirmEditCol": "#confirmEditCol",
            "row_add": "#row_add_",
            "getAddCard": "#getAddCard",
            "addcard_startdate": "#addcard_startdate",
            "addcard_duedate": "#addcard_duedate",
            "title_addCard": "#title_addCard",
            "description_addCard": "#description_addCard",
            "priority_addCard": "#priority_addCard",
            "submit_addCard": "#submit_addCard",
            "row_del": "#row_del_",
            "col_board": "#board_",
            "board_title": "#board_title_",
            "row_title": "#row_title_",
            "getEditCard": "#getEditCard",
            "detailcard_priority": "#detailcard_priority",
            "detailcard_done": "#detailcard_done",
            "detailcard_title": "#detailcard_title",
            "detailcard_description": "#detailcard_description",
            "detailcard_startdate": "#detailcard_startdate",
            "detailcard_duedate": "#detailcard_duedate",
            "card_priority": "#card_priority_",
            "row_status": "#row_status_",
            "detailcard_listuser": "#detailcard_listuser",
            "detailcard_addUser": "#detailcard_addUser",
            "detailcard_listUserNotIn": "#detailcard_listUserNotIn",
            "user_notin_add": "#user_notin_add_",
            "user_notin": "#user_notin_",
            "userlist_cardOnboard": "#user_",
            "user_in": "#user_in_",
            "user_img": "#user_img_"


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
        const row_add = options.row_add;
        const getAddCard = options.getAddCard;

        const addcard_startdate = options.addcard_startdate;
        const addcard_duedate = options.addcard_duedate;
        const title_addCard = options.title_addCard;
        const description_addCard = options.description_addCard;
        const priority_addCard = options.priority_addCard;
        const submit_addCard = options.submit_addCard;

        const row_del = options.row_del;
        const col_board = options.col_board;
        const board_title = options.board_title;

        const row_title = options.row_title;
        const getEditCard = options.getEditCard;
        const row_status = options.row_status;

        const userlist_cardOnboard = options.userlist_cardOnboard;
        const user_img = options.user_img;

        //DETAIL CARD
        const detailcard_priority = options.detailcard_priority;
        const detailcard_done = options.detailcard_done;
        const detailcard_title = options.detailcard_title;
        const detailcard_description = options.detailcard_description;
        const detailcard_startdate = options.detailcard_startdate;
        const detailcard_duedate = options.detailcard_duedate;
        const detailcard_listuser = options.detailcard_listuser;
        const detailcard_addUser = options.detailcard_addUser;
        const detailcard_listUserNotIn = options.detailcard_listUserNotIn;
        const user_notin_add = options.user_notin_add;
        const user_notin = options.user_notin;
        const user_in = options.user_in;

        const card_priority = options.card_priority;
        var IDCOL_ADDCARD;
        var DETAILCARD;

        init();


        //cache=false;
        function init() {
            addEventDragDropBoard();
            loadData();
            initButton();
            handleAddcolumn();
            handleModalAddRow();
            handleModalDetailCard();
        }
        function initButton() {
            $(detailcard_listUserNotIn).hide();
            $(detailcard_addUser).click(function () {
                $(detailcard_listUserNotIn).toggle();
            });
        }
        function addEventDragDropBoard() {
            var master = document.getElementById('master');
            let idColListRelated = [];
            new Sortable(master, {
                animation: 150,
                ghostClass: 'blue-background-class',
                onEnd: function (evt) {
                    let idCol = evt.item.id;
                    idCol = idCol.split("_").pop();
                    $.post(options.url + "column/changState", { column: idCol, columnRelated: idColListRelated })
                        .done(function (data) {
                            if (data.length > 0) {
                            }
                        });
                },
                onMove: function (evt, originalEvent) {
                    let idColRelated = evt.related.id;
                    idColRelated = idColRelated.split("_").pop();
                    idColListRelated.push(idColRelated);
                },
                onStart: function (evt) {
                    idColListRelated = []
                }
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
            let str = `<div id="board_${val.IDcolumn}" class="col-sm-6 col-md-4 col-xl-3 list-columm">
            <div class="card bg-light">
                <div class="card-body" style="background-color: #ebecf0">
                    <div class="row">
                        <div class="col-sm-8 ">
                            <h6 id="board_title_${val.IDcolumn}" class="card-title text-uppercase text-truncate py-2">${val.title}</h6>
                        </div>
                        <div class="col-sm-4">
                            <a col_delete_id=${val.IDcolumn} id="col_del_${val.IDcolumn}">
                                <img src="https://i.ibb.co/2SLrtRP/delete.png" class="rounded-circle float-right"
                                    width="25" height="25">
                            </a>
                            <a col_edit_id=${val.IDcolumn} id="col_edit_${val.IDcolumn}">
                                <img src="https://i.ibb.co/5MKxrvT/edit.png" class="float-right mr-2"
                                    width="25" height="25">
                            </a>
                            <a row_add_id=${val.IDcolumn} id="row_add_${val.IDcolumn}">
                                <img src="https://i.ibb.co/2srq9nT/plus.png" class="float-right mr-2"
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
            handleAddRow(val.IDcolumn);

        }

        function addRow(idcol, cardlist) {
            $.each(cardlist, function (index, val) {
                let str = `<div class="card draggable shadow-sm mb-3" id="cd_${val.IDcard}" style="background-color: #f6f7d4;">
                <div class="card-body p-2" id="row_status_${val.IDcard}" style="background-color: #${val.status == 1 ? "28df99" : ""}">
                    <div class="card-title">
                        <a id="row_title_${val.IDcard}" class="lead">${val.title}</a>
                        <a id="row_del_${val.IDcard}">
                            <img src="https://i.ibb.co/jzf1cFG/clear.png"
                                class="rounded-circle float-right" width="25" height="25"></a>
                    </div>
                    <p>
                        <span class="badge badge-warning">${val.create_date}</span>
                    </p>
                    <span id="card_priority_${val.IDcard}" class="badge badge-danger float-right">${val.priority == 1 ? "PRIORITY" : ""}</span>
                </div>
                <div id="user_${val.IDcard}" class="card-body p-3">
                    
                </div>
            </div>`;
                $("#" + idcol).append(str);
                addUser(val.IDcard, val.userList);
                handleDeleteRow(val.IDcard);
                handleEditRow(val.IDcard);
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
                            // if (data.length > 0) {
                            //     //RELOAD();
                            // }
                        });
                },
            });
        }
        function addUser(idcard, userlist) {
            $.each(userlist, function (index, val) {
                let str = `<img src="public/img/${val.image}"
            class="rounded-circle" width="30" height="30" id="user_img_${val.IDuser}_${idcard}">`;
                $("#user_" + idcard).append(str);
            });
        }
        function handleAddcolumn() {
            $(btnAddfield).click(function () {
                const value = $(addfield).val();
                const check = checkXSS(value);
                if (check != -1) {
                    showAlert("Don't do that again");
                    return;
                }
                if (value.trim() === "") {
                    showAlert("Title is empty");
                    return;
                }
                $.post(options.url + "addColumn", { column: value })
                    .done(function (data) {
                        addOneBoard(data, value);
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
                            removeColumnfrBoard(IDcolumn);
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
                    if (titleChanged.trim() === "") {
                        showAlert("Title is empty");
                        return;
                    }
                    const check = checkXSS(titleChanged);
                    if (check != -1) {
                        showAlert("Don't do that again");
                        return;
                    }
                    $.post(options.url + "editColumn", { column: IDcolumn, title: titleChanged })
                        .done(function (data) {
                            $(board_title + IDcolumn).text(titleChanged);
                        });
                })
            });
        }
        function handleAddRow(IDcolumn) {
            $(row_add + IDcolumn).on('click', function () {
                IDCOL_ADDCARD = IDcolumn;
                $(getAddCard).modal();
            });
        }
        function handleEditRow(IDcard) {
            $(row_title + IDcard).on('click', function () {
                $.ajax({
                    url: options.url + "card/getDetail",
                    type: "POST",
                    dataType: "json",
                    data: { card: IDcard },
                    cache: false
                }).done(function (data) {
                    DETAILCARD = data;
                    showDetailRow();
                });
                $(getEditCard).modal();
            });
        }
        //========================HANDLE SHOW DETAIL ROW
        function showDetailRow() {
            if (DETAILCARD.priority === 1) {
                $(detailcard_priority).addClass("btn-danger");
            }
            else {
                $(detailcard_priority).removeClass("btn-danger");
            }
            if (DETAILCARD.status === 1) {
                $(detailcard_done).addClass("btn-success");
            }
            else {
                $(detailcard_done).removeClass("btn-success");
            }
            $(detailcard_title).text(DETAILCARD.title);
            $(detailcard_description).text(DETAILCARD.description);
            $(detailcard_startdate).val(convertDate(DETAILCARD.startdate));
            $(detailcard_duedate).val(convertDate(DETAILCARD.duedate));
            listUserDetailRow();
            listuserNotInDetailRow();
        }
        //SHOW LIST USER ROW AND HANDLE DELETE
        function listUserDetailRow() {
            $(detailcard_listuser).empty();
            $.each(DETAILCARD.userList, function (index, val) {
                let str = `<img id="user_in_${val.IDuser}"
            src="public/img/${val.image}"
            class="rounded-circle" width="30" height="30">`;
                $(detailcard_listuser).append(str);
                $(user_in + val.IDuser).on('click', function () {
                    $.ajax({
                        url: options.url + "card/delUser",
                        type: "POST",
                        dataType: "html",
                        data: { cardID: DETAILCARD.IDcard, userID: val.IDuser },
                        cache: false
                    }).done(function (data) {
                        $(user_in + val.IDuser).remove();
                        listuserNotInDetailRow();
                        $(user_img + val.IDuser + "_" + DETAILCARD.IDcard).remove();
                    });
                })
            });

        }
        function listuserNotInDetailRow() {
            $.ajax({
                url: options.url + "card/getUsernotIn",
                type: "POST",
                dataType: "json",
                data: { card: DETAILCARD.IDcard },
                cache: false
            }).done(function (data) {
                $(detailcard_listUserNotIn).empty();
                $.each(data, function (index, val) {
                    addUserNotIn(val);
                })
            });
        }
        function addUserNotIn(user) {
            let str = `<li id="user_notin_${user.IDuser}" class="list-group-item">
            <div class="row">
              <div class="col-1 d-flex align-items-center">
                <img
                  src="public/img/${user.image}"
                  class="rounded-circle" width="30" height="30">
              </div>
              <div class="col-10">
                <span style="font-size: 9px;font-weight: bold;">${user.username}</span>
              </div>
              <div class="col-1">
                <button type="button" class="btn btn-link" id="user_notin_add_${user.IDuser}" id_user_notin=${user.IDuser}>ADD</button>
              </div>
            </div>
          </li>`;
            let strUserin = `<img
            src="public/img/${user.image}"
            class="rounded-circle" width="30" height="30">`;
            let strUserOnBoard = `<img src="public/img/${user.image}" id="user_img_${user.IDuser}_${DETAILCARD.IDcard}"
            class="rounded-circle" width="30" height="30">`;
            $(detailcard_listUserNotIn).append(str);
            $(user_notin_add + user.IDuser).on("click", function () {
                $.ajax({
                    url: options.url + "card/addUser",
                    type: "POST",
                    dataType: "html",
                    data: { cardID: DETAILCARD.IDcard, userID: user.IDuser },
                    cache: false
                }).done(function (data) {
                    $(user_notin + user.IDuser).remove();
                    $(detailcard_listuser).append(strUserin);
                    $(userlist_cardOnboard + DETAILCARD.IDcard).append(strUserOnBoard);
                });
            })
        }
        function handleDeleteRow(IDcard) {
            $(row_del + IDcard).on("click", function () {
                $.ajax({
                    url: options.url + "card/delete",
                    type: "POST",
                    dataType: "json",
                    data: { card: IDcard },
                    cache: false
                }).done(function (data) {
                    $("#" + data.idcol).empty();
                    addRow(data.idcol, data.card);
                });
            });
        }
        function showAlert(text) {
            $(textAlert).html(`<p>${text}</p>`);
            $(modalAlert).modal();
        }
        function removeColumnfrBoard(IDcolumn) {
            $(col_board + IDcolumn).remove();
        }
        function addOneBoard(data, value) {
            let str = `<div id="board_${data}" class="col-sm-6 col-md-4 col-xl-3 list-columm">
            <div class="card bg-light">
                <div class="card-body" style="background-color: #ebecf0">
                    <div class="row">
                        <div class="col-sm-8 ">
                            <h6 class="card-title text-uppercase text-truncate py-2">${value}</h6>
                        </div>
                        <div class="col-sm-4">
                            <a col_delete_id=${data} id="col_del_${data}">
                                <img src="https://i.ibb.co/2SLrtRP/delete.png" class="rounded-circle float-right"
                                    width="25" height="25">
                            </a>
                            <a col_edit_id=${data} id="col_edit_${data}">
                                <img src="https://i.ibb.co/5MKxrvT/edit.png" class="float-right mr-2"
                                    width="25" height="25">
                            </a>
                            <a row_add_id=${data} id="row_add_${data}">
                                <img src="https://i.ibb.co/2srq9nT/plus.png" class="float-right mr-2"
                                    width="25" height="25">
                            </a>
                        </div>
                    </div>
                    <div id="${data}" class="items border border-light list-card">
                        
                    </div>

                </div>
            </div>
        </div>`;

            $(board).append(str);
            $(addfield).val("");
            handleDragdropCard(data);
            handledeleteColumn(data);
            handleeditColumn(data, value);
            handleAddRow(data);

        }
        //===========================MODAL ADDROW
        function handleModalAddRow() {
            let priorityInit = false;
            $(priority_addCard).on('click', function () {
                priorityInit = !priorityInit;
                $(this).toggleClass("btn-danger");
            });
            $(submit_addCard).on('click', function () {
                let card = {
                    title: "",
                    description: "",
                    startdate: "",
                    duedate: "",
                    priority: priorityInit,
                    idcol: IDCOL_ADDCARD
                };
                card.title = $(title_addCard).val();
                card.description = $(description_addCard).val().trim();
                card.startdate = $(addcard_startdate).val();
                card.duedate = $(addcard_duedate).val();
                if (checkXSS(card.title) != -1 || checkXSS(card.description) != -1) {
                    showAlert("Don't do that again");
                    return;
                }
                if (card.title.trim() === "") {
                    showAlert("Your title is empty");
                    return;
                }
                if (card.startdate.trim() === "" || card.duedate.trim() === "") {
                    showAlert("Start date or duedate is empty");
                    return;
                }
                if (card.startdate.trim() > card.duedate.trim()) {
                    showAlert("Start date must before duedate");
                    return;
                }
                $.ajax({
                    url: options.url + "card/add",
                    type: "POST",
                    dataType: "json",
                    data: card,
                    cache: false
                }).done(function (data) {
                    if (data.length > 0) {
                        if (data == -1) {
                            showAlert("Erorr");
                        } else {
                            $("#" + IDCOL_ADDCARD).empty();
                            addRow(IDCOL_ADDCARD, data);
                            $(title_addCard).val("");
                            $(description_addCard).val("");
                            $(addcard_startdate).val("");
                            $(addcard_duedate).val("");
                        }
                    }
                });
            });
        }
        //===================MODAL DETAIL CARD
        function handleModalDetailCard() {
            $(detailcard_startdate).change(function () {
                if ($(this).val() > $(detailcard_duedate).val()) {
                    $(this).val(convertDate(DETAILCARD.startdate));
                } else {
                    $.ajax({
                        url: options.url + "card/setStartdate",
                        type: "POST",
                        dataType: "html",
                        data: { startdate: $(this).val(), id: DETAILCARD.IDcard },
                        cache: false
                    }).done(function (data) {
                    });
                }
            });
            $(detailcard_duedate).change(function () {
                if ($(this).val() < $(detailcard_startdate).val()) {
                    $(this).val(convertDate(DETAILCARD.duedate));
                } else {
                    $.ajax({
                        url: options.url + "card/setDuedate",
                        type: "POST",
                        dataType: "html",
                        data: { duedate: $(this).val(), id: DETAILCARD.IDcard },
                        cache: false
                    }).done(function (data) {
                    });
                }
            });
            $('.editable').each(function () {
                let label = $(this);
                label.after("<input type='text' style ='display:none' /> ");
                let edittext = $(this).next();
                edittext[0].name = this.id.replace('lbl', 'txt');
                edittext.val(label.html());
                label.click(function () {
                    $(this).hide();
                    $(this).next().show();
                })
                edittext.focusout(function () {
                    $(this).hide();
                    if ($(this).val() == "" || $(this).val() === label.text()) {
                        $(this).val(label.text());
                    } else {
                        let checkField = $(this).prev().attr('id');
                        if (checkField === "detailcard_title") {
                            $.ajax({
                                url: options.url + "card/setTitle",
                                type: "POST",
                                dataType: "html",
                                data: { title: $(this).val(), id: DETAILCARD.IDcard },
                                cache: false
                            }).done(function (data) {
                            });
                            $(row_title + DETAILCARD.IDcard).text($(this).val());
                        } else {
                            $.ajax({
                                url: options.url + "card/setDescription",
                                type: "POST",
                                dataType: "html",
                                data: { description: $(this).val(), id: DETAILCARD.IDcard },
                                cache: false
                            }).done(function (data) {
                            });
                        }
                    }
                    $(this).prev().html($(this).val());
                    $(this).prev().show();
                })
            });
            $(detailcard_priority).on("click", function () {
                $(this).toggleClass("btn-danger");
                DETAILCARD.priority = DETAILCARD.priority === 1 ? 0 : 1;
                $.ajax({
                    url: options.url + "card/setPriority",
                    type: "POST",
                    dataType: "html",
                    data: { priority: DETAILCARD.priority, id: DETAILCARD.IDcard },
                    cache: false
                }).done(function (data) {

                });
                $(card_priority + DETAILCARD.IDcard).text(DETAILCARD.priority === 1 ? "PRIORITY" : "");
            });
            $(detailcard_done).on("click", function () {
                $(this).toggleClass("btn-success");
                DETAILCARD.status = DETAILCARD.status === 1 ? 0 : 1;
                $.ajax({
                    url: options.url + "card/setStatus",
                    type: "POST",
                    dataType: "html",
                    data: { priority: DETAILCARD.status, id: DETAILCARD.IDcard },
                    cache: false
                }).done(function (data) {
                    $(row_status + DETAILCARD.IDcard).css('background-color', DETAILCARD.status === 1 ? "#28df99" : "");
                });

            });
        }
        function checkXSS(val) {
            return val.search("<[^>]*script")
        }
        function convertDate(date) {
            return date.replace(" ", "T");
        }
    };

}(jQuery));

$(document).ready(function () {
    var objBoard = {};
    $("#master").boardMn(objBoard);
});
