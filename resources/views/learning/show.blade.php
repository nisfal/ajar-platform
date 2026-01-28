<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Sidebar: Chapter List -->
                <div class="lg:w-1/4">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden sticky top-24">
                        <div class="p-6 border-b border-gray-100">
                            <h2 class="font-bold text-gray-900">{{ $course->title }}</h2>
                            <p class="text-sm text-gray-500">{{ $course->chapters->count() }} Materi</p>
                        </div>
                        <div class="max-h-[60vh] overflow-y-auto">
                            @foreach($course->chapters as $ch)
                            <a href="{{ route('learning.show', [$course->slug, $ch->id]) }}" 
                               class="flex items-center gap-4 p-4 border-b border-gray-50 hover:bg-indigo-50 transition {{ $ch->id === $chapter->id ? 'bg-indigo-50 border-l-4 border-l-indigo-600' : '' }}">
                                <div class="w-8 h-8 rounded-lg flex items-center justify-center text-sm font-bold shrink-0 {{ $ch->id === $chapter->id ? 'bg-indigo-600 text-white' : 'bg-gray-100 text-gray-600' }}">
                                    {{ $loop->iteration }}
                                </div>
                                <span class="text-sm {{ $ch->id === $chapter->id ? 'font-bold text-indigo-700' : 'text-gray-700' }}">{{ $ch->title }}</span>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="lg:w-3/4">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                        <!-- Video Placeholder -->
                        @if($chapter->video_url)
                        <div class="aspect-video bg-gray-900 flex items-center justify-center">
                            <iframe src="{{ $chapter->video_url }}" class="w-full h-full" frameborder="0" allowfullscreen></iframe>
                        </div>
                        @else
                        <div class="aspect-video bg-gradient-to-br from-gray-800 to-gray-900 flex items-center justify-center text-white">
                            <div class="text-center">
                                <svg class="w-16 h-16 mx-auto mb-4 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <p class="opacity-70">Video belum tersedia</p>
                            </div>
                        </div>
                        @endif

                        <!-- Chapter Content -->
                        <div class="p-8">
                            <div class="flex items-center gap-4 mb-6">
                                <span class="bg-indigo-100 text-indigo-700 px-3 py-1 rounded-full text-sm font-bold">Materi {{ collect($course->chapters)->search(fn($c) => $c->id === $chapter->id) + 1 }}</span>
                            </div>
                            <h1 class="text-3xl font-extrabold text-gray-900 mb-6">{{ $chapter->title }}</h1>
                            
                            <div class="prose prose-indigo max-w-none text-gray-600 leading-relaxed">
                                {!! nl2br(e($chapter->content)) !!}
                            </div>
                        </div>

                        <!-- Navigation -->
                        <div class="border-t border-gray-100 p-6 flex justify-between items-center">
                            @php
                                $currentIndex = collect($course->chapters)->search(fn($c) => $c->id === $chapter->id);
                                $prevChapter = $course->chapters[$currentIndex - 1] ?? null;
                                $nextChapter = $course->chapters[$currentIndex + 1] ?? null;
                            @endphp

                            @if($prevChapter)
                                <a href="{{ route('learning.show', [$course->slug, $prevChapter->id]) }}" class="flex items-center gap-2 text-gray-600 hover:text-indigo-600 transition">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                    <span class="font-bold">Sebelumnya</span>
                                </a>
                            @else
                                <div></div>
                            @endif

                            @if($nextChapter)
                                <a href="{{ route('learning.show', [$course->slug, $nextChapter->id]) }}" class="flex items-center gap-2 bg-indigo-600 text-white px-6 py-3 rounded-xl font-bold hover:bg-indigo-700 transition">
                                    <span>Selanjutnya</span>
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                </a>
                            @else
                                <a href="{{ route('learning.index') }}" class="flex items-center gap-2 bg-green-600 text-white px-6 py-3 rounded-xl font-bold hover:bg-green-700 transition">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                    <span>Selesai</span>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
