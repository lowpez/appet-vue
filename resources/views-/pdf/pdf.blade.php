<html >
<head>
    <title>{{$pet->name}} QR</title>
</head>
<body>
<style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:700,800&display=swap');
    table, th, td  {
        border: 0px transparent;
        padding: 0px;
        text-align: center;
    }
    td {
        font-family: 'Poppins', sans-serif;
        font-weight: 700 !important;
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
        <td><img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(520,520)->margin(0)->generate(env('APP_URL').'/tag/'.$pet->tag_id)) !!} "></td>
    </tr>
    <tr>
        <td>{{env('APP_URL').'/tag/'.$pet->tag_id}}</td>
    </tr>

</table>

</body>
</html>
