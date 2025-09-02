
@extends('frontend.layouts.main')

@section('main-section')
<header class="page-header py-5 text-white" style="background-color: #16a085;">
    <div class="container text-center">
        <h1>{{ $chapter->chapters_name }}</h1>
        <p class="lead">Enhance your learning experience with structured lessons</p>
        
        @if ($allQuestionsAttempted)
            <a href="{{ route('quiz', $chapter->slug) }}" class="btn btn-warning btn-lg mt-4">Attempt Again</a>
        @else
            <a href="{{ route('quiz', $chapter->slug) }}" class="btn btn-success btn-lg mt-4">Start Quiz</a>
        @endif
    </div>
</header>

<main class="container my-5">
    <div class="row g-4">
        <div class="col-lg-3">
            <div class="bg-white p-3 rounded shadow-sm position-sticky" style="top: 90px;">
                <h5 class="mb-3">All Chapters</h5>
                <div class="list-group">
                    @foreach ($chapters as $item)
                        <a class="list-group-item list-group-item-action {{ $chapter->slug == $item->slug ? 'active' : '' }}"
                           href="{{ route('chapter-view', $item->slug) }}">
                            <i class="fas fa-book-open me-2" style="color: #16a085;"></i> {{ $item->chapters_name }}
                        </a>
                    @endforeach
                </div>
                <hr class="my-4">
                <div class="mt-3 small text-muted">
                    <p class="mb-1"><strong>Need Help?</strong></p>
                    <i class="fas fa-envelope"></i> support@edugreen.com
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            {{-- Display the YouTube video section only if a chapter link is available --}}
       

            <div class="tab-content bg-white p-4 rounded shadow-sm" id="chapterContentTabs">
                @foreach ($chapter->contents as $index => $content)
                    <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="tab-{{ $index }}">
                        <h4 class="mb-3">{{ $content->title }}</h4>
                        <div class="content-description">
                            {!! $content->description !!}
                        </div>
                    </div>
                @endforeach
            </div>
                 @if ($chapter->chapter_link)
                <div class="ratio ratio-16x9 mb-4 rounded shadow-sm">
                    <div id="youtube-player"></div>
                </div>
            @endif
        </div>

        <div class="col-lg-3">
            <div class="bg-white p-3 rounded shadow-sm position-sticky" style="top: 90px;">
                <h5 class="mb-3">Topics Covered</h5>
                <div class="list-group">
                    @foreach ($chapter->contents as $index => $content)
                        <a class="list-group-item list-group-item-action {{ $loop->first ? 'active' : '' }}"
                           data-bs-toggle="tab"
                           href="#tab-{{ $index }}">
                            <i class="fas fa-book-open me-2" style="color: #16a085;"></i> {{ $content->title }}
                        </a>
                    @endforeach
                </div>
                {{-- <hr class="my-4">
                @if ($allQuestionsAttempted)
                    <a href="{{ route('quiz', $chapter->slug) }}" class="btn btn-warning w-100 mb-2">Attempt Again</a>
                @else
                    <a href="{{ route('quiz', $chapter->slug) }}" class="btn btn-success w-100 mb-2">Start Quiz</a>
                @endif --}}
            </div>
        </div>
    </div>
</main>
<script>
    const youtubeLink = "{{ $chapter->chapter_link }}";
    let videoId = '';
    
    // Check if the link exists before processing
    if (youtubeLink) {
        const url = new URL(youtubeLink);
        // Handle common YouTube URL formats
        if (url.hostname.includes('youtube.com') || url.hostname.includes('youtu.be')) {
            if (url.searchParams.get('v')) {
                videoId = url.searchParams.get('v');
            } else {
                videoId = url.pathname.split('/').pop();
            }
        }
    }

    if (videoId) {
        const tag = document.createElement('script');
        tag.src = "https://www.youtube.com/iframe_api";
        const firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

        let player;
        window.onYouTubeIframeAPIReady = function () {
            player = new YT.Player('youtube-player', {
                height: '100%',
                width: '100%',
                videoId: videoId,
                events: {
                    'onReady': (e) => e.target.playVideo(),
                    'onError': () => {
                        document.getElementById('youtube-player').innerHTML = "<p class='text-danger text-center'>Video unavailable. Please check the link.</p>";
                    }
                }
            });
        }
    }
</script>

<style>
    .list-group-item {
        transition: all 0.3s ease;
        border: 1px solid #ddd;
        font-weight: 500;
        color: #333;
        background-color: #fff;
    }

    .list-group-item:hover {
        background-color: #d4f4ef;
        color: #169085;
        border-left: 4px solid #16a085;
    }

    .list-group-item.active {
        background-color: #16a085 !important;
        border-color: #16a085;
        color: white !important;
        font-weight: 600;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    .list-group-item i {
        color: #16a085;
    }

    .list-group-item.active i {
        color: white;
    }

    .content-description ul {
        list-style: none;
        padding-left: 0;
    }

    .content-description ul li {
        position: relative;
        padding-left: 30px;
        margin-bottom: 12px;
        font-size: 16px;
        line-height: 1.6;
    }

    .content-description ul li::before {
        content: "\f058"; /* Font Awesome check circle */
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        color: #16a085;
        position: absolute;
        left: 0;
        top: 2px;
        font-size: 16px;
    }
</style>

@endsection
