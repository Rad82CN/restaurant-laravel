@if (session()->has('error'))

<script>
    $.toast({
            heading: 'Error',
            text:  "{{ Session::get('error') }}",
            icon: 'error',
            loader: true,        // Change it to false to disable loader
            position: 'top-center',
            loaderBg: '#9EC600'  // To change the background
        })
</script>

@endif
    