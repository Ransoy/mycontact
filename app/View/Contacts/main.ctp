<div class="section--main">
	<h1>Contact List</h1>
	<p><?php echo $this->Html->link('ADD CONTACTS',array('action'=>'register')); ?></p>
	<input type="hidden" value="<?php echo $this->html->url('/', true);?>">
	<?php 
	echo $this->Form->create(array('type' => 'get','action' => 'main'));
	echo $this->Form->input('text',
			array('div' => array(
					'class' => 'form-group'
					),
					'name' => 'search',
					'id' => 'txtsearch',
					'class' => 'form-control',
					'size' => 16,
					'value' => $searchval,
					'label' => '',
					'placeholder' => 'SEARCH'
			)
	);
	echo $this->Form->end();
	?>
	<table class="table table-hover" id="tbl-date">
		<thead>
			<tr class="active">
			  <th>NAME</td>
			  <th>COMPANY</td>
			  <th>PHONE</td>
			  <th>EMAIL</td>
			  <th></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($data as $row): ?>
				<tr class="<?php echo 'class-item-'.$row['Contact']['id']; ?>"  data-item-id="<?php echo $row['Contact']['id']; ?>">
				   <td class=""><a href=""><?php echo $row['Contact']['NAME']; ?></a></td>
				   <td class=""><?php echo $row['Contact']['COMPANY']; ?></td>
				   <td class=""><?php echo $row['Contact']['PHONE']; ?></td>
				   <td class=""><?php echo $row['Contact']['EMAIL']; ?></td>
				   <td>
				   		<button class="btn btn-sm btn-info btn_edit_item" data-toggle="modal" data-target=".bs-example-modal-sm" type="submit">Edit</button>
				   		<button class="btn btn-sm btn-danger btn_delete" type="submit">Delete</button>
				   </td>
				</tr>
			<?php endforeach;?>
		</tbody>	
	</table>
	<div class="row">
			<div class="paginate">
				<nav>
					<ul class="pagination">
						<?php echo $this->Paginator->prev('« ', array('tag'=>'li'), null, array('class'=>'disabled'));?>
							
						<?php echo $this->Paginator->numbers(
								array(
										'modulus' => 4,
										'tag' => 'li',
										'separator' => '', 
										'currentClass' => 'active',
										'currentTag' => 'span'
									)
								);
						?>
						<?php echo $this->Paginator->next('»', array('tag'=>'li',), null, array('class'=>'disabled'));?>
					</ul>		
				</nav>
			</div>
		</div>
	</div>
</div>
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">MODIFY DATA</h4>
      </div>
      <div class="modal-body">
      	<?php 
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
      	echo $this->Form->input('EMAIL',
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
      	?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       <?php 
	       echo $this->Form->button('Submit', array('type' => 'submit','class' => 'btn btn-primary btn_modify'));
	       echo $this->Form->end();
       ?>
      </div>
    </div><!-- /.modal-content -->
  </div>
</div>
