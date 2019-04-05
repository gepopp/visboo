<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Visboo | chat</title>
</head>
<body>
<div id="app">
    <h1>Chatroom</h1>
    <example-component></example-component>
</div>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>