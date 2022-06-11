<!DOCTYPE html>
<html>
<head>
  <title>Random Words Generator | Edit</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <style>
    .container {
      max-width: 500px;
    }
    .error {
      display: block;
      padding-top: 5px;
      font-size: 14px;
      color: red;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <form method="post" id="update-word" name="update-word" 
    action="<?= site_url('/update') ?>">
      <input type="hidden" name="id" id="id" value="<?php echo $randomWord['id']; ?>">
      <div class="form-group">
        <label>Name</label>
        <input type="text" name="word" class="form-control" value="<?php echo $randomWord['word']; ?>">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-danger btn-block">Save Data</button>
      </div>
    </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
  <script>
    if ($("#update-word").length > 0) {
      $("#update-word").validate({
        rules: {
          word: {
            required: true,
          },
        },
        messages: {
          word: {
            required: "Invalid value",
          },
        },
      })
    }
  </script>
</body>
</html>