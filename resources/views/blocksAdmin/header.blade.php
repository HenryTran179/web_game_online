  <section class="content-header mt-5">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1>@yield('ad-title', '')</h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">@yield('ad-title', '')</li>
                      </ol>
                  </div>
              </div>
          </div>
          <!-- /.container-fluid -->
      </section>
