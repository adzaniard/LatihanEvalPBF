<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Dosen</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900 min-h-screen flex items-center justify-center">

<div class="bg-white shadow rounded-lg p-8 w-full max-w-lg">
    <h1 class="text-2xl font-bold mb-6">Tambah Dosen</h1>
    <form action="{{ route('dosen.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block text-sm font-medium">Nama</label>
            <input name="nama" type="text" required class="w-full border border-gray-300 rounded px-3 py-2" />
        </div>
        <div>
            <label class="block text-sm font-medium">NIDN</label>
            <input name="nidn" type="text" required class="w-full border border-gray-300 rounded px-3 py-2" />
        </div>
        <div>
            <label class="block text-sm font-medium">Email</label>
            <input name="email" type="email" required class="w-full border border-gray-300 rounded px-3 py-2" />
        </div>
        <div>
            <label class="block text-sm font-medium">Prodi</label>
            <input name="prodi" type="text" required class="w-full border border-gray-300 rounded px-3 py-2" />
        </div>
        <div class="flex justify-end space-x-2">
            <a href="{{ route('dosen.index') }}" class="px-4 py-2 border rounded hover:bg-gray-100">Batal</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
        </div>
    </form>
</div>

</body>
</html>
