<?php  

include "../bootstrap/bootstrap.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php echo $css; ?>
	<title>Category</title>
</head>
<body style="font-family: Karla;">
	
  <h1 class="pt-4 text-center">Category Table</h1>

  <div class="tables mx-4">
  	<table class="table table-bordered mt-4">
      <thead>
        <tr class="text-center">
          <th scope="col">No</th>
          <th scope="col">Name</th>
          <th scope="col">Action</th>
        </tr>     
      </thead>
      <?php include "../../controllers/category.controller.php"; ?>
      <?php $no = 1; ?>
      <?php while($row = mysqli_fetch_assoc($data)): ?>
        <tbody>
          <tr class="text-center">
            <th scope="row"><?php echo $no; ?></th>
            <td><?php echo $row['name']; ?></td>
            <td><a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> | <a href="delete.php?id=<?php echo $row['id']; ?>">Hapus</a></td>
          </tr>
        </tbody>
        <?php $no++; ?>
      <?php endwhile; ?>
    </table>
  </div>

  <div class="button d-flex justify-content-center mt-4">
    <a href="add.php" class="btn btn-primary mx-4">Add</a>
  </div>


	<?php echo $script; ?>
</body>
</html>