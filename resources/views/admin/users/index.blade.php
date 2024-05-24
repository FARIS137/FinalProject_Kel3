@extends('admin.layouts.app')
@section('konten')

<div class="container-fluid px-4">
                        <h1 class="mt-4">Users</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Tables</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <a href="{{route('users.create')}}" 
                            class="btn btn-md btn-primary" >
                                <i class="fa-solid fa-square-plus">
                                </i> Add User</a>
                            </div>
        <div class="card-body">
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                        <th>No</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Email</th>
                                            <th>Hak Akses</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Email</th>
                                            <th>Hak Akses</th>
                                            <th>Action</th>
                                    </tfoot>
                                    <tbody>
                                        
                                        @foreach($users as $u)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$u->username}}</td>
                                            <td>{{$u->password}}</td>
                                            <td>{{$u->email}}</td>
                                            <td>{{$u->hak_akses}}</td>
                                            <td>
                                                <a href="{{route('users.show', $u->id)}}"
                                                    class="btn btn-sm btn-success">
                                                    <i class="fa-solid fa-eye"></i></a>
                                                    <a href="{{ route('users.edit', $u->id) }}" class="btn btn-sm btn-warning">
                                                    <i class="fa-solid fa-pen-to-square"></i> </a>
                                                    </a> <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" 
                                                    data-bs-target="#exampleModal{{$u->id}}">
                                                    <i class="fa-solid fa-trash-can"></i> </button>
                                                <!-- Modal -->
<div class="modal fade" id="exampleModal{{$u->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Users</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Apakah anda yakin akan menghapus data? {{$u->users}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

        <form action="{{ route('users.destroy', $u->id) }}"
         method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
        </form>
                                         
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

@endsection