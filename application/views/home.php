
<?php if($this->session->userdata('id')): ?>
<div class="container">
	<table class="table table-striped">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Card Type</th>
	      <th scope="col">Card Authority</th>
	      <th scope="col">Card Bank</th>
	      <th scope="col">Card Owner</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php $i=1; foreach($card_details as $card): ?>
	    <tr>
	      <th scope="row"><?= $i++; ?></th>
	      <td><?= $card['card_type']; ?></td>
	      <td><?= $card['card_authority']; ?></td>
	      <td><?= $card['card_bank']; ?></td>
	      <td><a target="_blank" href="<?= base_url('user/'.$card['user_details']['id']); ?>"><?= $card['user_details']['name']; ?></a></td>
	    </tr>
		<?php endforeach; ?>
	  </tbody>
	</table>
</div>
<?php else: ?>
	<h1>Login to enter CardVault!!!</h1>
<?php endif; ?>