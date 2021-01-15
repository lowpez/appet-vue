<html >
<head>

    <title>{{$pet->name}} QR</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>


<!--<div class="container">
    <div class="row justify-content-center align-items-center no-gutters mx-0">
        <div class="d-inline text-center px-4">
            <span class="side text-center">+56 {{$pet->user->phone}}</span>
        </div>
        <div class="d-inline px-0">
            <img class="img-thumbnail" src="{{asset('upload/'.$pet->tag_id.'.png')}}" alt="">
            <span class="text-center d-block">{{env('APP_URL').'/tag/'.$pet->tag_id}}</span>
        </div>
    </div>
</div>-->
<!--<table>
    <tr>
        <td style="width: 25px;transform:rotate(-90deg);font-size:40px;"><span>+56 {{$pet->user->phone}}</span></td>
        <td><img  src="{{asset('upload/'.$pet->tag_id.'.jpg')}}" alt=""></td>
    </tr>
    <tr>
        <td></td>
        <td style="font-size:25px;text-align: center">{{env('APP_URL').'/tag/'.$pet->tag_id}}</td>
    </tr>
</table>-->
<style>
@import url('https://fonts.googleapis.com/css?family=Poppins:700,800&display=swap');
    table, th, td  {
        border: 0px black solid;
        padding: 0px;
        text-align: center;
        font-family: 'Poppins', sans-serif;
    }
    td{
    }
    @font-face {
        font-family: 'Poppins', sans-serif;
        font-weight: 800;
        font-style: normal; src: url({{asset('fonts/Poppins/Poppins-Bold.ttf')}}) format('truetype');
    }
    .rotate {
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        width: 1.5em;
    }
    .rotate div {
        -moz-transform: rotate(-90.0deg);  /* FF3.5+ */
        -o-transform: rotate(-90.0deg);  /* Opera 10.5 */
        -webkit-transform: rotate(-90.0deg);  /* Saf3.1+, Chrome */
        filter:  progid:DXImageTransform.Microsoft.BasicImage(rotation=0.083);  /* IE6,IE7 */
        -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=0.083)"; /* IE8 */
        margin-left: -10em;
        margin-right: -10em;
    }
</style>


<table cellpadding="0" cellspacing="0" align="center">
    <tr>
        <td class="rotate" rowspan="4"><div>+56{{$pet->user->phone}}</div></td>
        <td><img src="{{asset('upload/'.$pet->tag_id.'.jpg')}}" /></td>
    </tr>
    <tr>
        <td>{{env('APP_URL').'/tag/'.$pet->tag_id}}</td>
    </tr>

</table>

</body>
</html>
