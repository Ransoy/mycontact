
 <div class="section--login">
		<div class="container">
		 	<div class="log-form">
		 		 <h1>Sign-in</h1>
		 		 <p><?php echo $this->Html->link('register',array('action' => 'register')); ?></p>
			     <form class="form-signin">
			       <div class="row">
			       		<div class="col-md-10">
				       		<input type="text" id="inputEmail" class="form-control" placeholder="Email" required>
				       	</div>
				       		<div class="col-md-10">
				       		<input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
				       	</div>
				       	<div class="col-md-2">	
				      		<button class="btn btn-sm btn-primary" type="submit">Submit</button>
				       </div>
				   </div>    
			     </form>
			</div>     
		</div> <!-- /container -->
 </div>	
