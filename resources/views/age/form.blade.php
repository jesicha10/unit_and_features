<!DOCTYPE html>
<html>
<head>
    <title>Age Calculator</title>
</head>
<body>
    <h1>Age Calculator</h1>
    <form action="{{ route('age.calculate') }}" method="POST">
        @csrf
        <label for="birthdate">Tanggal Lahir:</label>
        <input type="date" name="birthdate" required>
        <button type="submit">Hitung Umur</button>
    </form>
</body>
</html>
