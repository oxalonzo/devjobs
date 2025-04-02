
<!--ese $atributes loq ue hace es qu ele esta pasando las clase puestas en donde se use el componente que en este caso es de guest.blade -->
<!--el punto de esto es que no le pongas clases aqui a el objecto, ponsela desde donde se esta pasaando la clases con $atribute si no utiliza merge(['class'=>'pones las clases aqui']) lo puedes  utilizar aqui con $atribute-->
<!--lo que pasa es que las clases que se le ponen en el otro lado a donde se manda a llamar el componente reescribe las clases que estan aqui-->

<h1 {{ $attributes }}>
    Dev<span class="font-extrabold">Jobs</span>
</h1>
