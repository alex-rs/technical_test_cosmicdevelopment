<html lang="en">
<head><title>Cosmic API</title></head>
<body>
    @foreach($employees as $employee)
    <div>
        @foreach($employee->toArray() as $key => $val)
        <p>{{ $key }} : {{ $val }}</p>
        @endforeach
    </div>
    <hr>
    @endforeach
</body>
</html>
