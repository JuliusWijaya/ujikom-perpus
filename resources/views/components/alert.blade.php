<div class="alert {{ Session::get('alert-class') }} alert-dismissible fade show position-fixed" role="alert">
    {{ Session::get('message') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
