@extends('layouts.app')

@section('contents')
  <div class="row d-flex justify-content-center align-items-center" style="margin-top: 250px;">
    <h2 class="mb-0 text-white-800" id="text-content">Halaman Ini Malas Menanggapi</h2>
  </div>
  <div class="row d-flex justify-content-center align-items-center" style="margin-top: 10px;">
    <a class="mb-0 text-white-800" id="read-more" onclick="showMore()">Selengkapnya-></a>
  </div>

  <script>
    function showMore() {
      document.getElementById('text-content').innerText = 'Hehehe';
      document.getElementById('read-more').style.display = 'none';
    }
  </script>
@endsection

