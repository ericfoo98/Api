<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Laravel</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

  <!-- Styles -->
  <style>
  html, body {
    background-color: #fff;
    color: #636b6f;
    font-family: 'Nunito', sans-serif;
    font-weight: 200;
    height: 100vh;
    margin: 0;
  }

  .full-height {
    height: 100vh;
  }

  .flex-center {
    align-items: center;
    display: flex;
    justify-content: center;
  }


  </style>
</head>
<body class="flex-center">
  <form method="post" action="{{url('/api/meme/save')}}">
    {{csrf_field()}}
    Image Name: <input type="text" name="name" autocomplete="off"></input><br><br>
    Choose Image: <input type="file" name="picture" accept="image/*" autocomplete="off"></input><br><br>
    <input type="submit">

  </form>

</body>



</html>
