@extends('templateAdmin')

@section('admin')
    <div class="container-fluid px-4 td-md-flex justify-content-md-center" id="container1"
        style="text-align:center; display:flex;">
        <div class="row text-center" style="display:flex">
            <div class="col">
                <a type="button" href="{{ route('admin.tambah_guru') }}" class="btn btn-success mt-4 text-nowrap "
                    style="--bs-btn-padding-y: 20px; --bs-btn-padding-x: 605px; --bs-btn-font-size: 30px;">Tambah Data</a>
            </div>
        </div>
    </div>
    <div class="table-responsive container mt-5 d-flex justify-content-center">
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
