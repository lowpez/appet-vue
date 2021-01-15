<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<style>
    body, td, input, textarea, select,div {
        font-family: Roboto,Arial,sans-serif;
    }
    ul,li{padding:0;margin:0;margin-left:10px;}
</style>
<div style="max-width:98%; min-width:320px; background-color: #f5f5f5; border: 0; margin-right: auto; margin-left: auto; padding: 0.5% 0 0.5% 0;">
    <div style="max-width:550px; min-width:320px;  background-color: white; border: 0; margin-right: auto; margin-left: auto; ">
        <div style="margin-left:30px;margin-right:30px;">
            <p>&nbsp;</p>
            <p style="text-align: center"><a href="https://www.appet.cl/" style="text-decoration:none;font-family:Verdana, Geneva, sans-serif;font-weight: bold; color: #3D3D3D;font-size: 15px;"><img alt="" border="0" src="https://www.appet.cl/logo.png" style="padding-bottom:20px;max-width:275px;" /></a></p>

            <h2 style="color:#212121;font-size:24px;font-weight:bold;">Querido, {{$user->name}}!</h2>
            <h3 style="font-family:Palatino Linotype, Book Antiqua, Palatino, serif;font-style:italic;font-weight:500;">Es <span style="border-bottom: 1px solid red;">muy importante</span> leas:</h3>
            <p style="font-family: ;font-size: 15px; margin-left: auto; margin-right: auto; text-align: justify;color: #666;line-height:1.5;margin-bottom:75px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel metus eu urna lobortis condimentum vel aenim. Pellentesque malesuada sapien id pellentesque suscipit.</p>
            <table style="width:100%;">
                <th>
                <td style="width:auto;"></td>
                <td style="text-align: center; font-size: 18px;line-height:18px;font-weight: bold;"><a href="{{env('APP_URL').'/confirmar-traspaso/pet/'.$pet->id.'/user/'.$user->id}}"><span style="cursor:pointer;background-color:#7300FF;max-width:300px;padding:15px 25px;display:inline-block;color: #ffffff; text-decoration: none;margin:0 auto;">Confirmar</span></a></td>
                <td style="width:auto;"></td>
                </th>
            </table>
            <hr style="margin-top:10px;margin-top:75px; color: white;" />
            <p style="text-align:center;margin-bottom:15px;"><small style="text-align:center;font-family:Courier New, Courier, monospace;font-size:10px;color#666;">CC BY-SA 3.0 <a href="https://blob.cl/" style="color:#666;">Blob</a> | Made with <span style="color:red;">&hearts;</span> in Chile</small></p>
            <p>&nbsp;</p>
        </div>
    </div>
</div>
</body>
</html>
