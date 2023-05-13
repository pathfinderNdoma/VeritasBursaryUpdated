<div class="row">
    <div class="col-4"></div>
    <div class="col-4 text-center"><div class="back-to-top" id="backToTopBtn">
      <a href="#" style="color:green; font-weight:bold">
      &#8593; Back to Top</a></div></div>

      <div class="col-4"></div>

  </div>

{{-- JS --}}
  <script>
    //Back to top
    window.addEventListener('scroll', function() {
      var backToTopBtn = document.getElementById('backToTopBtn');
      if (window.scrollY >200) {
        backToTopBtn.style.display = 'block';
      } else {
        backToTopBtn.style.display = 'none';
      }
    });

    document.getElementById('backToTopBtn').addEventListener('click', function() {
      window.scrollTo({top: 0, behavior: 'smooth'});
    });
  //Back to top

  <style>
    /* CSS for the Back to Top button */
    .back-to-top {
      display: none;
      position: fixed;
      bottom: 20px;
      right: 20px;
      cursor: pointer;
      padding: 10px;
      background-color: #000;
      color: #fff;
    }
  </style>
  </script>