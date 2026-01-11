<x-layout>
 <title>The Streamer</title>
 <body>
 <h1>Select The Videos</h1>
 
 <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 20px; padding: 20px; max-width: 1400px; margin: 0 auto;">
   @forelse($videos as $video)
    <div style="background: #e8d7d7; border-radius: 8px; overflow: hidden; cursor: pointer;">
        <a href="/video/{{ $video->id }}" style="text-decoration: none; color: inherit;">
            @if($video->thumbnail)
                <img src="{{ asset('storage/' . $video->thumbnail) }}" style="width: 100%; height: 180px; object-fit: cover;">
            @else
                <div style="width: 100%; height: 180px; background: #333; display: flex; align-items: center; justify-content: center; color: white;">
                    No Thumbnail
                </div>
            @endif
            <div style="padding: 10px;">
                <h3 style="margin: 0 0 5px 0; font-size: 16px;">{{ $video->title }}</h3>
                <p style="margin: 0; font-size: 14px; color: #666;">{{ Str::limit($video->description, 80) }}</p>
                <p style="margin: 5px 0 0 0; font-size: 12px; color: #888;">
                    {{ $video->account->username ?? 'Unknown' }} • {{ $video->created_at->diffForHumans() }}
                </p>
            </div>
        </a>
    </div>
   @empty
    <p style="grid-column: 1/-1; text-align: center;">No videos yet. <a href="/video/upload">Upload the first video!</a></p>
   @endforelse
 </div>

 </body>
</x-layout>