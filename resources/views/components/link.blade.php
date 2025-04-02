@php
    $clases = " text-sm text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800";
@endphp

<!--attributes es una variable que exite en los componentes de laravel y si ves se le esta pasando un href en el login que lo va a dectetar como un attributes-->
<!--merge lo que hace es que junta las clases que estan en la variable de php junto con la variable atributes que trajo los attributess de el login-->

<a {{ $attributes->merge(["class" => $clases]) }}>
    {{ $slot }}
</a>
