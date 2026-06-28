<!DOCTYPE html>
<html lang="bn">
<link rel="icon" href="{{ $setting->favicon ?? asset('/public/storage/default/logo.png') }}" />

<head>
    <meta charset="UTF-8">
       <title>Student-{{$student->name_en}}</title>
    <link rel="icon" href="{{ $setting->favicon ?? asset('/public/storage/default/logo.png') }}" />
</head>


<body onload="window.print()">
    <x-admin.studentInfo :student="$student" />
</body>

</html>
