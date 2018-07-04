<!DOCTYPE html>
<html>
<head>
    <title>TodoList</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
@include('inc.navbar')
<div class="container">
    @include('inc.messages')
    @yield('content')
</div>

<footer class="text-center">
    <p>Copyright &copy; 2018 Todolist</p>
</footer>

</body>
</html>