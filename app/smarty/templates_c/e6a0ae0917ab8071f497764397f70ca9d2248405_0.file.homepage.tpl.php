<?php
/* Smarty version 3.1.34-dev-7, created on 2020-11-06 14:10:16
  from 'C:\Apache24\htdocs\ezzKanban\app\views\homepage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fa4f6d883cb99_34287835',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e6a0ae0917ab8071f497764397f70ca9d2248405' => 
    array (
      0 => 'C:\\Apache24\\htdocs\\ezzKanban\\app\\views\\homepage.tpl',
      1 => 1604646609,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fa4f6d883cb99_34287835 (Smarty_Internal_Template $_smarty_tpl) {
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
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              Hi, <?php echo $_SESSION['username'];?>

            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="logout">Log out</a>
            </div>
          </li>
          <li class="nav-item active">
            <img src="public/img/<?php echo $_SESSION['image'];?>
" alt="Girl nude" width="50" height="50">
          </li>
        </ul>
      </div>
    </nav>
    <!--NAV-->
    <div class="form-inline mt-3">
      <div class="form-group mx-sm-3">
        <input type="text" class="form-control" id="addcolumn" placeholder="">
      </div>
      <button id="btnAddcolumn" class="btn mb-2" style="background-color: #f6d6ad">ADD COLUMM</button>
    </div>


    <h3 class="font-weight-light text-white"></h3>
    <div class="small  text-light"></div>
    <div id="master" class="row flex-row flex-sm-nowrap py-4" style="overflow: auto;height: 90vh;">
      <!--COLUMN-->
    </div>
  </div>





  <!-- Modal ALERT-->
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

  <!-- Modal CONFIRM DELETE-->
  <div class="modal fade" id="getConfirmDel" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
                  </div>
        <div class="modal-body" id="modelConfirmDel">
                  </div>
        <div class="modal-footer">
          <button type="button" class="btn btn btn-danger" data-dismiss="modal" id="confirmBtn">Delete</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

  <!--Modal EDIT COLUMN-->
  <div class="modal fade" id="getEditColumn" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">EDIT BOARD</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label"><b>TITLE:</b></label>
              <input type="text" class="form-control" id="inputEditCol">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button id="confirmEditCol" type="button" class="btn btn-primary" data-dismiss="modal">Submit</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>



  <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"><?php echo '</script'; ?>
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
