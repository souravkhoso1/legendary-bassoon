<div class="container">
    <div class="row">
    	<div class="col-md-4 offset-md-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Login To CardVault</h3>
			 	</div>
			  	<div class="panel-body">
			  		<?= form_open(base_url("authorize/login")); ?>
                    <fieldset>
			    	  	<div class="form-group">
			    	  		<?= form_input("email", "", array(
			    	  			"class" => "form-control", 
			    	  			"placeholder" => "yourmail@example.com")); ?>
			    		</div>
			    		<div class="form-group">
			    			<?= form_password("password", "", array(
			    	  			"class" => "form-control", 
			    	  			"placeholder" => "Password")); ?>
			    		</div>
			    		<div class="checkbox">
			    	    	<label>
			    	    		<?= form_checkbox("remember", "Remember Me", TRUE); ?> Remember Me
			    	    	</label>
			    	    </div>
			    	    <?= form_submit("submit", "Login", array("class"=>"btn btn-lg btn-success btn-block")); ?>
			    	</fieldset>
			      	<?= form_close(); ?>
                      <!-- <hr/>
                    <center><h4>OR</h4></center>
                    <input class="btn btn-lg btn-facebook btn-block" type="submit" value="Login via facebook"> -->
			    </div>
			</div>
		</div>
	</div>
</div>