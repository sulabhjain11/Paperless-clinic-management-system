<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
        <script type="text/javascript">
        var abc= 'this is text';
        <?php $abc = "<script>document.write(abc);</script>"?>
        </script>
        <?php echo $abc;?>
  </body>
</html>
