<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel='stylesheet' href="{{ url(mix('css/global-styles.css'))}}">
    <link rel='stylesheet' href="{{ url(mix('css/admin-styles.css'))}}">
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/nnx6nqd.css">
    <title>Document</title>
</head>
<body>
    <x-admin-menu/>
    <div class='content-flow'>
        @foreach ($dataArray as $dataRow)
            <div class='content-card'>
                <h4>{{$dataRow['title']}}</h4>
                <?php unset($dataRow['title'])?>
                <div class='body'>
                    @foreach ($dataRow as $key => $value)
                        <h5>{{$key}}</h5>
                        @foreach ($value as $key => $value)
                            @if ($value != '')
                                @if (is_array($value))
                                    @foreach ($value as $key=>$value)
                                        @if ($value != '')
                                            <p>
                                                <strong>{{$key}}:</strong> 
                                                {{$value}}
                                            </p>
                                        @endif
                                    @endforeach
                                @else
                                    <p>
                                        <strong>{{$key}}:</strong> 
                                        {{$value}}
                                    </p>
                                @endif
                            @endif
                        @endforeach
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>