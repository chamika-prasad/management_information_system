<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    @php
        $file = 'Nature.pdf';
    @endphp

    <form action="{{url('/downloaded',$file)}}">

        <button type="submit">download</button>

    </form>


    <form action="{{url('/views',$file)}}">

        <button type="submit">view</button>

    </form>
    
    
</body>
</html>