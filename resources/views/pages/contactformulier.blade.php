<x-layouts.app>

<!DOCTYPE html>
<html>
<head>
    <title>Contactformulier</title>
</head>
<body>
    <h1>Contactformulier</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="/contact" method="POST">
        @csrf

        <label>Naam:</label><br>
        <input type="text" name="name" required><br><br>

        <label>E-mail:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Bericht:</label><br>
        <textarea name="message" required></textarea><br><br>

        <button type="submit">Verstuur</button>
    </form>
</body>
</html>

</x-layouts.app>