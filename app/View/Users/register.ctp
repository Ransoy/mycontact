<div class="section-registration">
	<div class="container">
		<div class="form-add-width center-block">
		<h1>Registration</h1>
			    <?php 
			    echo $this->Session->flash();
			    echo $this->Form->create('register');
			    echo $this->Form->input('name',
								array('div' => array(
										'class' => 'form-group'
									),
									 'name' => 'Name',
									 'id' => 'txtName',
									 'class' => 'form-control',
									 'size' => 16,
									 'label' => '',
									 'placeholder' => 'NAME'
								)
							);
			  echo $this->Form->input('email',
										array('div' => array(
												'class' => 'form-group'
										),
												'name' => 'Email_Address',
												'id' => 'txtEmail',
												'class' => 'form-control',
												'size' => 16,
												'label' => '',
												'placeholder' => 'EMAIL ADDRESS'
										)
								);
			    echo $this->Form->input('password',
											array('div' => array(
													'class' => 'form-group'
											),
													'name' => 'Password',
													'id' => 'txtPassword',
													'class' => 'form-control',
													'size' => 16,
													'label' => '',
													'placeholder' => 'PASSWORD'
											)
									);
			    echo $this->Form->input('password',
									array('div' => array(
											'class' => 'form-group'
									),
											'name' => 'ConfirmPassword',
											'id' => 'txtConfirmpass',
											'class' => 'form-control',
											'size' => 16,
											'label' => '',
											'placeholder' => 'CONFIRM PASSWORD'
									)
							);
			    echo $this->Form->button('Submit', array('type' => 'submit','class' => 'btn btn-primary'));
			    echo $this->Form->end();
			    ?>     
	    </div>	    
	</div>
</div>	