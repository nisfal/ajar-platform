<x-app-layout>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-gray-100">
                <div class="p-8 border-b border-gray-100">
                    <h1 class="text-3xl font-extrabold text-gray-900 mb-2">Checkout</h1>
                    <p class="text-gray-500">Selesaikan pembelian kursus Anda</p>
                </div>

                <div class="p-8">
                    <!-- Course Summary -->
                    <div class="flex items-start gap-6 mb-8 p-6 bg-gray-50 rounded-2xl">
                        <div class="w-24 h-24 bg-gradient-to-br from-indigo-100 to-indigo-200 rounded-xl flex items-center justify-center text-indigo-400 shrink-0">
                            @if($course->thumbnail)
                                <img src="{{ asset('storage/'.$course->thumbnail) }}" alt="{{ $course->title }}" class="w-full h-full object-cover rounded-xl">
                            @else
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                            @endif
                        </div>
                        <div class="flex-grow">
                            <h3 class="text-xl font-bold text-gray-900 mb-1">{{ $course->title }}</h3>
                            <p class="text-gray-500 text-sm mb-2">{{ $course->instructor }} &bull; {{ $course->duration }}</p>
                            <p class="text-2xl font-extrabold text-indigo-700">Rp {{ number_format($course->price, 0, ',', '.') }}</p>
                        </div>
                    </div>

                    <!-- Payment Instructions -->
                    <div class="mb-8">
                        <h2 class="text-xl font-bold text-gray-900 mb-4">Instruksi Pembayaran</h2>
                        <div class="bg-indigo-50 border border-indigo-100 rounded-2xl p-6">
                            <p class="text-gray-700 mb-4">Silakan lakukan transfer ke rekening berikut:</p>
                            <div class="space-y-3">
                                <div class="flex justify-between items-center p-4 bg-white rounded-xl">
                                    <span class="text-gray-600">Bank</span>
                                    <span class="font-bold text-gray-900">BCA</span>
                                </div>
                                <div class="flex justify-between items-center p-4 bg-white rounded-xl">
                                    <span class="text-gray-600">No. Rekening</span>
                                    <span class="font-bold text-gray-900 font-mono">1234567890</span>
                                </div>
                                <div class="flex justify-between items-center p-4 bg-white rounded-xl">
                                    <span class="text-gray-600">Atas Nama</span>
                                    <span class="font-bold text-gray-900">PT Ajar Edukasi Indonesia</span>
                                </div>
                                <div class="flex justify-between items-center p-4 bg-white rounded-xl">
                                    <span class="text-gray-600">Jumlah Transfer</span>
                                    <span class="font-bold text-indigo-700 text-lg">Rp {{ number_format($course->price, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Confirm Order -->
                    <form action="{{ route('checkout.store', $course->slug) }}" method="POST">
                        @csrf
                        <div class="bg-yellow-50 border border-yellow-100 rounded-2xl p-4 mb-6 flex items-start gap-3">
                            <svg class="w-5 h-5 text-yellow-600 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                            <p class="text-sm text-yellow-800">Setelah transfer, Anda perlu mengunggah bukti pembayaran di halaman "Pesanan Saya" untuk verifikasi.</p>
                        </div>
                        <button type="submit" class="w-full bg-indigo-600 text-white py-4 rounded-2xl font-bold text-lg hover:bg-indigo-700 transition shadow-lg shadow-indigo-100">Buat Pesanan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
