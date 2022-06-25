<!DOCTYPE html>
<html style="position:relative;min-height:89vh">

<head>
    <title>Edit Menu Info</title>
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
        <form action="/editMenuItem" method="post" action="/action_page.php">
            @csrf
            @csrf
            @foreach ($item as $item)
            <div>
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Menu</h5>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                            <input type="hidden" name="id" value="{{ $item->id}}">
                                <div class="input-group mb-3">
                                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{$item->name}}">
                                </div>
                                <div class="input-group mb-3">
                                <label for="inputDescription" class="col-sm-2 col-form-label">Description</label>
                                    <textarea class="form-control" name="description">{{$item->description}}</textarea>
                                </div>
                                <div class="input-group mb-3">
                                <label for="inputNutrition" class="col-sm-2 col-form-label">Nutrition</label>
                                    <input type="text" class="form-control" name="nutrition" value="{{$item->nutrition}}">
                                </div>
                                <div class="input-group mb-3">
                                <label for="inputPrice" class="col-sm-2 col-form-label">Price</label>
                                    <input type="text" class="form-control" name="price" value="{{$item->price}}" oninput="validate(this)">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
        <button type="submit" class="btn btn-secondary" id="submit">Submit Changes</button>
                    </div>
                </div>
            </div>
        </div>
            @endforeach
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