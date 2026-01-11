<x-layout>
    <div style="max-width: 600px; margin: 50px auto; padding: 20px;">
        <h1 style="color: #e3342f;">419 - Page Expired</h1>
        <p style="margin: 20px 0;">Your session has expired due to inactivity. This is a security measure to protect your account.</p>
        
        <div style="margin-top: 30px;">
            <a href="{{ route('login') }}" class="btn" style="display: inline-block; padding: 10px 20px; background: #3490dc; color: white; text-decoration: none; border-radius: 4px;">
                Return to Login
            </a>
            <a href="{{ url()->previous() }}" class="btn" style="display: inline-block; padding: 10px 20px; margin-left: 10px; background: #6c757d; color: white; text-decoration: none; border-radius: 4px;">
                Go Back
            </a>
        </div>
        
        <div style="margin-top: 30px; padding: 15px; background: #fff3cd; border: 1px solid #ffc107; border-radius: 4px;">
            <strong>Tip:</strong> To avoid this error:
            <ul style="text-align: left; margin: 10px 0;">
                <li>Don't leave forms open for extended periods</li>
                <li>Refresh the page if you've been idle</li>
                <li>Make sure cookies are enabled in your browser</li>
            </ul>
        </div>
    </div>
</x-layout>
