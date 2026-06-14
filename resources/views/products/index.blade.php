@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')

<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
    <h1 style="font-size:24px; font-weight:600;">Daftar Produk</h1>
    <a href="{{ route('products.create') }}"
       style="background:#2563eb; color:white; padding:8px 16px; border-radius:8px; text-decoration:none; font-size:14px;">
        + Tambah Produk
    </a>
</div>

@if(session('success'))
    <div style="background:#dcfce7; color:#166534; padding:12px 16px; border-radius:8px; margin-bottom:16px;">
        {{ session('success') }}
    </div>
@endif

<div style="background:white; border-radius:8px; box-shadow:0 1px 3px rgba(0,0,0,0.1); overflow:hidden;">
    <table style="width:100%; border-collapse:collapse;">
        <thead>
            <tr style="background:#f9fafb;">
                <th style="padding:12px 16px; text-align:left; font-size:12px; color:#6b7280; text-transform:uppercase;">#</th>
                <th style="padding:12px 16px; text-align:left; font-size:12px; color:#6b7280; text-transform:uppercase;">Nama</th>
                <th style="padding:12px 16px; text-align:left; font-size:12px; color:#6b7280; text-transform:uppercase;">Deskripsi</th>
                <th style="padding:12px 16px; text-align:left; font-size:12px; color:#6b7280; text-transform:uppercase;">Harga</th>
                <th style="padding:12px 16px; text-align:left; font-size:12px; color:#6b7280; text-transform:uppercase;">Stok</th>
                <th style="padding:12px 16px; text-align:left; font-size:12px; color:#6b7280; text-transform:uppercase;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
            <tr style="border-top:1px solid #e5e7eb;">
                <td style="padding:12px 16px; font-size:14px; color:#6b7280;">{{ $loop->iteration }}</td>
                <td style="padding:12px 16px; font-size:14px; font-weight:500; color:#111827;">{{ $product->name }}</td>
                <td style="padding:12px 16px; font-size:14px; color:#6b7280;">{{ $product->description ?? '-' }}</td>
                <td style="padding:12px 16px; font-size:14px; color:#111827;">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                <td style="padding:12px 16px; font-size:14px; color:#111827;">{{ $product->stock }}</td>
                <td style="padding:12px 16px; font-size:14px; display:flex; gap:8px; align-items:center;">
                    <a href="{{ route('products.show', $product) }}"
                       style="background:#3b82f6; color:white; padding:4px 10px; border-radius:4px; font-size:12px; text-decoration:none;">Detail</a>
                    <a href="{{ route('products.edit', $product) }}"
                       style="background:#f59e0b; color:white; padding:4px 10px; border-radius:4px; font-size:12px; text-decoration:none;">Edit</a>
                    <form action="{{ route('products.destroy', $product) }}" method="POST" style="margin:0;">
                        @csrf @method('DELETE')
                        <button type="submit"
                                onclick="return confirm('Yakin ingin menghapus?')"
                                style="background:#ef4444; color:white; padding:4px 10px; border-radius:4px; font-size:12px; border:none; cursor:pointer;">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="padding:24px; text-align:center; color:#9ca3af;">Belum ada produk.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div style="margin-top:16px;">
    {{ $products->links() }}
</div>

@endsection