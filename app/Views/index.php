<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Random Words Generator | Codeingiter</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <div class="d-flex justify-content-end">
        <a href="<?php echo site_url('/create') ?>" class="btn btn-success mb-2">Generate Words</a>
	</div>
    <?php
     if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
      }
     ?>
  <div class="mt-3">
     <table class="table table-bordered" id="words-list">
       <thead>
          <tr>
             <th>Id</th>
             <th>Word</th>
             <th>Action</th>
          </tr>
       </thead>
       <tbody>
          <?php if($randomWords): ?>
          <?php foreach($randomWords as $randomWord): ?>
          <tr>
             <td><?php echo $randomWord['id']; ?></td>
             <td><?php echo $randomWord['word']; ?></td>
             <td>
              <a href="<?php echo base_url('edit/'.$randomWord['id']);?>" class="btn btn-primary btn-sm">Edit</a>
              <a href="<?php echo base_url('delete/'.$randomWord['id']);?>" class="btn btn-danger btn-sm">Delete</a>
              </td>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>
       </tbody>
     </table>
  </div>
</div>
 
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
      $('#words-list').DataTable();
  } );
</script>
</body>
</html>