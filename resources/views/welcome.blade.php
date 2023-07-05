<x-guest-layout>
<div id="my-component"></div>

<script>
  const MyComponent = () => {
    console.log("ya jalo tu")
    return (
      React.createElement('div', { className: 'fade-enter' },
        'Contenido del componente'
      )
    );
  };

  ReactDOM.render(
    React.createElement(MyComponent),
    document.getElementById('my-component')
  );
</script>
</x-guest-layout>