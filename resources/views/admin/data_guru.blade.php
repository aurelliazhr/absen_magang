@extends('templateAdmin')

@section('admin')
<div class="container-fluid px-4 td-md-flex justify-content-md-center" id="container1" style="text-align:center; display:flex;">
    <div class="row text-center" style="display:flex">
        <div class="col">
         <a type="button" href="#" class="btn btn-success mt-4 text-nowrap " style="--bs-btn-padding-y: 20px; --bs-btn-padding-x: 605px; --bs-btn-font-size: 30px;">Tambah Data</a>
        </div>
    </div>
</div>
<div class="table-responsive container mt-5 d-flex justify-content-center">
    <table class="table text-center">
        <tbody>
            <tr>
                <th>Nama pembimbing 1</th>
                <th><a href="#" class="active" style="color: #231F20"><i class="bi bi-info-circle fs-4"></i></a></th>
                <th><a href="#" class="active" style="color: #595BD4;"><i class="bi bi-pencil-square fs-4"></i></a></th>
                <th><a href="#" class="active" style="color: #D85B53;"><i class="bi bi-trash3 fs-4"></i></a></th>
            </tr>
        </tbody>
        <tbody class="table-group-divider">
            <tr>
            <th>Nama pembimbing 2</th>
            <th><a href="#" class="active" style="color: #231F20"><i class="bi bi-info-circle fs-4"></i></a></th>
            <th><a href="#" class="active" style="color: #595BD4;"><i class="bi bi-pencil-square fs-4"></i></a></th>
            <th><a href="#" class="active" style="color: #D85B53;"><i class="bi bi-trash3 fs-4"></i></a></th>
            </tr>
        </tbody>
        <tbody class="table-group-divider">
            <tr>
            <th>Nama pembimbing 3</th>
            <th><a href="#" class="active" style="color: #231F20"><i class="bi bi-info-circle fs-4"></i></a></th>
            <th><a href="#" class="active" style="color: #595BD4;"><i class="bi bi-pencil-square fs-4"></i></a></th>
            <th><a href="#" class="active" style="color: #D85B53;"><i class="bi bi-trash3 fs-4"></i></a></th>
            </tr>
        </tbody>
    </table>
</div>
@endsection