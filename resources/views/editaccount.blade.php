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
</style>
<x-app-layout>
    <x-slot name="header"></x-slot>
    <div class="row">
        <div class="column" style="font-weight:bold;">Account Details</div>
        <p>MEMBERSHIP ID <br>
        <span style="font-size:25px">1
        </p>
        <p>NAME <br>
        <span style="font-size:25px"><input type="text">
        </p>
        <p>DATE OF BIRTH <br>
        <span style="font-size:25px"><input type="text">
        </p>
        <p>EMAIL <br>
        <span style="font-size:25px"><input type="text">
        </p>
        <p>CONTACT NUMBER <br>
        <span style="font-size:25px"><input type="text">
        </p>
        <p>DATE JOINED <br>
        <span style="font-size:25px">01/01/1900
        </p>
    </div>
    <button>submit</button>
</x-app-layout>