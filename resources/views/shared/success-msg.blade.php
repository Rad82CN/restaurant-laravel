@if (session()->has('success'))

<script>
    $.toast({
            heading: 'Information',
            text:  "{{ Session::get('success') }}",
            icon: 'success',
            loader: true,        // Change it to false to disable loader
            position: 'top-center',
            loaderBg: '#9EC600'  // To change the background
        })
</script>

@endif
    