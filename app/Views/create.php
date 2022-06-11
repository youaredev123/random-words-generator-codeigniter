<!DOCTYPE html>
<html>
<head>
  <title>Random Words Generator | Create</title>
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
    <form method="post" id="word-create" name="word-create" 
    action="<?= site_url('/store') ?>">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name"/>
        </div>
        <div class="form-group">
            <label for="option">Select the alphabet, numerical, or both</label>
            <select multiple class="form-control" id="option" name="option[]">
                <option value="A">Alphabet</option>
                <option value="N">Numerical</option>
            </select>
        </div>
        <div class="form-group">
            <div class="form-check">
                <label class="form-check-label" for="quantity-small">
                    <input type="radio" class="form-check-input" id="quantity-small" name="quantity" value="10" checked>10
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label" for="quantity-middle">
                    <input type="radio" class="form-check-input" id="quantity-middle" name="quantity" value="100">100
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label" for="quantity-big">
                    <input type="radio" class="form-check-input" id="quantity-big" name="quantity" value="1000">1000
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label" for="quantity-huge">
                    <input type="radio" class="form-check-input" id="quantity-huge" name="quantity" value="10000">10000
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-block btn-danger">Create Words</button>
    </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
  <script>
    if ($("#word-create").length > 0) {
      $("#word-create").validate({
        rules: {
          name: {
            required: true,
          },
          option: {
            required: true,
          },
          quantity: {
            required: true,
          },
        },
        messages: {
          name: {
            required: "Invalid value",
          },
          option: {
            required: "Invalid value",
          },
          quantity: {
            required: "Invalid value",
          },
        },
      })
    }
  </script>
</body>
</html>