<!DOCTYPE html>
<html lang="bn">
<link rel="icon" href="{{ asset('/public/storage/logos/' . $setting->favicon) }}" />

<head>
    <meta charset="UTF-8">
       <title>Student-{{$student->name_en}}</title>
    <link rel="icon" href="{{ asset('/public/storage/logos/' . $setting->favicon) }}" />
</head>


<body onload="window.print()">
    <x-admin.studentInfo :student="$student" />
</body>

</html>