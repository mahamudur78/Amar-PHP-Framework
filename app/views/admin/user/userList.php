<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

<div class="content" >
	<h3>User List</h3>
	<?php 
		if(!empty($_GET['msg'])){
			$msg = unserialize(urldecode($_GET['msg']));
			foreach($msg as $key => $value){
				echo "<span style='color:blue; font-weight:bold; display: block; margin-bottom: 10px'>". $value."</span>";
			}
			
		}
	?>
	<table id="myTable" class="display" data-page-length='5'>
		<thead>
			<tr>
				<th>Serial No</th>
				<th>Username</th>
				<th>Level</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$listCount = 1;
				foreach( $userList as $key => $value):?>
				<tr>
					<td><?php echo $listCount++; ?></td>
					<td><?php echo $value['username'] ?></td>
					<td><?php echo $userLevel[$value['level']] ?></td>
					<td>
						<a href="<?php echo BASE_URL ?>/User/userEdit/<?php echo $value['id'] ?>">Edit</a> || <a onclick="return confirm('Are you sure to delete!')" href="<?php echo BASE_URL ?>/User/userDelete/<?php echo $value['id'] ?>">Delete</a> 
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>

<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>