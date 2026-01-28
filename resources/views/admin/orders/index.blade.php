<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8">
                <h1 class="text-3xl font-extrabold text-gray-900 mb-2">Admin - Kelola Pesanan</h1>
                <p class="text-gray-500">Verifikasi pembayaran dan kelola pesanan siswa</p>
            </div>

            @if(session('success'))
                <div class="bg-green-50 border border-green-200 text-green-800 p-4 rounded-2xl mb-6 flex items-center gap-3">
                    <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 border-b border-gray-100">
                            <tr>
                                <th class="text-left px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">ID</th>
                                <th class="text-left px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Siswa</th>
                                <th class="text-left px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Kursus</th>
                                <th class="text-left px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Harga</th>
                                <th class="text-left px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="text-left px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Bukti</th>
                                <th class="text-left px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($orders as $order)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 text-sm text-gray-500">#{{ $order->id }}</td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-bold text-gray-900">{{ $order->user->name }}</div>
                                    <div class="text-xs text-gray-500">{{ $order->user->email }}</div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900">{{ $order->course->title }}</td>
                                <td class="px-6 py-4 text-sm font-bold text-indigo-700">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                                <td class="px-6 py-4">
                                    @if($order->status === 'pending')
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-yellow-100 text-yellow-800">Pending</span>
                                    @elseif($order->status === 'verified')
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-800">Verified</span>
                                    @elseif($order->status === 'rejected')
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-red-100 text-red-800">Rejected</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    @if($order->payment_proof)
                                        <a href="{{ asset('storage/'.$order->payment_proof) }}" target="_blank" class="inline-flex items-center gap-1 text-indigo-600 hover:underline text-sm font-bold">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                            Lihat
                                        </a>
                                    @else
                                        <span class="text-gray-400 text-sm">Belum ada</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    @if($order->status === 'pending' && $order->payment_proof)
                                        <div class="flex items-center gap-2">
                                            <form action="{{ route('admin.orders.verify', $order->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-bold hover:bg-green-700 transition">Verifikasi</button>
                                            </form>
                                            <form action="{{ route('admin.orders.reject', $order->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg text-sm font-bold hover:bg-red-700 transition">Tolak</button>
                                            </form>
                                        </div>
                                    @elseif($order->status === 'pending')
                                        <span class="text-gray-400 text-sm">Menunggu bukti</span>
                                    @else
                                        <span class="text-gray-400 text-sm">-</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="px-6 py-12 text-center text-gray-500">Belum ada pesanan.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                <div class="p-6 border-t border-gray-100">
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
