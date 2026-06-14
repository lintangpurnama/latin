@extends('layouts.app')

@section('title', 'Detail Produk')

@section('content')

<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-xl font-semibold text-gray-800">Detail Produk</h1>
            <a href="{{ route('products.index') }}"
               class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-lg text-sm">
                ← Kembali
            </a>
        </div>

        <div class="space-y-4">
            <div class="flex border-b pb-3">
                <span class="w-32 text-sm font-medium text-gray-500">Nama</span>
                <span class="text-sm text-gray-900">{{ $product->name }}</span>
            </div>
            <div class="flex border-b pb-3">
                <span class="w-32 text-sm font-medium text-gray-500">Deskripsi</span>
                <span class="text-sm text-gray-900">{{ $product->description ?? '-' }}</span>
            </div>
            <div class="flex border-b pb-3">
                <span class="w-32 text-sm font-medium text-gray-500">Harga</span>
                <span class="text-sm text-gray-900">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
            </div>
            <div class="flex border-b pb-3">
                <span class="w-32 text-sm font-medium text-gray-500">Stok</span>
                <span class="text-sm text-gray-900">{{ $product->stock }}</span>
            </div>
            <div class="flex border-b pb-3">
                <span class="w-32 text-sm font-medium text-gray-500">Dibuat</span>
                <span class="text-sm text-gray-900">{{ $product->created_at->format('d M Y, H:i') }}</span>
            </div>
            <div class="flex pb-3">
                <span class="w-32 text-sm font-medium text-gray-500">Diperbarui</span>
                <span class="text-sm text-gray-900">{{ $product->updated_at->format('d M Y, H:i') }}</span>
            </div>
        </div>

        <div class="flex gap-3 mt-6">
            <a href="{{ route('products.edit', $product) }}"
               class="bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-2 rounded-lg text-sm">
                Edit
            </a>
            <form action="{{ route('products.destroy', $product) }}" method="POST">
                @csrf @method('DELETE')
                <button type="submit"
                        onclick="return confirm('Yakin ingin menghapus produk ini?')"
                        class="bg-red-500 hover:bg-red-600 text-white px-5 py-2 rounded-lg text-sm">
                    Hapus
                </button>
            </form>
        </div>

    </div>
</div>

@endsection