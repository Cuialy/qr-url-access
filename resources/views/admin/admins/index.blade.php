@extends('admin.layouts.main')

@section('content')
<section class="content">
  <div class="row justify-content-center">
      <div class="col-md-8 mt-2">
          <div class="card card-dark">
              <div class="card-header">
                  <h3 class="card-title">Admin Add</h3>
                  <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                          <i class="fas fa-minus"></i>
                      </button>
                  </div>
              </div>
              <div class="card-body">
                  <form action="{{ route('admin.createAdmin') }}" method="POST">
                      @csrf
                      <div class="form-group">
                          <label for="inputName">Name</label>
                          <input type="text" name="name" class="form-control">
                      </div>
                      <div class="form-group">
                          <label for="inputName">Surname</label>
                          <input type="text" name="surname" class="form-control">
                      </div>
                      <div class="form-group">
                          <label for="inputName">Email</label>
                          <input type="email" name="email" class="form-control">
                      </div>
                      <div class="form-group">
                          <label for="inputName">Password</label>
                          <input type="text" name="password" class="form-control">
                      </div>
                      <input type="submit" value="Add new admin" class="btn btn-success float-right">
                  </form>
              </div>
              <!-- /.card-body -->
          </div>
          <!-- /.card -->
      </div>
  </div>
</section>

@endsection
