<div class="alert {{ Session::get('alert-class') }} alert-dismissible show fade">
    <div class="alert-body">
        <button class="close" data-dismiss="alert">
            <span>×</span>
        </button>
        {{ Session::get('message') }}
    </div>
</div>
