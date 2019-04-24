<div class="container">
	<div class="row">
		<div class="offset-md-7 col-md-5">
			<?php if(sizeof($user_details)==0): ?>
				<h1>User does not exist!!!<h1>
			<?php else: ?>
				<table class="table table-striped">
				  <tbody>
					<tr>
				      <th scope="row">User ID</th>
				      <td><?= $user_details['id']; ?></td>
				  	</tr>
				  	<tr>
				      <th scope="row">User Email</th>
				      <td><?= $user_details['user_email']; ?></td>
				  	</tr>
				  	<tr>
				      <th scope="row">Name</th>
				      <td><?= $user_details['name']; ?></td>
				  	</tr>
				  </tbody>
				</table>
			<?php endif; ?>
		</div>
	</div>
	<table class="table table-striped">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Card Type</th>
	      <th scope="col">Card Authority</th>
	      <th scope="col">Card Bank</th>
	      <th scope="col">Actions</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php $i=1; foreach($user_card_details as $card): ?>
	    <tr>
	      <th scope="row"><?= $i++; ?></th>
	      <td><?= $card['card_type']; ?></td>
	      <td><?= $card['card_authority']; ?></td>
	      <td><?= $card['card_bank']; ?></td>
	      <?php if($card['user_id']!=$this->session->userdata("id")): $submitted=false; ?>
	      	<?php foreach($user_request_details as $user_request): ?>
	      		<?php if($user_request['card_id']==$card['id']): ?>
					<?php if($user_request['request_status']=='submitted'): $submitted=true; ?>
						<td><button type="button" class="btn btn-primary btn-sm" disabled>Submitted</button></td>
					<?php endif; ?>
	      		<?php endif; ?>
	      	<?php endforeach; ?>
	      	<?php if(!$submitted): ?>
	      		<td><a href="<?= base_url('request/add/'.$card['id']); ?>"><button type="button" class="btn btn-primary btn-sm">Request</button></a></td>
	      	<?php endif; ?>
	      <?php else: ?>
	      	<td></td>
	      <?php endif; ?>
	    </tr>
		<?php endforeach; ?>
	  </tbody>
	</table>
</div>