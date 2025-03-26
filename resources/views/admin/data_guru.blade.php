<style>
    #btn1{
        height: 85%;
        width: 100%;
        font-weight: bold;
        font-size: 30px;
    }
</style>
@extends('templateAdmin')

@section('admin')
    <div class="container-fluid d-flex justify-content-center" id="container1">
        <div class="col-md text-center justify-content-center">
            <a type="button" href="{{ route('admin.tambah_guru') }}" class="btn btn-success mt-4 text-nowrap" id="btn1">Tambah Data</a>
        </div>
    </div>
    <small class="container-sm mt-4 d-flex justify-content-start">catatan: menghapus data guru bisa menghapus data siswa bimbingannya</small>
    <div class="table-responsive container mt-4 d-flex justify-content-center">
        <table class="table text-center">
            <tbody>
                @forelse ($teachers as $t)
                    <tr class="table-group-divider">
                        <td>{{ $t->nama }}</td>
                        <td>
                            <a href="{{ route('admin.lihat_guru', ['id' => $t->id]) }}" class="active"
                                style="color: #231F20">
                                <i class="bi bi-info-circle fs-4"></i>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('admin.edit_guru', $t->id) }}" class="active" style="color: #595BD4;">
                                <i class="bi bi-pencil-square fs-4"></i>
                            </a>
                        </td>
                        <td>
                            <form id="delete-form-{{ $t->id }}" action="{{ route('admin.hapus_guru', $t->id) }}"
                                method="POST" style="display:none;">
                                @csrf
                                @method('DELETE')
                            </form>
                            <button class="button" onclick="confirmDelete({{ $t->id }})">
                                <a href="#" class="active" style="color: #D85B53;">
                                    <i class="bi bi-trash3 fs-4"></i>
                                </a>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">
                            <div class="alert alert-danger m-0">Data Pembimbing Belum Tersedia</div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah kamu yakin ingin menghapus data ini?',
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak',
                customClass: {
                    title: 'custom-swal-title',
                    confirmButton: 'custom-button-logout',
                    cancelButton: 'custom-button-cancel'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit form jika user mengonfirmasi penghapusan
                    document.getElementById('delete-form-' + id).submit();
                }
            })
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
