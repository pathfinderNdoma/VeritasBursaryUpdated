@if (count($errors)>0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach    
@endif

@if (session('success'))
<div id="auto-dismiss-alert" class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('success')}}
    {{-- <h4> <i class="bi bi-x-lg" data-bs-dismiss="modal" aria-label="Close"></i></h4> --}}
  </button>
</div>
        {{-- <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> --}}
@endif

@if (session('error'))
<div id="auto-dismiss-alert" class="alert alert-danger alert-dismissible fade show" role="alert">
    {{session('error')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <span aria-hidden="true">&times;</span>
  </button>
</div>

@endif
<script>
    setTimeout(function() {
      $("#auto-dismiss-alert").alert('close');
    }, 3000);

    </script>
{{--     

    // // Add the unique token to the redirect URL
    // var token = "{{ $token }}";
    // var url = new URL(window.location.href);
    // url.searchParams.set('token', token);
    // history.replaceState(null, null, url); --}}