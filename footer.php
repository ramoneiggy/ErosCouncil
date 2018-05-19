<br><br><br>
<footer class="container-fluid text-center fixed-bottom">
  <small class="form-text">
    &copy;
    <?php
    $fromYear = 2018;
    $thisYear = (int)date('Y');
    echo $fromYear . (($fromYear != $thisYear) ? '-' . $thisYear : '');?> @ <a class="link-white" href="index.php">eroscouncil.com</a>
  </small>
</footer>

</body>

</html>