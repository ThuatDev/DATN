<!DOCTYPE html>
<html>
<head>
    <title>Send SMS</title>
</head>
<body>
    <form action="/send-sms" method="post">
        @csrf
        {{-- số điện thoại   --}}

        <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="phone" required>
        <button type="submit">Send SMS</button>
    </form>
</body>
</html>
