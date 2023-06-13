<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

<div class="content" >
	<h3>Post List</h3>
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
				<th>ID</th>
				<th>Title</th>
				<th>Content</th>
				<th>Category</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$listCount = 1;
				foreach( $allPost as $key => $value):?>
				<tr>
					<td><?php echo $listCount++; ?></td>
					<td><?php echo $value['title'] ?></td>
					<td>
                        <?php 
                            $text = $value['content'];
                            if($text > 100){
                                echo substr($text, 0, 100);
                            }
                        ?>
                    </td>
					<td>
						<?php foreach($allCategory as $catKey => $catValue){
							if($catValue['id'] == $value['cat']){
								echo $catValue['name'];
							}
						}?>
					</td>
					<td>
						<a href="<?php echo BASE_URL ?>/Admin/postEdit/<?php echo $value['id'] ?>">Edit</a> || <a onclick="return confirm('Are you sure to delete!')" href="<?php echo BASE_URL ?>/Admin/postDelete/<?php echo $value['id'] ?>">Delete</a> 
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