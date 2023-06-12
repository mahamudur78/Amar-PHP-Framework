
<div class="content">
	<h3>Category List</h3>
	<?php 
		if(!empty($_GET['msg'])){
			$msg = unserialize(urldecode($_GET['msg']));
			foreach($msg as $key => $value){
				echo "<span style='color:blue; font-weight:bold'>". $value."</span>";
			}
			
		}
	?>
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Title</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$listCount = 1;
				foreach( $cat as $key => $value):?>
				<tr>
					<td><?php echo $listCount++; ?></td>
					<td><?php echo $value['name'] ?></td>
					<td><?php echo $value['title'] ?></td>
					<td>
						<a href="<?php echo BASE_URL ?>/Admin/categoryEdit/<?php echo $value['id'] ?>">Edit</a> || <a href="<?php echo BASE_URL ?>/Admin/categoryDelete/<?php echo $value['id'] ?>">Delete</a> 
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	</div>