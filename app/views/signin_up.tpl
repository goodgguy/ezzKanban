<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!--BOOTSTRAP-->
    <!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<!--JQUERY-->
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

<!--VALIDATION-->
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<!--MAIN IMPORT-->
<!--MUST FIX PATH WHEN CHANGE ORDER FOLDER-->
<link rel="stylesheet" href="public/css/signup_in.css">
<script src="public/js/signup_in.js"></script>



</head>
<body>
    <div class="container">
        <div class="row">
			<div class="col-md-5 mx-auto">
			<div id="first">
				<div class="myform form ">
					 <div class="logo mb-3">
						 <div class="col-md-12 text-center">
							<h1>Sign In</h1>
						 </div>
					</div>
                   <form action="login" method="post" name="login">
                           <div class="form-group">
                              <label for="exampleInputEmail1">Email address</label>
                              <input type="email" name="email"  class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Password</label>
                              <input type="password" name="password" id="password"  class="form-control" aria-describedby="emailHelp" placeholder="Enter Password">
                           </div>
                           <div class="form-group">
                              <p class="text-right"><a href="#">Forgot Password</a></p>
                           </div>
                           <input type="hidden" id="status" name="status" value="login">
                           <div class="col-md-12 text-center ">
                              <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Submit</button>
                           </div>
                           <div class="form-group mt-4">
                              <p class="text-center"><a href="#" id="signup">Don't have a login? Sign up</a></p>
                           </div>
                        </form>
                 
				</div>
            </div>
            <div id="second">
                <div class="myform form ">
                      <div class="logo mb-3">
                         <div class="col-md-12 text-center">
                            <h1 >Signup</h1>
                         </div>
                      </div>
                      <form action="login" name="registration" method="post">
                         <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email"  name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter Email">
                         </div>
                         <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <input type="password"  name="password" class="form-control" id="password" aria-describedby="emailHelp" placeholder="Enter Password">
                         </div>
                         <div class="form-group">
                            <label for="exampleInputEmail1">Confirm password</label>
                            <input type="password" name="confirm_password"  class="form-control" id="confirm_password" aria-describedby="emailHelp" placeholder="Enter Confirm Password">
                         </div>
                          <input type="hidden" id="status" name="status" value="register">
                         <div class="col-md-12 text-center mb-3">
                            <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Submit</button>
                         </div>
                         <div class="col-md-12 ">
                            <div class="form-group">
                               <p class="text-center"><a href="#" id="signin">Already have an account? Sign in here</a></p>
                            </div>
                         </div>
                          </div>
                      </form>
                   </div>
			</div>
		</div>
      </div>   
</body>
</html>