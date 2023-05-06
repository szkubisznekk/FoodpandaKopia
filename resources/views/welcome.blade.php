@vite('resources/css/app.css')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Foodpanda Kopia</title>
    {{-- Font --}}
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
</head>
<body>
    <div class="grid grid-cols-3 divide-x-4 divide-black bg-sky-400 h-10 sticky top-0">
        <div>1</div>
        <div><a href="{{ url('/') }}"><img src="{{ Vite::asset('resources/images/rv.png') }}"  alt="panda logo" class="mx-auto h-9 w-9"/></a></div>
        <div class="grid grid-cols-3 divide-x-2 divide-black">
            <div></div>
            <div><a href="{{ url('/') }}"><img src="{{ Vite::asset('resources/images/wultah.png') }}"  alt="walter logo" class="ml-[20%] mr-2 h-9 w-9 inline-block"/><span class="">Bejelentkezés</span></a></div>
            <div><a href="{{ url('/') }}"><img src="{{ Vite::asset('resources/images/basket.png') }}"   alt="basket logo" class="ml-[20%] mr-2 h-9 w-9 inline-block"/><span class="">Kosár</span></a></div>
        </div>

    </div>
    <div>
        <p class="mx-64 text-center text-purple-500 ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer pretium eu leo vitae hendrerit. Nullam lacinia neque et risus feugiat, vel blandit ante mollis. Nunc ac sagittis lacus, in tincidunt purus. Suspendisse gravida libero quis viverra rhoncus. Suspendisse potenti. Pellentesque ligula velit, dictum vitae neque vitae, vestibulum tincidunt felis. Aliquam faucibus feugiat sem nec euismod. Duis lorem ligula, venenatis eu rhoncus non, auctor vel magna.

            Aenean ac laoreet nulla. Donec cursus interdum lacinia. Curabitur vel erat ut orci pellentesque viverra eget nec orci. Quisque non tellus nulla. Vestibulum at malesuada leo. Nunc at mauris velit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent elementum nunc at sapien volutpat volutpat. Cras arcu turpis, dapibus at lectus a, auctor accumsan ex. Praesent rutrum ex purus, eu porttitor urna luctus eget. Aenean at rutrum dui, a tristique dui. Integer sed ex sit amet risus dapibus mattis tempor quis quam. Etiam sit amet aliquet sapien. Ut ipsum sapien, egestas egestas ornare quis, eleifend non dui. Suspendisse iaculis nunc ut convallis egestas. Curabitur congue, velit in fringilla porttitor, leo massa viverra erat, et cursus turpis nunc tincidunt purus.

            Etiam at elit auctor, fermentum odio sed, suscipit lectus. Ut pulvinar lorem leo. Fusce lobortis nec lorem eget gravida. Sed congue tellus sed diam tempor, sed ornare odio pulvinar. Etiam ex nulla, interdum vitae bibendum nec, mattis id massa. Aenean quis ligula in risus ultricies pellentesque. Donec sit amet orci elementum, malesuada lacus et, tristique eros. Vestibulum congue egestas metus, non semper turpis placerat ut. Cras egestas libero at tellus pharetra, vitae tincidunt neque auctor. Donec felis diam, porttitor vitae bibendum et, porta in leo. Donec dapibus sit amet enim quis luctus. Phasellus tincidunt, lectus sollicitudin auctor rhoncus, lacus ipsum scelerisque tellus, at ornare nisl est sed purus. Mauris iaculis finibus augue, mattis viverra ante rhoncus ut. Phasellus rutrum risus tempus tempus pulvinar.

            Proin hendrerit gravida leo eget gravida. Etiam in eros vulputate, laoreet ipsum vel, fermentum lectus. Morbi tempor, augue eget imperdiet dignissim, dui leo tempus ligula, hendrerit efficitur turpis enim at quam. Nulla sed nulla consequat, laoreet sem hendrerit, pulvinar mi. Fusce imperdiet dapibus rhoncus. Nunc ut egestas diam, non viverra magna. Nam porttitor commodo quam, eget tempus felis fringilla sed. Nulla maximus tincidunt suscipit. Quisque laoreet pellentesque pulvinar. Nulla at eros pulvinar, luctus augue quis, hendrerit purus. Ut at efficitur ligula, porta commodo erat. Aliquam euismod magna nec dignissim fermentum. Quisque eget dolor et libero vestibulum suscipit nec non sapien. Sed ipsum purus, commodo non tristique in, ullamcorper a lacus. Donec sagittis nisl non erat finibus laoreet. Phasellus dictum, velit sed ultrices finibus, dolor libero vulputate neque, et interdum nunc mauris at turpis.

            Praesent lorem massa, porttitor a mauris non, suscipit porttitor odio. Fusce semper maximus rutrum. Pellentesque at velit ut eros sodales pulvinar. Donec ac nisl et urna efficitur fermentum quis sit amet lectus. Vivamus id malesuada felis. Praesent viverra lacus sed eleifend sollicitudin. Duis consequat facilisis ante, ac faucibus velit feugiat ac. Aliquam at risus auctor, vulputate nibh nec, porta magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec ornare turpis quis consectetur faucibus.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer pretium eu leo vitae hendrerit. Nullam lacinia neque et risus feugiat, vel blandit ante mollis. Nunc ac sagittis lacus, in tincidunt purus. Suspendisse gravida libero quis viverra rhoncus. Suspendisse potenti. Pellentesque ligula velit, dictum vitae neque vitae, vestibulum tincidunt felis. Aliquam faucibus feugiat sem nec euismod. Duis lorem ligula, venenatis eu rhoncus non, auctor vel magna.

            Aenean ac laoreet nulla. Donec cursus interdum lacinia. Curabitur vel erat ut orci pellentesque viverra eget nec orci. Quisque non tellus nulla. Vestibulum at malesuada leo. Nunc at mauris velit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent elementum nunc at sapien volutpat volutpat. Cras arcu turpis, dapibus at lectus a, auctor accumsan ex. Praesent rutrum ex purus, eu porttitor urna luctus eget. Aenean at rutrum dui, a tristique dui. Integer sed ex sit amet risus dapibus mattis tempor quis quam. Etiam sit amet aliquet sapien. Ut ipsum sapien, egestas egestas ornare quis, eleifend non dui. Suspendisse iaculis nunc ut convallis egestas. Curabitur congue, velit in fringilla porttitor, leo massa viverra erat, et cursus turpis nunc tincidunt purus.

            Etiam at elit auctor, fermentum odio sed, suscipit lectus. Ut pulvinar lorem leo. Fusce lobortis nec lorem eget gravida. Sed congue tellus sed diam tempor, sed ornare odio pulvinar. Etiam ex nulla, interdum vitae bibendum nec, mattis id massa. Aenean quis ligula in risus ultricies pellentesque. Donec sit amet orci elementum, malesuada lacus et, tristique eros. Vestibulum congue egestas metus, non semper turpis placerat ut. Cras egestas libero at tellus pharetra, vitae tincidunt neque auctor. Donec felis diam, porttitor vitae bibendum et, porta in leo. Donec dapibus sit amet enim quis luctus. Phasellus tincidunt, lectus sollicitudin auctor rhoncus, lacus ipsum scelerisque tellus, at ornare nisl est sed purus. Mauris iaculis finibus augue, mattis viverra ante rhoncus ut. Phasellus rutrum risus tempus tempus pulvinar.

            Proin hendrerit gravida leo eget gravida. Etiam in eros vulputate, laoreet ipsum vel, fermentum lectus. Morbi tempor, augue eget imperdiet dignissim, dui leo tempus ligula, hendrerit efficitur turpis enim at quam. Nulla sed nulla consequat, laoreet sem hendrerit, pulvinar mi. Fusce imperdiet dapibus rhoncus. Nunc ut egestas diam, non viverra magna. Nam porttitor commodo quam, eget tempus felis fringilla sed. Nulla maximus tincidunt suscipit. Quisque laoreet pellentesque pulvinar. Nulla at eros pulvinar, luctus augue quis, hendrerit purus. Ut at efficitur ligula, porta commodo erat. Aliquam euismod magna nec dignissim fermentum. Quisque eget dolor et libero vestibulum suscipit nec non sapien. Sed ipsum purus, commodo non tristique in, ullamcorper a lacus. Donec sagittis nisl non erat finibus laoreet. Phasellus dictum, velit sed ultrices finibus, dolor libero vulputate neque, et interdum nunc mauris at turpis.

            Praesent lorem massa, porttitor a mauris non, suscipit porttitor odio. Fusce semper maximus rutrum. Pellentesque at velit ut eros sodales pulvinar. Donec ac nisl et urna efficitur fermentum quis sit amet lectus. Vivamus id malesuada felis. Praesent viverra lacus sed eleifend sollicitudin. Duis consequat facilisis ante, ac faucibus velit feugiat ac. Aliquam at risus auctor, vulputate nibh nec, porta magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec ornare turpis quis consectetur faucibus.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer pretium eu leo vitae hendrerit. Nullam lacinia neque et risus feugiat, vel blandit ante mollis. Nunc ac sagittis lacus, in tincidunt purus. Suspendisse gravida libero quis viverra rhoncus. Suspendisse potenti. Pellentesque ligula velit, dictum vitae neque vitae, vestibulum tincidunt felis. Aliquam faucibus feugiat sem nec euismod. Duis lorem ligula, venenatis eu rhoncus non, auctor vel magna.

