<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8">
                <h1 class="text-3xl font-extrabold text-gray-900 mb-2">Pesanan Saya</h1>
                <p class="text-gray-500">Kelola dan pantau status pesanan kursus Anda</p>
            </div>

            @if(session('success'))
                <div class="bg-green-50 border border-green-200 text-green-800 p-4 rounded-2xl mb-6 flex items-center gap-3">
                    <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                    {{ session('success') }}
                </div>
            @endif

            @if($orders->isEmpty())
                <div class="bg-white rounded-3xl p-12 text-center shadow-sm border border-gray-100">
                    <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6 text-gray-400">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Belum Ada Pesanan</h3>
                    <p class="text-gray-500 mb-6">Anda belum memiliki pesanan. Mulai belajar dengan membeli kursus pertama Anda!</p>
                    <a href="{{ route('courses.index') }}" class="inline-block bg-indigo-600 text-white px-6 py-3 rounded-xl font-bold hover:bg-indigo-700 transition">Jelajahi Kursus</a>
                </div>
            @else
                <div class="space-y-6">
                    @foreach($orders as $order)
                    <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-gray-100">
                        <div class="p-6 flex flex-col md:flex-row md:items-center gap-6">
                            <!-- Course Thumbnail -->
                            <div class="w-full md:w-32 h-24 bg-gradient-to-br from-indigo-100 to-indigo-200 rounded-xl flex items-center justify-center text-indigo-400 shrink-0">
                                @if($order->course->thumbnail)
                                    <img src="{{ asset('storage/'.$order->course->thumbnail) }}" alt="{{ $order->course->title }}" class="w-full h-full object-cover rounded-xl">
                                @else
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                @endif
                            </div>

                            <!-- Order Details -->
                            <div class="flex-grow">
                                <h3 class="text-lg font-bold text-gray-900 mb-1">{{ $order->course->title }}</h3>
                                <p class="text-gray-500 text-sm mb-2">Dipesan pada {{ $order->created_at->format('d M Y, H:i') }}</p>
                                <p class="text-xl font-bold text-indigo-700">Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>
                            </div>

                            <!-- Status Badge -->
                            <div class="shrink-0">
                                @if($order->status === 'pending')
                                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-bold bg-yellow-100 text-yellow-800">
                                        <span class="w-2 h-2 bg-yellow-500 rounded-full mr-2"></span> Menunggu Pembayaran
                                    </span>
                                @elseif($order->status === 'verified')
                                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-bold bg-green-100 text-green-800">
                                        <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span> Terverifikasi
                                    </span>
                                @elseif($order->status === 'rejected')
                                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-bold bg-red-100 text-red-800">
                                        <span class="w-2 h-2 bg-red-500 rounded-full mr-2"></span> Ditolak
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Actions -->
                        @if($order->status === 'pending')
                        <div class="border-t border-gray-100 p-6 bg-gray-50">
                            @if($order->payment_proof)
                                <div class="flex items-center gap-3 text-sm text-gray-600">
                                    <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                    Bukti pembayaran sudah diunggah. Menunggu verifikasi admin.
                                </div>
                            @else
                                <form action="{{ route('orders.upload-proof', $order->id) }}" method="POST" enctype="multipart/form-data" class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
                                    @csrf
                                    <div class="flex-grow w-full sm:w-auto">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Unggah Bukti Pembayaran</label>
                                        <input type="file" name="payment_proof" accept="image/*" required class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                                    </div>
                                    <button type="submit" class="bg-indigo-600 text-white px-6 py-3 rounded-xl font-bold hover:bg-indigo-700 transition shrink-0">Unggah</button>
                                </form>
                            @endif
                        </div>
                        @elseif($order->status === 'verified')
                        <div class="border-t border-gray-100 p-6 bg-green-50">
                            <a href="{{ route('learning.index') }}" class="inline-flex items-center gap-2 bg-green-600 text-white px-6 py-3 rounded-xl font-bold hover:bg-green-700 transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                Mulai Belajar
                            </a>
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
