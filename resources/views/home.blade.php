<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Hero Section -->
            <div class="bg-gradient-to-r from-indigo-600 to-purple-700 rounded-3xl p-8 mb-12 text-white shadow-2xl relative overflow-hidden">
                <div class="relative z-10 max-w-2xl">
                    <h1 class="text-5xl font-extrabold mb-6 leading-tight">Belajar Coding dengan Mentor Terbaik</h1>
                    <p class="text-xl mb-8 opacity-90">Tingkatkan skill coding kamu dengan kurikulum terupdate dan bimbingan langsung dari praktisi industri.</p>
                    <a href="{{ route('courses.index') }}" class="bg-white text-indigo-700 px-8 py-4 rounded-full font-bold text-lg hover:bg-gray-100 transition shadow-lg inline-block">Mulai Belajar Sekarang</a>
                </div>
                <!-- Abstract patterns using CSS -->
                <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full -mr-20 -mt-20"></div>
                <div class="absolute bottom-0 right-0 w-32 h-32 bg-white opacity-10 rounded-full mr-10 mb-10"></div>
            </div>

            <!-- Featured Courses -->
            <div class="mb-12">
                <div class="flex justify-between items-end mb-8">
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900">Kursus Pilihan</h2>
                        <p class="text-gray-600">Pilih kurikulum terbaik untuk masa depanmu</p>
                    </div>
                    <a href="{{ route('courses.index') }}" class="text-indigo-600 font-semibold hover:underline">Lihat Semua &rarr;</a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($featuredCourses as $course)
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl transition group">
                        <div class="h-48 bg-gray-200 relative overflow-hidden">
                            @if($course->thumbnail)
                                <img src="{{ asset('storage/'.$course->thumbnail) }}" alt="{{ $course->title }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center text-gray-400">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                            @endif
                            <div class="absolute top-4 left-4">
                                <span class="bg-white/90 backdrop-blur px-3 py-1 rounded-full text-xs font-bold text-indigo-700 uppercase tracking-wider">{{ $course->level }}</span>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-indigo-600 transition">{{ $course->title }}</h3>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $course->description }}</p>
                            
                            <div class="flex items-center text-sm text-gray-500 mb-4 space-x-4">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    {{ $course->duration }}
                                </span>
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                    {{ $course->instructor }}
                                </span>
                            </div>

                            <div class="flex items-center justify-between border-t pt-4">
                                <span class="text-lg font-bold text-indigo-700">Rp {{ number_format($course->price, 0, ',', '.') }}</span>
                                <a href="{{ route('courses.show', $course->slug) }}" class="bg-indigo-50 text-indigo-700 px-4 py-2 rounded-lg font-bold text-sm hover:bg-indigo-600 hover:text-white transition">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Features Section -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-50">
                    <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center text-indigo-600 mb-6 font-bold text-xl">1</div>
                    <h3 class="text-xl font-bold mb-3">Kurikulum Industri</h3>
                    <p class="text-gray-600">Materi disusun berdasarkan kebutuhan industri saat ini untuk menjamin kesiapan kerja.</p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-50">
                    <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center text-purple-600 mb-6 font-bold text-xl">2</div>
                    <h3 class="text-xl font-bold mb-3">Bimbingan Mentor</h3>
                    <p class="text-gray-600">Tanya jawab langsung dengan mentor ahli yang akan membimbing kamu sampai bisa.</p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-50">
                    <div class="w-12 h-12 bg-pink-100 rounded-xl flex items-center justify-center text-pink-600 mb-6 font-bold text-xl">3</div>
                    <h3 class="text-xl font-bold mb-3">Sertifikat Resmi</h3>
                    <p class="text-gray-600">Dapatkan sertifikat penyelesaian kurikulum yang diakui untuk meningkatkan portofolio kamu.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
                <div class="col-span-1 md:col-span-2">
                    <h3 class="text-2xl font-bold mb-6">Ajar Platform</h3>
                    <p class="text-gray-400 mb-6 max-w-sm">Platform edukasi coding terbaik di Indonesia. Kami membantu kamu menjadi developer profesional dengan bimbingan mentor terbaik.</p>
                </div>
                <div>
                    <h4 class="font-bold mb-6">Link Cepat</h4>
                    <ul class="space-y-4 text-gray-400">
                        <li><a href="{{ route('home') }}" class="hover:text-white transition">Beranda</a></li>
                        <li><a href="{{ route('courses.index') }}" class="hover:text-white transition">Kursus</a></li>
                        <li><a href="#" class="hover:text-white transition">Tentang Kami</a></li>
                        <li><a href="#" class="hover:text-white transition">Kontak</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-6">Social Media</h4>
                    <div class="flex space-x-4">
                        <!-- Add icons here if desired -->
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-indigo-600 transition">FB</a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-indigo-600 transition">IG</a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-indigo-600 transition">TW</a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-12 pt-8 text-center text-gray-500">
                <p>&copy; 2024 Ajar Platform. All rights reserved.</p>
            </div>
        </div>
    </footer>
</x-app-layout>
