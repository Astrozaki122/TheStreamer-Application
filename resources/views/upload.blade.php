<x-layout>
<h2>Upload a Video</h2>

@if (session('success'))
    <div style="color: green; margin-bottom: 10px;">
        {{ session('success') }}
    </div>
@endif

<form method="POST" action="/video/upload" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="title">Video Title:</label>
        <input type="text" name="title" required>
        @error('title')
            <p style="color:red;">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="description">Description:</label>
        <textarea name="description" rows="3" required></textarea>
        @error('description')
            <p style="color:red;">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="video">Select Video (MP4, WebM, OGG only):</label>
        <input type="file" name="video" accept="video/mp4,video/webm,video/ogg" required>
        @error('video')
            <p style="color:red;">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit" class="btn">Upload</button>
</form>
</x-layout>
