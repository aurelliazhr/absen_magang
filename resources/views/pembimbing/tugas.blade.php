<style>
    #Tbtn{
        width: 100%;
        height: 87%;
        font-weight: bold;
        font-size: 28px;
    }
</style>
@extends('templateGuru')
@section('guru')
    <div class="container-fluid px-4 td-md-flex justify-content-md-center" style="text-align:center; display:flex;">
        <div class="container text-center" style="display: flex;">
            <div class="col-md">
             <a href="{{route('guru.tambah_tugas')}}" type="button" class="btn btn-success mt-4 text-nowrap" id="Tbtn">Tambah Tugas</a>
            </div>
        </div>
    </div>
  <div class="table-responsive container mt-5 d-flex justify-content-center">
    <table class="table text-center">
        <tbody>
            @forelse ($tasks as $tsk)
                <tr class="table-group-divider">
                    <td>{{ $tsk->judul }}</td>
                    <td>
                        {{-- <a href="{{route('guru.pengumpulan', ['id' => $t->id])}}"> --}}
                    </td>
                    <td>
                        <a href="{{route('guru.pengumpulan')}}" class="active" style="color: #231F20;"><i class="bi bi-file-earmark-text fs-4"></i></a>
                    </td>
                    <td>
                        <a href="{{ route('guru.detail', ['id' => $tsk->id]) }}" class="active"
                            style="color: #231F20">
                            <i class="bi bi-info-circle fs-4"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('guru.edit_tugas', $tsk->id) }}" class="active" style="color: #595BD4;">
                            <i class="bi bi-pencil-square fs-4"></i>
                        </a>
                    </td>
                    <td>
                        <form id="delete-form-{{ $tsk->id }}" action="{{ route('guru.hapus_tugas', $tsk->id) }}"
                            method="POST" style="display:none;">
                            @csrf
                            @method('DELETE')
                        </form>
                        <button class="button" onclick="confirmDelete({{ $tsk->id }})">
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
