{{-- General JS Scripts --}}
<script src="{{ asset('Assets/js/stisla/jquery.min.js') }}"></script>
<script src="{{ asset('Assets/js/stisla/popper.js') }}"></script>
<script src="{{ asset('Assets/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('Assets/js/stisla/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('Assets/js/stisla/moment.min.js') }}"></script>
<script src="{{ asset('Assets/js/stisla/stisla.js') }}"></script>

{{-- JS Library --}}
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

{{-- Template JS --}}
<script src="{{ asset('Assets/js/stisla/scripts.js') }}"></script>
<script src="{{ asset('Assets/js/stisla/custom.js') }}"></script>

{{-- Page Spesific JS File --}}
<script src="{{ asset('Assets/js/stisla/index-0.js') }}"></script>
<script>
    $(document).ready(function() {
        $("#example").DataTable({
            "lengthMenu": [5, 10, 15],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Indonesian.json"
            }
        });
    });
</script>
@stack('js')
</body>

</html>
