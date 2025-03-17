<style>
    #btn1{
        height: 80%;
        width: 100%;
        font-weight: bold;
        font-size: 28px;
    }
    #btn2{
        height: 80%;
        width: 100%;
        font-weight: bold;
        font-size: 28px;
    }
</style>
@extends('templateAdmin')

@section('admin')
    <div class="container-fluid px-4 d-flex justify-content-center" id="container1" style="text-align:center;">
        <div class="col-md d-flex gap-5">
            <a href="{{route('admin.rekap_siswa')}}" class="btn btn-success mt-4 text-nowrap" id="btn1">Rekap Data</a>
            <a href="{{ route('admin.tambah_siswa') }}" class="btn btn-success mt-4 text-nowrap" id="btn2">Tambah Data</a>
        </div>
    </div>

    <div class="table-responsive container mt-5 d-flex justify-content-center">
        <table class="table text-center">
            <tbody>
                @forelse ($users as $u)
                    <tr class="table-group-divider">
                        <td>{{ $u->nama }}</td>
                        <td>
                            <a href="{{ route('admin.lihat_siswa', ['id' => $u->id]) }}" class="active"
                                style="color: #231F20">
                                <i class="bi bi-info-circle fs-4"></i>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('admin.edit_siswa', $u->id) }}" class="active" style="color: #595BD4;">
                                <i class="bi bi-pencil-square fs-4"></i>
                            </a>
                        </td>
                        <td>
                            <form id="delete-form-{{ $u->id }}" action="{{ route('admin.hapus_siswa', $u->id) }}"
                                method="POST" style="display:none;">
                                @csrf
                                @method('DELETE')
                            </form>
                            <button class="button" onclick="confirmDelete({{ $u->id }})">
                                <a href="#" class="active" style="color: #D85B53;">
                                    <i class="bi bi-trash3 fs-4"></i>
                                </a>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">
                            <div class="alert alert-danger m-0">Data Siswa Belum Tersedia</div>
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
