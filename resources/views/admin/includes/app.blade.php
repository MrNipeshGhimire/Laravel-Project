<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('admin.includes.head')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    @include('admin.includes.navbar')
    @include('admin.includes.sidebar')

 <div class="wrapper">
    @section('main-content')

    @show

 </div>
 @include('admin.includes.footer')

    
</body>
</html>