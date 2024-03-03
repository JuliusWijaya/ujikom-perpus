@props(['users', 'koleksis', 'trxpjm', 'trxpgm'])

<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Pengguna</h4>
                </div>
                <div class="card-body">
                    {{ $users ?? '-' }}
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
                <i class="fas fa-book-open"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Koleksi</h4>
                </div>
                <div class="card-body">
                    {{ $koleksis ?? '-' }}
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
                <i class="fab fa-nintendo-switch"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Peminjaman</h4>
                </div>
                <div class="card-body">
                    {{ $trxpjm ?? '-' }}
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-success">
                <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Pengembalian</h4>
                </div>
                <div class="card-body">
                    {{ $trxpgm ?? '-' }}
                </div>
            </div>
        </div>
    </div>
</div>
