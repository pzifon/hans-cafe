<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="/js/app.js"></script>
<style type="text/css">
    .alert{
        margin:20px;
        padding:10px;
        text-align:center;
    }
    #success{
        background-color: #77a8a4;
    }
    #error{
        background-color: red;
    }
</style>

@if ($message = Session::get('success'))
<div class="alert alert-success alert-block" id="success">
    <strong>{{ $message }}</strong>
    <button type="button" class="close" data-dismiss="alert">×</button>
</div>
@endif
@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block" id="error">
    <strong>{{ $message }}</strong>
    <button type="button" class="close" data-dismiss="alert">×</button>
</div>
@endif
@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-block">
    <strong>{{ $message }}</strong>
    <button type="button" class="close" data-dismiss="alert">×</button>
</div>
@endif
@if ($message = Session::get('info'))
<div class="alert alert-info alert-block">
    <strong>{{ $message }}</strong>
    <button type="button" class="close" data-dismiss="alert">×</button>
</div>
@endif
@if ($errors->any())
<div class="alert alert-danger">
    Check the following errors :(
    <button type="button" class="close" data-dismiss="alert">×</button>
</div>
@endif