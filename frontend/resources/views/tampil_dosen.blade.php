<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Dosen</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body class="bg-gray-100 text-gray-900">

<div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-md p-6 space-y-4">
        <h2 class="text-2xl font-bold text-blue-600 mb-6">MyDashboard</h2>
        <nav class="space-y-4">
            <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 text-gray-700 hover:text-blue-600 font-medium">
                <i data-feather="home" class="w-5 h-5"></i><span>Dashboard</span>
            </a>
            <a href="{{ route('dosen.index') }}" class="flex items-center space-x-3 text-blue-600 font-medium">
                <i data-feather="user" class="w-5 h-5"></i><span>Data Dosen</span>
            </a>
            <a href="{{ route('mahasiswa.index') }}" class="flex items-center space-x-3 text-gray-700 hover:text-blue-600 font-medium">
                <i data-feather="users" class="w-5 h-5"></i><span>Data Mahasiswa</span>
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Data Dosen</h1>
            <a href="{{ route('dosen.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 flex items-center space-x-2">
                <i data-feather="plus" class="w-4 h-4"></i>
                <span>Tambah Dosen</span>
            </a>
        </div>

        <!-- Tabel Data Dosen -->
        <div class="bg-white rounded-lg shadow overflow-x-auto">
            <table class="min-w-full table-auto text-left text-gray-900">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3">ID</th>
                        <th class="px-6 py-3">Nama</th>
                        <th class="px-6 py-3">NIDN</th>
                        <th class="px-6 py-3">Email</th>
                        <th class="px-6 py-3">Prodi</th>
                        <th class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dosen as $dsn)
                        <tr class="border-t">
                            <td class="px-6 py-3">{{ $dsn['id'] }}</td>
                            <td class="px-6 py-3">{{ $dsn['nama'] }}</td>
                            <td class="px-6 py-3">{{ $dsn['nidn'] }}</td>
                            <td class="px-6 py-3">{{ $dsn['email'] }}</td>
                            <td class="px-6 py-3">{{ $dsn['prodi'] }}</td>
                            <td class="px-6 py-3 space-x-2">
                                <a href="{{ route('dosen.edit',  $dsn['nidn']) }}" class="text-blue-600 hover:underline flex items-center space-x-1 inline-flex">
                                    <i data-feather="edit" class="w-4 h-4"></i><span>Edit</span>
                                </a>
                                <form action="{{ route('dosen.destroy', $dsn['nidn']) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus dosen ini?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline flex items-center space-x-1">
                                        <i data-feather="trash-2" class="w-4 h-4"></i><span>Hapus</span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</div>

<script>
    feather.replace();
</script>

</body>
</html>
