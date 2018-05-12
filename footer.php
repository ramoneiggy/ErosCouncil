<br><br><br>
<footer class="container-fluid text-center fixed-bottom">
  <!-- dodajte si linkove ako želite -->
    <p>
      &copy; 
      <?php
      $fromYear = 2018; 
      $thisYear = (int)date('Y'); 
      echo $fromYear . (($fromYear != $thisYear) ? '-' . $thisYear : '');?> @ <a class="link-white" href="index.php">pornReview.com</a>
    </p>
</footer>

</body>

</html>