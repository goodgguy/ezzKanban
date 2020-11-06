<?php
/* Smarty version 3.1.34-dev-7, created on 2020-11-06 10:37:24
  from 'C:\Apache24\htdocs\ezzKanban\app\views\homepage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fa4c4f4eacce3_74843508',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e6a0ae0917ab8071f497764397f70ca9d2248405' => 
    array (
      0 => 'C:\\Apache24\\htdocs\\ezzKanban\\app\\views\\homepage.tpl',
      1 => 1604633819,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fa4c4f4eacce3_74843508 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="no-cache">
<meta http-equiv="Expires" content="-1">
<meta http-equiv="Cache-Control" content="no-cache">
    <title>EzKanban</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/kanban.css">
</head>

<body class="bg-dark" data-new-gr-c-s-check-loaded="14.981.0">
    <div class="container-fluid pt-3">
        <!--NAV-->
        <nav class="navbar navbar-expand-lg navbar-light bg-warning">
            <a class="navbar-brand" href="#">EzKanban</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto topnav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Hi, <?php echo $_SESSION['username'];?>

                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="logout">Log out</a>
                        </div>
                    </li>
                    <li class="nav-item active">
                        <img src="public/img/<?php echo $_SESSION['image'];?>
"
                            alt="Girl nude" width="50" height="50">
                    </li>
                </ul>
            </div>
        </nav>
        <!--NAV-->
        <div class="form-inline mt-3">
            <div class="form-group mx-sm-3">
                <input type="text" class="form-control" id="addcolumn" placeholder="">
            </div>
            <button id="btnAddcolumn"  class="btn mb-2" style="background-color: #f6d6ad">ADD COLUMM</button>
        </div>


        <h3 class="font-weight-light text-white"></h3>
        <div class="small  text-light"></div>
        <div id="master" class="row flex-row flex-sm-nowrap py-4" style="overflow: auto;height: 90vh;">


            <!--EX COLUMM-->
            <div class="col-sm-6 col-md-4 col-xl-3 list-columm">
                <div class="card bg-light">
                    <div class="card-body" style="background-color: #ebecf0">
                        <div class="row">
                            <div class="col-sm-8 ">
                                <h6 class="card-title text-uppercase text-truncate py-2">To Do</h6>
                            </div>
                            <div class="col-sm-4 ">
                                <a href="#">
                                    <img src="https://i.ibb.co/2SLrtRP/delete.png" class="rounded-circle float-right"
                                        width="25" height="25"></a>
                            </div>
                        </div>
                        <div id="1" class="items border border-light list-card">
                            <!--EX CARD-->
                            <div class="card draggable shadow-sm mb-3" id="cd1" style="background-color: #f6f7d4;">
                                <div class="card-body p-2" style="background-color: #28df99">
                                    <div class="card-title">
                                        <a href="" class="lead">Fix Login</a>
                                        <a href="#">
                                            <img src="https://i.ibb.co/jzf1cFG/clear.png"
                                                class="rounded-circle float-right" width="25" height="25"></a>
                                    </div>
                                    <p>
                                        <span class="badge badge-warning">03/11/2020</span>
                                    </p>
                                    <span class="badge badge-danger float-right">PRIORITY</span>
                                </div>
                                <div class="card-body p-3">
                                    <img src="https://scontent.fsgn2-5.fna.fbcdn.net/v/t1.0-9/96804601_2293610367599267_6939648882309595136_n.jpg?_nc_cat=1&ccb=2&_nc_sid=09cbfe&_nc_ohc=rv0PsebSdgMAX-vxxbt&_nc_ht=scontent.fsgn2-5.fna&oh=3450517011470d18f9013aa3f8871164&oe=5FC6636D"
                                        class="rounded-circle" width="30" height="30">
                                </div>
                            </div>
                            <!--EX-->
                        </div>

                    </div>
                </div>
            </div>
            <!--EX COLUMM-->




            <!--EX COLUMM-->
            <div class="col-sm-6 col-md-4 col-xl-3 list-columm">
                <div class="card bg-light">
                    <div class="card-body" style="background-color: #ebecf0">
                        <div class="row">
                            <div class="col-sm-8 ">
                                <h6 class="card-title text-uppercase text-truncate py-2">implement</h6>
                            </div>
                            <div class="col-sm-4 ">
                                <a href="#">
                                    <img src="https://i.ibb.co/2SLrtRP/delete.png" class="rounded-circle float-right"
                                        width="25" height="25"></a>
                            </div>
                        </div>

                        <div id="2" class="items border border-light list-card">
                            <!--EX CARD-->
                            <div class="card draggable shadow-sm mb-3" id="cd1" style="background-color: #f6f7d4;">
                                <div class="card-body p-2">
                                    <div class="card-title">
                                        <a href="" class="lead">Spec Login</a>
                                        <a href="#">
                                            <img src="https://i.ibb.co/jzf1cFG/clear.png"
                                                class="rounded-circle float-right" width="25" height="25"></a>
                                    </div>
                                    <p>
                                        <span class="badge badge-warning">03/11/2020</span>
                                    </p>
                                    <span class="badge badge-danger float-right">PRIORITY</span>
                                </div>
                                <div class="card-body p-3">
                                    <img src="https://scontent.fsgn2-5.fna.fbcdn.net/v/t1.0-9/96804601_2293610367599267_6939648882309595136_n.jpg?_nc_cat=1&ccb=2&_nc_sid=09cbfe&_nc_ohc=rv0PsebSdgMAX-vxxbt&_nc_ht=scontent.fsgn2-5.fna&oh=3450517011470d18f9013aa3f8871164&oe=5FC6636D"
                                        class="rounded-circle" width="30" height="30">
                                    <img src="https://scontent.fsgn2-6.fna.fbcdn.net/v/t1.0-9/122187360_2156049037872253_7058690284541665846_o.jpg?_nc_cat=110&ccb=2&_nc_sid=09cbfe&_nc_ohc=on382a_PXY4AX82Unzn&_nc_ht=scontent.fsgn2-6.fna&oh=39f23c3fbd52882622dba7fd657df53a&oe=5FC4A44A"
                                        class="rounded-circle" width="30" height="30">

                                </div>
                            </div>
                            <!--EX-->
                            <!--EX CARD-->
                            <div class="card draggable shadow-sm mb-3" id="cd1" style="background-color: #f6f7d4;">
                                <div class="card-body p-2" style="background-color: #28df99">
                                    <div class="card-title">
                                        <a href="" class="lead">Config php</a>
                                        <a href="#">
                                            <img src="https://i.ibb.co/jzf1cFG/clear.png"
                                                class="rounded-circle float-right" width="25" height="25"></a>
                                    </div>
                                    <p>
                                        <span class="badge badge-warning">03/11/2020</span>
                                    </p>
                                </div>
                                <div class="card-body p-3">
                                    <img src="https://scontent.fsgn2-5.fna.fbcdn.net/v/t1.0-9/120260070_2293096404170294_5987195704158400079_o.jpg?_nc_cat=106&ccb=2&_nc_sid=09cbfe&_nc_ohc=L4fIsOqPAlQAX93t0CE&_nc_ht=scontent.fsgn2-5.fna&oh=8ebba16c5477c4ac6a03978e026850cc&oe=5FC689B4"
                                        class="rounded-circle" width="30" height="30">
                                    <img src="https://scontent.fsgn2-5.fna.fbcdn.net/v/t31.0-8/17218607_1863225170628502_2626254722448102380_o.jpg?_nc_cat=1&ccb=2&_nc_sid=09cbfe&_nc_ohc=BD1NsjGpkPsAX8IoKgK&_nc_ht=scontent.fsgn2-5.fna&oh=4316636b0e8c228dee5ad9e9514b2395&oe=5FC6758C"
                                        class="rounded-circle" width="30" height="30">
                                    <img src="https://scontent.fsgn2-6.fna.fbcdn.net/v/t1.0-9/122187360_2156049037872253_7058690284541665846_o.jpg?_nc_cat=110&ccb=2&_nc_sid=09cbfe&_nc_ohc=on382a_PXY4AX82Unzn&_nc_ht=scontent.fsgn2-6.fna&oh=39f23c3fbd52882622dba7fd657df53a&oe=5FC4A44A"
                                        class="rounded-circle" width="30" height="30">

                                </div>
                            </div>
                            <!--EX-->
                        </div>

                    </div>
                </div>
            </div>
            <!--EX COLUMM-->
            <!--EX COLUMM-->
            <div class="col-sm-6 col-md-4 col-xl-3 list-columm">
                <div class="card bg-light">
                    <div class="card-body" style="background-color: #ebecf0">
                        <div class="row">
                            <div class="col-sm-8 ">
                                <h6 class="card-title text-uppercase text-truncate py-2">tomorrow</h6>
                            </div>
                            <div class="col-sm-4 ">
                                <a href="#">
                                    <img src="https://i.ibb.co/2SLrtRP/delete.png" class="rounded-circle float-right"
                                        width="25" height="25"></a>
                            </div>
                        </div>
                        <div id="3" class="items border border-light list-card">
                            <!--EX CARD-->
                            <div class="card draggable shadow-sm mb-3" id="cd1" style="background-color: #f6f7d4;">
                                <div class="card-body p-2">
                                    <div class="card-title">
                                        <a href="" class="lead">Fix Login</a>
                                        <a href="#">
                                            <img src="https://i.ibb.co/jzf1cFG/clear.png"
                                                class="rounded-circle float-right" width="25" height="25"></a>
                                    </div>
                                    <p>
                                        <span class="badge badge-warning">03/11/2020</span>
                                    </p>
                                    <span class="badge badge-danger float-right">PRIORITY</span>
                                </div>
                                <div class="card-body p-3">
                                    <img src="https://scontent.fsgn2-6.fna.fbcdn.net/v/t1.0-9/122187360_2156049037872253_7058690284541665846_o.jpg?_nc_cat=110&ccb=2&_nc_sid=09cbfe&_nc_ohc=on382a_PXY4AX82Unzn&_nc_ht=scontent.fsgn2-6.fna&oh=39f23c3fbd52882622dba7fd657df53a&oe=5FC4A44A"
                                        class="rounded-circle" width="30" height="30">

                                </div>
                            </div>
                            <!--EX-->
                        </div>

                    </div>
                </div>
            </div>
            <!--EX COLUMM-->
            <!--EX COLUMM-->
            <div class="col-sm-6 col-md-4 col-xl-3 list-columm">
                <div class="card bg-light">
                    <div class="card-body" style="background-color: #ebecf0">
                        <div class="row">
                            <div class="col-sm-8 ">
                                <h6 class="card-title text-uppercase text-truncate py-2">Done</h6>
                            </div>
                            <div class="col-sm-4 ">
                                <a href="#">
                                    <img src="https://i.ibb.co/2SLrtRP/delete.png" class="rounded-circle float-right"
                                        width="25" height="25"></a>
                            </div>
                        </div>
                        <div id="4" class="items border border-light list-card">
                            <!--EX CARD-->
                            <div class="card draggable shadow-sm mb-3" id="cd1" style="background-color: #f6f7d4;">
                                <div class="card-body p-2" style="background-color: #28df99">
                                    <div class="card-title">
                                        <a href="" class="lead">Design Database</a>
                                        <a href="#">
                                            <img src="https://i.ibb.co/jzf1cFG/clear.png"
                                                class="rounded-circle float-right" width="25" height="25"></a>
                                    </div>
                                    <p>
                                        <span class="badge badge-warning">03/11/2020</span>
                                    </p>
                                    <span class="badge badge-danger float-right">PRIORITY</span>
                                </div>
                                <div class="card-body p-3">
                                    <img src="https://scontent.fsgn2-1.fna.fbcdn.net/v/t1.0-9/118179978_1743483279135108_1359644982559336990_n.jpg?_nc_cat=105&ccb=2&_nc_sid=09cbfe&_nc_ohc=EWylkWfEkQAAX8k0b9Y&_nc_ht=scontent.fsgn2-1.fna&oh=2bf2aa4f628552cfe66f7f6c03a0b7be&oe=5FC3FA6F"
                                        class="rounded-circle" width="30" height="30">
                                    <img src="https://scontent.fsgn2-1.fna.fbcdn.net/v/t1.0-9/86242645_2689070104539612_3453552974733770752_n.jpg?_nc_cat=107&ccb=2&_nc_sid=09cbfe&_nc_ohc=RJCcpGich5AAX9hgBFK&_nc_ht=scontent.fsgn2-1.fna&oh=a0c9711bc8aa36267a7039967c3295b5&oe=5FC57CCE"
                                        class="rounded-circle" width="30" height="30">
                                    <img src="https://scontent.fsgn2-6.fna.fbcdn.net/v/t1.0-9/122187360_2156049037872253_7058690284541665846_o.jpg?_nc_cat=110&ccb=2&_nc_sid=09cbfe&_nc_ohc=on382a_PXY4AX82Unzn&_nc_ht=scontent.fsgn2-6.fna&oh=39f23c3fbd52882622dba7fd657df53a&oe=5FC4A44A"
                                        class="rounded-circle" width="30" height="30">
                                    <img src="https://scontent.fsgn2-5.fna.fbcdn.net/v/t1.0-9/122788866_3628769307207290_5842492535806621420_o.jpg?_nc_cat=1&ccb=2&_nc_sid=09cbfe&_nc_ohc=rHgx492-yLYAX9LUCCt&_nc_ht=scontent.fsgn2-5.fna&oh=42a531cbb39c1ab63f8c18d8cef4c893&oe=5FC74A69"
                                        class="rounded-circle" width="30" height="30">

                                </div>
                            </div>
                            <!--EX-->
                            <!--EX CARD-->
                            <div class="card draggable shadow-sm mb-3" id="cd1" style="background-color: #f6f7d4;">
                                <div class="card-body p-2" style="background-color: #28df99">
                                    <div class="card-title">
                                        <a href="" class="lead">Research TDD</a>
                                        <a href="#">
                                            <img src="https://i.ibb.co/jzf1cFG/clear.png"
                                                class="rounded-circle float-right" width="25" height="25"></a>
                                    </div>
                                    <p>
                                        <span class="badge badge-warning">03/11/2020</span>
                                    </p>
                                    <span class="badge badge-danger float-right">PRIORITY</span>
                                </div>
                                <div class="card-body p-3">
                                    <img src="https://scontent.fsgn2-6.fna.fbcdn.net/v/t1.0-9/122187360_2156049037872253_7058690284541665846_o.jpg?_nc_cat=110&ccb=2&_nc_sid=09cbfe&_nc_ohc=on382a_PXY4AX82Unzn&_nc_ht=scontent.fsgn2-6.fna&oh=39f23c3fbd52882622dba7fd657df53a&oe=5FC4A44A"
                                        class="rounded-circle" width="30" height="30">

                                </div>
                            </div>
                            <!--EX-->
                            <!--EX CARD-->
                            <div class="card draggable shadow-sm mb-3" id="cd1" style="background-color: #f6f7d4;">
                                <div class="card-body p-2" style="background-color: #28df99">
                                    <div class="card-title">
                                        <a href="" class="lead">Research Jest</a>
                                        <a href="#">
                                            <img src="https://i.ibb.co/jzf1cFG/clear.png"
                                                class="rounded-circle float-right" width="25" height="25"></a>
                                    </div>
                                    <p>
                                        <span class="badge badge-warning">03/11/2020</span>
                                    </p>
                                    <span class="badge badge-danger float-right">PRIORITY</span>
                                </div>
                                <div class="card-body p-3">


                                </div>
                            </div>
                            <!--EX-->
                            <!--EX CARD-->
                            <div class="card draggable shadow-sm mb-3" id="cd1" style="background-color: #f6f7d4;">
                                <div class="card-body p-2" style="background-color: #28df99">
                                    <div class="card-title">
                                        <a href="" class="lead">Fix Router</a>
                                        <a href="#">
                                            <img src="https://i.ibb.co/jzf1cFG/clear.png"
                                                class="rounded-circle float-right" width="25" height="25"></a>
                                    </div>
                                    <p>
                                        <span class="badge badge-warning">03/11/2020</span>
                                    </p>
                                </div>
                                <div class="card-body p-3">


                                </div>
                            </div>
                            <!--EX-->
                        </div>

                    </div>
                </div>
            </div>
            <!--EX COLUMM-->
            <!--EX COLUMM-->
            <div class="col-sm-6 col-md-4 col-xl-3 list-columm">
                <div class="card bg-light">
                    <div class="card-body" style="background-color: #ebecf0">
                        <div class="row">
                            <div class="col-sm-8 ">
                                <h6 class="card-title text-uppercase text-truncate py-2">To Do</h6>
                            </div>
                            <div class="col-sm-4 ">
                                <a href="#">
                                    <img src="https://i.ibb.co/2SLrtRP/delete.png" class="rounded-circle float-right"
                                        width="25" height="25"></a>
                            </div>
                        </div>

                        <div id="5" class="items border border-light list-card">
                            <!--EX CARD-->
                            <div class="card draggable shadow-sm mb-3" id="cd1" style="background-color: #f6f7d4;">
                                <div class="card-body p-2" style="background-color: #28df99">
                                    <div class="card-title">
                                        <a href="" class="lead">Fix Login</a>
                                        <a href="#">
                                            <img src="https://i.ibb.co/jzf1cFG/clear.png"
                                                class="rounded-circle float-right" width="25" height="25"></a>
                                    </div>
                                    <p>
                                        <span class="badge badge-warning">03/11/2020</span>
                                    </p>
                                    <span class="badge badge-danger float-right">PRIORITY</span>
                                </div>
                                <div class="card-body p-3">


                                </div>
                            </div>
                            <!--EX-->
                        </div>

                    </div>
                </div>
            </div>
            <!--EX COLUMM-->
        </div>
    </div>
    <!-- Modal -->
  <div class="modal fade" id="getAlert" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Notification</h4>
        </div>
        <div class="modal-body" id="modelAlert">
                  </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>



    <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="public/js/Sortable.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="public/js/kanban.js"><?php echo '</script'; ?>
>
</body>

</html><?php }
}
