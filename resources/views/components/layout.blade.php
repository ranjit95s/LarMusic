<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="images/favicon.ico" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="//unpkg.com/alpinejs" defer></script>
  <link href="/css/app.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
        theme: {
          extend: {
            colors: {
              laravel: '#ef3b2d',
            },
          },
        },
      }
  </script>
  <style>
    :root {
    /* light-mode */
    --primary-text-color:#F13C20;
    --secondary-text-color:#4e4e50;
    --primary-bg-c:#1a1a1d;
    /* text-[color:var(--text-color)] */
}
.fixedElement {
    background-color: #c0c0c0;
    position:fixed;
    top:0;
    width:100%;
    z-index:100;
}
  </style>
  <title>Music Love</title>
</head>
<body class="bg-[color:var(--primary-bg-c)]">
    {{-- <h2>Music is love</h2> --}}
    {{-- View Output here --}}
    <main class="bg-[color:var(--primary-bg-c)]">
        {{$slot}}
    </main>
    <footer id="footer">
    </footer>
    <x-flash-message />
</body>
<script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>
<script src="https://unpkg.com/flowbite@1.5.5/dist/datepicker.js"></script>
<script>
var startProductBarPos=-1;
window.onscroll=function(){
  var bar = document.getElementById('st');
  if(startProductBarPos<0)startProductBarPos=findPosY(bar);

  if(pageYOffset>startProductBarPos){
    bar.style.position='fixed';
    bar.style.top="5px";
    bar.style.width="inherit";
  }else{
    bar.style.position='relative';
    bar.style.width="auto";
  }

};

function findPosY(obj) {
  var curtop = 0;
  if (typeof (obj.offsetParent) != 'undefined' && obj.offsetParent) {
    while (obj.offsetParent) {
      curtop += obj.offsetTop;
      obj = obj.offsetParent;
    }
    curtop += obj.offsetTop;
  }
  else if (obj.y)
    curtop += obj.y;
  return curtop;
}
</script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script> --}}
</html>