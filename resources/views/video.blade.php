<x-layout>
<h2>{{ $video->title }}</h2>

<div style="max-width: 800px; margin: 0 auto;">
    <video width="100%" controls>
        <source src="{{ asset('storage/' . $video->path) }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    
    <div style="margin-top: 20px; text-align: left;">
        <p><strong>Description:</strong></p>
        <p>{{ $video->description }}</p>
        <p style="color: #666; font-size: 0.9em; margin-top: 10px;">
            Uploaded by: {{ $video->account->username ?? 'Unknown' }} • {{ $video->created_at->diffForHumans() }}
        </p>
    </div>
    
    <div style="margin-top: 20px;">
        <a href="/mainpage" class="btn">Back to Main Page</a>
    </div>
</div>
</x-layout>