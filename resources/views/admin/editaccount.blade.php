<title>Edit</title>
<style>
    .row {
        width: 50%;
        padding: 10px;
        margin: auto;
        margin-top: 10px;
        border-style: solid;
        border-width: 5px;
        text-align:center;
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
        <div style="font-weight:bold">Account Details</div>
        <form action="/edit" method="post" action="/action_page.php" id="edit">
            @csrf  
            @csrf
            @foreach ($user as $user)
            <p>MEMBERSHIP ID<br>
                <span style="font-size:20px">{{$user->id}}
            </p>
            <br>
            <p>NAME<br>
                <span style="font-size:20px">
                <span style="font-size:20px">{{$user->name}}
            </p>
            <br>
            <p>DATE OF BIRTH<br>
                <span style="font-size:20px">
                <span style="font-size:20px">{{$user->dob}}
            </p>
            <br>
            <p>CONTACT NUMBER<br>
                <span style="font-size:20px">
                <span style="font-size:20px">{{$user->contact}}
            </p>
            <br>
            <p>EMAIL<br>
                <span style="font-size:20px"><input type="text" name="email" value="{{$user->email}}" required>
            </p>
            <br>
            <p>DATE JOINED<br>
                <span style="font-size:20px">{{$user->created_at}}
            </p>
            @endforeach
        </form>
        <button type="submit" form="edit" id="update" value="Update">Update</button>
    </div>
</x-app-layout>