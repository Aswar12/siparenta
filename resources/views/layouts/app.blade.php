<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }} | {{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{ asset('img/siparenta.ico') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!--Totally optional :) -->


    @livewireStyles

</head>


<body class="bg-gray-200 font-sans leading-normal tracking-normal mt-12">
    <header>
        @include('layouts.navigation')
    </header>
    <main>
        <div class="flex flex-col md:flex-row ">
            @include('layouts.sidenav')
            {{ $slot }}
        </div>





    </main>

    <!-- jQuery -->

    <script>
        /*Toggle dropdown list*/
                function toggleDD(myDropMenu) {
                    document.getElementById(myDropMenu).classList.toggle("invisible");
                }
                /*Filter dropdown options*/
                function filterDD(myDropMenu, myDropMenuSearch) {
                    var input, filter, ul, li, a, i;
                    input = document.getElementById(myDropMenuSearch);
                    filter = input.value.toUpperCase();
                    div = document.getElementById(myDropMenu);
                    a = div.getElementsByTagName("a");
                    for (i = 0; i < a.length; i++) {
                        if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
                            a[i].style.display = "";
                        } else {
                            a[i].style.display = "none";
                        }
                    }
                }
                // Close the dropdown menu if the user clicks outside of it
                window.onclick = function(event) {
                    if (!event.target.matches('.drop-button') && !event.target.matches('.drop-search')) {
                        var dropdowns = document.getElementsByClassName("dropdownlist");
                        for (var i = 0; i < dropdowns.length; i++) {
                            var openDropdown = dropdowns[i];
                            if (!openDropdown.classList.contains('invisible')) {
                                openDropdown.classList.add('invisible');
                            }
                        }
                    }
                }
    </script>
    <script src="{{ asset('js/scrpt.js') }}" defer></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/8785f89138.js" crossorigin="anonymous"></script>
    <script>
        window.addEventListener('save', event => {
            Swal.fire({
               
                title: event.detail.title,
                icon: event.detail.icon,
                text: event.detail.text,
                position: 'top-right',
                toast: true,
                showConfirmButton: false,
                timer: 3000,
            })
        });
        window.addEventListener('confirmDelete', event => {
            Swal.fire({
                        title: event.detail.title,
                        text: event.detail.text,
                        icon: event.detail.icon,
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        dangerMode: true,
                        confirmButtonText: 'Ya, Hapus!'
                        }).then((result) => {
                        if (result.isConfirmed) {
                           window.livewire.emit('delete', event.detail.id);
                           Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.', 
                            'success'
                           )
                        }
                        })
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    @livewireScripts
</body>

</html>