Aenean ac laoreet nulla. Donec cursus interdum lacinia. Curabitur vel erat ut orci pellentesque viverra eget nec orci. Quisque non tellus nulla. Vestibulum at malesuada leo. Nunc at mauris velit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent elementum nunc at sapien volutpat volutpat. Cras arcu turpis, dapibus at lectus a, auctor accumsan ex. Praesent rutrum ex purus, eu porttitor urna luctus eget. Aenean at rutrum dui, a tristique dui. Integer sed ex sit amet risus dapibus mattis tempor quis quam. Etiam sit amet aliquet sapien. Ut ipsum sapien, egestas egestas ornare quis, eleifend non dui. Suspendisse iaculis nunc ut convallis egestas. Curabitur congue, velit in fringilla porttitor, leo massa viverra erat, et cursus turpis nunc tincidunt purus.

Etiam at elit auctor, fermentum odio sed, suscipit lectus. Ut pulvinar lorem leo. Fusce lobortis nec lorem eget gravida. Sed congue tellus sed diam tempor, sed ornare odio pulvinar. Etiam ex nulla, interdum vitae bibendum nec, mattis id massa. Aenean quis ligula in risus ultricies pellentesque. Donec sit amet orci elementum, malesuada lacus et, tristique eros. Vestibulum congue egestas metus, non semper turpis placerat ut. Cras egestas libero at tellus pharetra, vitae tincidunt neque auctor. Donec felis diam, porttitor vitae bibendum et, porta in leo. Donec dapibus sit amet enim quis luctus. Phasellus tincidunt, lectus sollicitudin auctor rhoncus, lacus ipsum scelerisque tellus, at ornare nisl est sed purus. Mauris iaculis finibus augue, mattis viverra ante rhoncus ut. Phasellus rutrum risus tempus tempus pulvinar.

