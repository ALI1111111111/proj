<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ Session::token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ali-Iot-system</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
@include('dashboard.Header')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>



        $(document).ready(function(){
        getval();
        setInterval(getval,7000);

        sendval();
        var val = document.getElementById("led1").innerHTML;

        function sendval(){
$("#led1").click(function(){
// $.get("http://10.0.0.4/elect/public/ard/1", function(data, status){
    var data = document.getElementById("led1").innerHTML;
            if(data=="LEd is Power oFF"){
              document.getElementById("led1").disabled = true;
              document.getElementById("bulb").src = "{{ asset('/icon/spinner.gif') }}";
                document.getElementById("led1").innerHTML = "Turning Ligh On";

                $.post("http://192.168.10.4/proj/public/ard/btn",
{
'_token': $('meta[name=csrf-token]').attr('content'),
On: 0,

},
function(data, status){
// alert("Data: " + data + "\nStatus: " + status);
// alert( "\nStatus: " + status);
if(status=="success"){
document.getElementById("led1").disabled = false;
document.getElementById("led1").innerHTML = "LEd is Power On";
document.getElementById("bulb").src = "{{ asset('/icon/on.svg') }}";
}
});

            }else if(data=="LEd is Power On"){
                 document.getElementById("led1").disabled = true;
                 document.getElementById("bulb").src = "{{ asset('/icon/spinner.gif') }}";
                 document.getElementById("led1").innerHTML = "Turning Ligh OFF";
                $.post("http://192.168.10.4/proj/public/ard/btn",
                {
                    '_token': $('meta[name=csrf-token]').attr('content'),
On: 1,

},
function(data, status){
    // alert("Data: " + data + "\nStatus: " + status);
// alert( "\nStatus: " + status);
if(status=="success"){
    document.getElementById("led1").disabled = false;
    document.getElementById("led1").innerHTML = "LEd is Power oFF";
document.getElementById("bulb").src = "{{ asset('/icon/off.svg') }}";
}
});
}

// });




});
}

      function getval(){
        $.get("http://192.168.10.4/proj/public/ard/1", function(data, status){
            if(data==1){
                document.getElementById("led1").innerHTML = "LEd is Power oFF";
                document.getElementById("bulb").src = "{{ asset('/icon/off.svg') }}";

            }else{
                document.getElementById("led1").innerHTML = "LEd is Power On";
                document.getElementById("bulb").src = "{{ asset('/icon/on.svg') }}";
            }

        });
      }
    });
    </script>

</head>
