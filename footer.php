<br><br><br>
<footer class="container-fluid text-center">
  <!-- dodajte si linkove ako želite -->
    <p>
      &copy; 
      <?php
      $fromYear = 2018; 
      $thisYear = (int)date('Y'); 
      echo $fromYear . (($fromYear != $thisYear) ? '-' . $thisYear : '');?> - <a class="link-white" href="index.php"> Ivan</a>, <a class="link-white" href="index.php">Leon</a>, <a class="link-white" href="https://www.isolaja.com"
      >Igor</a> @ <a class="link-white" href="index.php">PornReview.com</a>.
    </p>
</footer>

</body>

</html>