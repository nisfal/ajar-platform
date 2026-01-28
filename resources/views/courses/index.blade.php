<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-12 text-center">
                <h1 class="text-4xl font-extrabold text-gray-900 mb-4">Semua Kursus Kami</h1>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Temukan berbagai topik coding dari tingkat pemula hingga mahir. Dibimbing oleh mentor profesional di bidangnya.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach($courses as $course)
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl transition group flex flex-col">
                    <div class="h-40 bg-gray-200 relative overflow-hidden shrink-0">
                        @if($course->thumbnail)
                            <img src="{{ asset('storage/'.$course->thumbnail) }}" alt="{{ $course->title }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-indigo-50 to-indigo-100 flex items-center justify-center text-indigo-300">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                        @endif
                        <div class="absolute top-3 left-3">
                            <span class="bg-white/90 backdrop-blur px-2 py-0.5 rounded-full text-[10px] font-bold text-indigo-700 uppercase tracking-wider">{{ $course->level }}</span>
                        </div>
                    </div>
                    <div class="p-5 flex-grow flex flex-col">
                        <h3 class="text-lg font-bold text-gray-900 mb-2 line-clamp-2 group-hover:text-indigo-600 transition">{{ $course->title }}</h3>
                        
                        <div class="flex items-center text-xs text-gray-500 mb-4 space-x-3">
                            <span class="flex items-center">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                {{ $course->duration }}
                            </span>
                            <span class="flex items-center">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                {{ $course->instructor }}
                            </span>
                        </div>

                        <div class="flex items-center justify-between border-t border-gray-50 pt-4 mt-auto">
                            <span class="text-md font-bold text-indigo-700">Rp {{ number_format($course->price, 0, ',', '.') }}</span>
                            <a href="{{ route('courses.show', $course->slug) }}" class="text-indigo-600 text-sm font-bold hover:underline">Detail</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-12">
                {{ $courses->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
