<title>Edit</title>
<style>
    .row {
        padding: 10px;
        margin: 5px;
        margin-top: 10px;
        border-style: solid;
        border-width: 5px;
    }

    .row::after {
        content: "";
        clear: both;
        display: table;
    }

    .column {
        float: left;
        width: 120px;
    }

    #update {
        background-color: #77a8a4;
        border: none;
        color: white;
        padding: 5px 20px;
        text-align: center;
        text-decoration: none;
        font-size: 16px;
        margin: 10px 20px;
        cursor: pointer;
        border-radius: 20px;
    }
</style>
<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="row">
        <div style="font-weight:bold;">Account Details</div>
        <form action="/edit" method="post" action="/action_page.php" id="edit">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            @foreach ($user as $user)
            <p>MEMBERSHIP ID<br>
                <span style="font-size:25px">{{$user->id}}
            </p>
            <p>NAME<br>
                <span style="font-size:25px"><input type="text" name="name" value="{{$user->name}}" required>
            </p>
            <p>DATE OF BIRTH<br>
                <span style="font-size:25px"><input type="date" name="dob" value="{{$user->dob}}">
            </p>
            <p>EMAIL<br>
                <span style="font-size:25px"><input type="text" name="email" value="{{$user->email}}" required>
            </p>
            <p>CONTACT NUMBER<br>
                <span style="font-size:25px"><input type="text" name="contact" value="{{$user->contact}}">
            </p>
            <p>DATE JOINED<br>
                <span style="font-size:25px">{{$user->created_at}}
            </p>
            @endforeach
        </form>
    </div>
    <button type="submit" form="edit" id="update" value="Update">Update</button>
</x-app-layout>