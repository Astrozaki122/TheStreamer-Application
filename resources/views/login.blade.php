<x-layout>
    <h2>Login</h2>
      
    <form method="POST" action="/login"> 
        @csrf

        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" name="username" required>

            @error('username')
            <p style="color:red;">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" required>

            
      @error('password')
      <p style="color:red;">{{ $message }}</p>
      @enderror

        </div>

        <!-- This button submits the form -->
        <button type="submit" class="btn">Login</button>

        <!-- Link to register page -->
        <a href="/register" class="btn link-btn">Register</a>
    </form>
</x-layout>
