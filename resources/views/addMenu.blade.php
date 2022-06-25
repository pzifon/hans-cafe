<!DOCTYPE html>
<html style="position:relative;min-height:89vh">

<head>
    <title>Add Menu Item</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
    </style>
</head>


<body class="d-flex flex-column min-vh-100">
    @include('layouts.navbar')
    <div class="container">
        <form action="/addMenuItem" method="post" action="/action_page.php" enctype="multipart/form-data">
            @csrf
            @csrf
            <div>
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Menu</h5>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">

                                <div class="input-group mb-3">
                                    <label class="input-group-text">Photo</label>
                                    <input type="file" class="form-control" accept="image/*" name="photo">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Food Category</span>
                                    <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Choose a category..." name="category">
                                    <datalist id="datalistOptions">
                                        <option value="Main_Course">
                                        <option value="Sides">
                                        <option value="Beverages">
                                        <option value="Dessert">
                                    </datalist>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Name</span>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Menu Code</span>
                                    <input type="text" class="form-control" pattern="^[MSDB]{1}[0-9]{2}$" placeholder="start with M/S/D/B" name="code" required>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Description</span>
                                    <textarea class="form-control" name="description"></textarea>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Nutrition</span>
                                    <input type="text" class="form-control"  name="nutrition" required>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Price</span>
                                    <input type="text" class="form-control" name="price" placeholder="0.00" oninput="validate(this)" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
        <button type="submit" class="btn btn-secondary" id="submit">Add</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
    @include('layouts.footer')

    <script>

      var validate = function(e) {
          var t = e.value;
          e.value = (t.indexOf(".") >= 0) ? (t.substr(0, t.indexOf(".")) + t.substr(t.indexOf("."), 3)) : t;
      }
  </script>
</body>