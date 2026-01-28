<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8">
                <h1 class="text-3xl font-extrabold text-gray-900 mb-2">Kursus Saya</h1>
                <p class="text-gray-500">Akses semua kursus yang sudah Anda miliki</p>
            </div>

            @if($courses->isEmpty())
                <div class="bg-white rounded-3xl p-12 text-center shadow-sm border border-gray-100">
                    <div class="w-20 h-20 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-6 text-indigo-400">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Belum Ada Kursus</h3>
                    <p class="text-gray-500 mb-6">Anda belum memiliki kursus. Beli kursus pertama Anda sekarang!</p>
                    <a href="{{ route('courses.index') }}" class="inline-block bg-indigo-600 text-white px-6 py-3 rounded-xl font-bold hover:bg-indigo-700 transition">Jelajahi Kursus</a>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($courses as $course)
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl transition group">
                        <div class="h-40 bg-gradient-to-br from-indigo-600 to-purple-700 relative overflow-hidden">
                            @if($course->thumbnail)
                                <img src="{{ asset('storage/'.$course->thumbnail) }}" alt="{{ $course->title }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex items-end p-4">
                                <span class="bg-green-500 text-white px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">Aktif</span>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-indigo-600 transition">{{ $course->title }}</h3>
                            <p class="text-gray-500 text-sm mb-4">{{ $course->chapters->count() }} Materi</p>
                            
                            @if($course->chapters->first())
                                <a href="{{ route('learning.show', [$course->slug, $course->chapters->first()->id]) }}" class="block w-full text-center bg-indigo-600 text-white py-3 rounded-xl font-bold hover:bg-indigo-700 transition">Mulai Belajar</a>
                            @else
                                <span class="block w-full text-center bg-gray-200 text-gray-500 py-3 rounded-xl font-bold">Materi Segera Hadir</span>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