Proin hendrerit gravida leo eget gravida. Etiam in eros vulputate, laoreet ipsum vel, fermentum lectus. Morbi tempor, augue eget imperdiet dignissim, dui leo tempus ligula, hendrerit efficitur turpis enim at quam. Nulla sed nulla consequat, laoreet sem hendrerit, pulvinar mi. Fusce imperdiet dapibus rhoncus. Nunc ut egestas diam, non viverra magna. Nam porttitor commodo quam, eget tempus felis fringilla sed. Nulla maximus tincidunt suscipit. Quisque laoreet pellentesque pulvinar. Nulla at eros pulvinar, luctus augue quis, hendrerit purus. Ut at efficitur ligula, porta commodo erat. Aliquam euismod magna nec dignissim fermentum. Quisque eget dolor et libero vestibulum suscipit nec non sapien. Sed ipsum purus, commodo non tristique in, ullamcorper a lacus. Donec sagittis nisl non erat finibus laoreet. Phasellus dictum, velit sed ultrices finibus, dolor libero vulputate neque, et interdum nunc mauris at turpis.

Praesent lorem massa, porttitor a mauris non, suscipit porttitor odio. Fusce semper maximus rutrum. Pellentesque at velit ut eros sodales pulvinar. Donec ac nisl et urna efficitur fermentum quis sit amet lectus. Vivamus id malesuada felis. Praesent viverra lacus sed eleifend sollicitudin. Duis consequat facilisis ante, ac faucibus velit feugiat ac. Aliquam at risus auctor, vulputate nibh nec, porta magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec ornare turpis quis consectetur faucibus.
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer pretium eu leo vitae hendrerit. Nullam lacinia neque et risus feugiat, vel blandit ante mollis. Nunc ac sagittis lacus, in tincidunt purus. Suspendisse gravida libero quis viverra rhoncus. Suspendisse potenti. Pellentesque ligula velit, dictum vitae neque vitae, vestibulum tincidunt felis. Aliquam faucibus feugiat sem nec euismod. Duis lorem ligula, venenatis eu rhoncus non, auctor vel magna.

