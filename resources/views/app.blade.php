<!DOCTYPE html>
<html>
    <head>
        <title>Buku Tamu Open House Rekayasa Perangkat Lunak</title>
        @vite('resources/css/app.css')
        <script src="https://kit.fontawesome.com/a76dfacc76.js" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    </head>
    <body oncontextmenu="return false" class="h-screen w-screen select-none flex flex-col scroll-smooth overflow-y-auto scrollbar-thin scrollbar-h-1.5 scrollbar-thumb-yellow-500 scrollbar-track-transparent scrollbar-thumb-rounded-full">
        @yield('content')
        <footer class="absolute bottom-0 w-full flex justify-center bg-black bg-opacity-25">
            <p class="text-amber-400 text-opacity-75">©2023 Rekayasa Perangkat Lunak. All Rights Reserved.</p>
        </footer>
    </body>
    <script>
        function modalShow() {
            var nama = document.getElementById('nama').value;
            var alamat = document.getElementById('alamat').value;

            if (nama.trim() == '' || alamat.trim() == '') {
                return;
            }

            document.getElementById('modal').classList.remove('hidden');
            document.getElementById('modal').classList.add('flex');

            setTimeout(function(){
                document.getElementById('modal').classList.remove('flex');
                document.getElementById('modal').classList.add('hidden');
            }, 3000);
        }
    </script>
    <script>
        document.addEventListener('keydown', function(event) {
        if (event.keyCode === 123) {
            event.preventDefault();
        }

        else if (event.key === 'F11') {
            event.preventDefault();
        }

        else if(event.ctrlKey && (event.key === '=' || event.key === '-' || (event.keyCode >= 85 && event.keyCode <= 87))) {
            event.preventDefault();
        }
    });
    </script>
</html>