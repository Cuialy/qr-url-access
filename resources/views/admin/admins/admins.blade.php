@extends('admin.layouts.main')

@section('content')
<section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Admins</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body p-0">
        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th style="width: 1%"> İd </th>
                    <th style="width: 20%">Name</th>
                    <th style="width: 30%">Surname </th>
                    <th>Email</th>
                    <th style="width: 20%">
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($admins as $admin)
                <tr>
                    <td>{{$admin->id}}</td>
                    <td>{{$admin->name}}</td>
                    <td>{{$admin->surname}}</td>
                    <td>{{$admin->email}}</td>

                    <td class="project-actions text-right">
                        <a class="btn btn-info btn-sm" href="{{route('admin.edit',[$admin])}}">
                            <i class="fas fa-pencil-alt"></i> Edit
                        </a>
                        <a class="btn btn-danger btn-sm" href="{{route('admin.delete',[$admin])}}">
                            <i class="fas fa-trash"></i> Delete
                        </a>
                    </td>
                </tr>
                @endforeach
               
            </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
@endsection