@if(session('success'))
    <script>
        Swal.fire({
            title: "Success",
            text: "{{ session('success') }}",
            icon: "success",
            timer: 5500
        });
    </script>
@elseif(session('error'))
    <script>
        Swal.fire({
            title: "Oops..",
            text: "{{ session('error') }}",
            icon: "error",
            timer: 5500
        });
    </script>
@endif

