<!DOCTYPE html>
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
                            Hi, {$smarty.session.username}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="logout">Log out</a>
                        </div>
                    </li>
                    <li class="nav-item active">
                        <img src="public/img/{$smarty.session.image}"
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
            {* <!--EX COLUMM-->
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
            <!--EX COLUMM--> *}
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
          {* <p>Some text in the modal.</p> *}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>



    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="public/js/Sortable.js"></script>
    <script src="public/js/kanban.js"></script>
</body>

</html>