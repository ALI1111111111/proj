<!DOCTYPE html>
<html lang="en">
@include('arduino.js')
<body style="background-color: black" >

<div class="container">
  <h2>Room Light</h2>

  <div class="card" style="width:200px;align-self: center;">
    <img id="bulb" class="card-img-top" src="{{ asset('/icon/off.svg') }}" alt="Card image" style="width:100%">



      <button id="led1"  name="On"  href="#" class="btn btn-primary">Loading</button>

  </div>
  <br>


</div>



</body>


</html>
