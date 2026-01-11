<x-layout>

<h2>Register</h2>

<form method="POST" action="/register"> 
    @csrf

    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" name="username" required>
    </div>

    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" name="password" required>
    </div>


    <button type="submit" class="btn">Register</button>

    
    <p style="margin-top: 10px;">
        Already have an account? 
        <a href="/login">Login</a>
    </p>

</form>

</x-layout>
