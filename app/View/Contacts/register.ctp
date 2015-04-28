<div class="section-registration">
	<div class="container">
		<div class="form-add-width center-block">
				<h1>Contact Registration</h1>
		 		<?php 
			    echo $this->Session->flash();
			    echo $this->Form->create('register');
			    echo $this->Form->input('name',
								array('div' => array(
										'class' => 'form-group'
									),
									 'name' => 'NAME',
									 'id' => 'txtName',
									 'class' => 'form-control',
									 'size' => 16,
									 'label' => '',
									 'placeholder' => 'NAME'
								)
							);
			  echo $this->Form->input('text',
										array('div' => array(
												'class' => 'form-group'
										),
												'name' => 'COMPANY',
												'id' => 'txtCompany',
												'class' => 'form-control',
												'size' => 16,
												'label' => '',
												'placeholder' => 'COMPANY'
										)
								);
			    echo $this->Form->input('text',
											array('div' => array(
													'class' => 'form-group'
											),
													'name' => 'PHONE',
													'id' => 'txtPhone',
													'class' => 'form-control',
													'size' => 16,
													'label' => '',
													'placeholder' => 'PHONE'
											)
									);
			    echo $this->Form->input('email',
									array('div' => array(
											'class' => 'form-group'
									),
											'name' => 'EMAIL',
											'id' => 'txtEmail',
											'class' => 'form-control',
											'size' => 16,
											'label' => '',
											'placeholder' => 'EMAIL'
									)
							);
			    echo $this->Form->button('Submit', array('type' => 'submit','class' => 'btn btn-primary'));
			    echo $this->Form->end();
			    ?>
	    </div>	    
	</div>
</div>	