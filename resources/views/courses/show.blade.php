<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Left Content: Course Details -->
                <div class="lg:w-2/3">
                    <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-gray-100 mb-8">
                        <div class="h-64 sm:h-96 w-full relative">
                            @if($course->thumbnail)
                                <img src="{{ asset('storage/'.$course->thumbnail) }}" alt="{{ $course->title }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-indigo-600 to-purple-700 flex items-center justify-center text-white text-opacity-30">
                                    <svg class="w-24 h-24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex flex-col justify-end p-8">
                                <span class="bg-indigo-600 text-white px-3 py-1 rounded-full text-xs font-bold uppercase tracking-widest w-fit mb-4">{{ $course->level }}</span>
                                <h1 class="text-3xl md:text-4xl font-extrabold text-white mb-2">{{ $course->title }}</h1>
                                <p class="text-white/80 flex items-center gap-4 text-sm">
                                    <span class="flex items-center"><svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> {{ $course->duration }}</span>
                                    <span class="flex items-center"><svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg> {{ $course->instructor }}</span>
                                </p>
                            </div>
                        </div>
                        <div class="p-8">
                            <h2 class="text-2xl font-bold mb-4 text-gray-900">Tentang Kursus</h2>
                            <div class="prose prose-indigo max-w-none text-gray-600 mb-8 leading-relaxed">
                                {!! nl2br(e($course->description)) !!}
                            </div>

                            <hr class="border-gray-100 mb-8">

                            <h2 class="text-2xl font-bold mb-6 text-gray-900">Materi Pembelajaran</h2>
                            <div class="space-y-4">
                                @forelse($course->chapters as $chapter)
                                <div class="flex items-center p-4 rounded-2xl bg-gray-50 border border-gray-100">
                                    <div class="w-10 h-10 rounded-xl bg-white flex items-center justify-center text-indigo-600 font-bold shadow-sm mr-4 border border-indigo-100">
                                        {{ $loop->iteration }}
                                    </div>
                                    <div class="flex-grow">
                                        <h4 class="font-bold text-gray-900">{{ $chapter->title }}</h4>
                                    </div>
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                                </div>
                                @empty
                                <p class="text-gray-500 italic">Materi belum tersedia.</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Sidebar: Pricing & CTA -->
                <div class="lg:w-1/3">
                    <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100 sticky top-24">
                        <div class="mb-6">
                            <p class="text-gray-500 text-sm mb-1">Harga Kursus</p>
                            <h2 class="text-4xl font-extrabold text-indigo-700">Rp {{ number_format($course->price, 0, ',', '.') }}</h2>
                        </div>
                        
                        <div class="space-y-4 mb-8">
                            <div class="flex items-center text-gray-600">
                                <svg class="w-5 h-5 mr-3 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                <span class="text-sm">Akses Selamanya</span>
                            </div>
                            <div class="flex items-center text-gray-600">
                                <svg class="w-5 h-5 mr-3 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                <span class="text-sm">Bimbingan Mentor</span>
                            </div>
                            <div class="flex items-center text-gray-600">
                                <svg class="w-5 h-5 mr-3 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                <span class="text-sm">Sertifikat Penyelesaian</span>
                            </div>
                        </div>

                        @auth
                            @if(Auth::user()->enrolledCourses()->where('course_id', $course->id)->exists())
                                <a href="{{ route('learning.index') }}" class="block w-full text-center bg-green-600 text-white py-4 rounded-2xl font-bold hover:bg-green-700 transition shadow-lg shadow-green-100">Buka Classroom</a>
                            @else
                                <a href="{{ route('checkout.create', $course->slug) }}" class="block w-full text-center bg-indigo-600 text-white py-4 rounded-2xl font-bold hover:bg-indigo-700 transition shadow-lg shadow-indigo-100">Beli Kursus Sekarang</a>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="block w-full text-center bg-indigo-600 text-white py-4 rounded-2xl font-bold hover:bg-indigo-700 transition shadow-lg shadow-indigo-100">Login untuk Membeli</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
