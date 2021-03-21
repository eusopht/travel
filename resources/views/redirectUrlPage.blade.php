<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{
    background-color: #27a9d2;
    background-size: 100%;
        }
    </style>
</head>
<body>
    <div class="" style="text-align: center;margin: 180px;">
        <p style="color: #fff;font-family: sans-serif;font-size: 28px;">We are preparing a link. Please wait for a moment.</p>
    </div>
    <input type="hidden" name="url" id="url" value="{{ $url }}">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script>
        $( document ).ready(function() {
            var url = $('#url').val();
            // alert(url);
            setTimeout(function(){ 
                window.location.href = url; 
                }, 2000);      
});
    </script>
</body>
</html>