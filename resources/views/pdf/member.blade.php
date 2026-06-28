<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Member-{{$member->full_name}}</title>
    <link rel="icon" href="{{ asset('/public/storage/logos/' . $setting->favicon) }}" />

</head>

<body onload="window.print()">
    <x-admin.memberInfo :member="$member" />
</body>

</html>