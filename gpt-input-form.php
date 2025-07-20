

<?php include('../templates/header.php'); ?>

<br>
<?php
// choose visitor language, e.g. en | fi | fr | ru


define('SITE_ROOT', dirname(__DIR__));          // /home/users/.../raikkulenz.kapsi.fi
define('I18N_PATH', SITE_ROOT . '/language_json/');

$strings = json_decode(
    file_get_contents(I18N_PATH . 'languages_gpt.json'),
    true
);
function t1(string $id): string
{
    global $strings, $lang;
    return htmlspecialchars($strings[$lang][$id] ?? '', ENT_QUOTES, 'UTF-8');
}

?>
<br>

  <h2><?= t1('gpt5') ?></h2>
  <br>
  <p><?= t1('gpt6') ?></p>
  <br>
  <form action="gpt-curl-form-response.php" method="POST">
    <input type="text" name="prompt" placeholder=<?= t1('gpt7') ?> size="50">
    <button type="submit"><?= t1('gpt3') ?></button>
  </form>

<?php  include('../templates/footer.php'); ?>



</body>
</html>