Aenean ac laoreet nulla. Donec cursus interdum lacinia. Curabitur vel erat ut orci pellentesque viverra eget nec orci. Quisque non tellus nulla. Vestibulum at malesuada leo. Nunc at mauris velit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent elementum nunc at sapien volutpat volutpat. Cras arcu turpis, dapibus at lectus a, auctor accumsan ex. Praesent rutrum ex purus, eu porttitor urna luctus eget. Aenean at rutrum dui, a tristique dui. Integer sed ex sit amet risus dapibus mattis tempor quis quam. Etiam sit amet aliquet sapien. Ut ipsum sapien, egestas egestas ornare quis, eleifend non dui. Suspendisse iaculis nunc ut convallis egestas. Curabitur congue, velit in fringilla porttitor, leo massa viverra erat, et cursus turpis nunc tincidunt purus.

Etiam at elit auctor, fermentum odio sed, suscipit lectus. Ut pulvinar lorem leo. Fusce lobortis nec lorem eget gravida. Sed congue tellus sed diam tempor, sed ornare odio pulvinar. Etiam ex nulla, interdum vitae bibendum nec, mattis id massa. Aenean quis ligula in risus ultricies pellentesque. Donec sit amet orci elementum, malesuada lacus et, tristique eros. Vestibulum congue egestas metus, non semper turpis placerat ut. Cras egestas libero at tellus pharetra, vitae tincidunt neque auctor. Donec felis diam, porttitor vitae bibendum et, porta in leo. Donec dapibus sit amet enim quis luctus. Phasellus tincidunt, lectus sollicitudin auctor rhoncus, lacus ipsum scelerisque tellus, at ornare nisl est sed purus. Mauris iaculis finibus augue, mattis viverra ante rhoncus ut. Phasellus rutrum risus tempus tempus pulvinar.

Proin hendrerit gravida leo eget gravida. Etiam in eros vulputate, laoreet ipsum vel, fermentum lectus. Morbi tempor, augue eget imperdiet dignissim, dui leo tempus ligula, hendrerit efficitur turpis enim at quam. Nulla sed nulla consequat, laoreet sem hendrerit, pulvinar mi. Fusce imperdiet dapibus rhoncus. Nunc ut egestas diam, non viverra magna. Nam porttitor commodo quam, eget tempus felis fringilla sed. Nulla maximus tincidunt suscipit. Quisque laoreet pellentesque pulvinar. Nulla at eros pulvinar, luctus augue quis, hendrerit purus. Ut at efficitur ligula, porta commodo erat. Aliquam euismod magna nec dignissim fermentum. Quisque eget dolor et libero vestibulum suscipit nec non sapien. Sed ipsum purus, commodo non tristique in, ullamcorper a lacus. Donec sagittis nisl non erat finibus laoreet. Phasellus dictum, velit sed ultrices finibus, dolor libero vulputate neque, et interdum nunc mauris at turpis.

Praesent lorem massa, porttitor a mauris non, suscipit porttitor odio. Fusce semper maximus rutrum. Pellentesque at velit ut eros sodales pulvinar. Donec ac nisl et urna efficitur fermentum quis sit amet lectus. Vivamus id malesuada felis. Praesent viverra lacus sed eleifend sollicitudin. Duis consequat facilisis ante, ac faucibus velit feugiat ac. Aliquam at risus auctor, vulputate nibh nec, porta magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec ornare turpis quis consectetur faucibus.
        </p>
    </div>
</body>
</html>
