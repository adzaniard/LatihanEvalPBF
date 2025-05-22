<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Tambah Mahasiswa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900 py-12 px-6">
    <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-semibold mb-4">Tambah Mahasiswa</h2>
        <form method="POST" action="{{ url('/mahasiswa') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium">Nama</label>
                <input name="nama" type="text" required class="w-full border border-gray-300 rounded px-3 py-2" />
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">NIM</label>
                <input name="nim" type="text" required class="w-full border border-gray-300 rounded px-3 py-2" />
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Email</label>
                <input name="email" type="email" required class="w-full border border-gray-300 rounded px-3 py-2" />
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Prodi</label>
                <input name="prodi" type="text" required class="w-full border border-gray-300 rounded px-3 py-2" />
            </div>
            <div class="flex justify-end space-x-2">
                <a href="{{ url('/mahasiswa') }}" class="px-4 py-2 border rounded hover:bg-gray-100">Batal</a>
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Simpan</button>
            </div>
        </form>
    </div>
</body>
</html>
