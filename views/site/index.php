<?php
/* @var $this yii\web\View */
$this->title = 'My Yii Application';
?>
<div class="container">                        
    <div id="signupbox" style="margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
   		<div class="panel panel-primary">
        	<div class="panel-heading">
            	<div class="panel-title">Join in and become political savy!</div>
            </div>  
           	<div class="panel-body" >
              	<form id="signupform" class="form-horizontal" role="form">           
                  	<div id="signupalert" style="display:none" class="alert alert-danger">
                      	<p>Error:</p>
                        <span></span>
                   	</div>
                    <div class="form-group">
                      	<label for="email" class="col-md-4 control-label">Email</label>
                       	<div class="col-md-8">
                          	<input type="text" class="form-control" name="email" placeholder="Email Address">
                        </div>
                    </div>       
                    <div class="form-group">
              			<label for="firstname" class="col-md-4 control-label">First Name</label>
                       	<div class="col-md-8">
                          	<input type="text" class="form-control" name="firstname" placeholder="First Name">
                        </div>
                    </div>
                    <div class="form-group">
                    	<label for="lastname" class="col-md-4 control-label">Last Name</label>
                        <div class="col-md-8">
                         	<input type="text" class="form-control" name="lastname" placeholder="Last Name">
                         </div>
                    </div>
                    <div class="form-group">
                    	<label for="password" class="col-md-4 control-label">Password</label>
                        <div class="col-md-8">
                          	<input type="password" class="form-control" name="passwd" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                     	<label for="password" class="col-md-4 control-label">Repeat Password</label>
                        <div class="col-md-8">
                        	<input type="password" class="form-control" name="repeatpasswd" placeholder="Repeat Password">
                        </div>
                    </div>
                    <div class="form-group">
                     	<!-- Button -->                                        
                        <div class="col-md-offset-4 col-md-8">
                        	<button id="btn-signup" type="button" class="btn btn-primary"><i class="icon-hand-right"></i> &nbsp Sign Up</button>
                        </div>
                    </div>
               	</form>
      		</div>
		</div>
	</div> 
</div>
