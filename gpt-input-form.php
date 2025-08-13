

<?php include('../templates/header.php'); 
// Titles in multiple languages
echo '<title lang="en">ChatGPT Inquiry Form</title>';
echo '<title lang="fi">ChatGPT Kyselylomake</title>';
echo '<title lang="fr">Formulaire de Demande ChatGPT</title>';

// Description in multiple languages
echo '<meta name="description" lang="en" content="Anonymously ask any question through this web page and receive a response from ChatGPT.">';
echo '<meta name="description" lang="fi" content="Esitä kysymyksesi nimettömästi tämän verkkosivun kautta ja saat vastauksen ChatGPT:ltä.">';
echo '<meta name="description" lang="fr" content="Posez anonymement n\'importe quelle question via cette page web et recevez une réponse de ChatGPT.">';

// Keywords in multiple languages
echo '<meta name="keywords" lang="en" content="ChatGPT, anonymous question, quick response, form">';
echo '<meta name="keywords" lang="fi" content="ChatGPT, anonyymi kysymys, nopea vastaus, lomake">';
echo '<meta name="keywords" lang="fr" content="ChatGPT, question anonyme, réponse rapide, formulaire">';

?>

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
  <form enctype="multipart/form-data" action="gpt-curl-form-response.php" method="POST">


   <textarea name="prompt" rows="5" style="width: 80vw;"></textarea>

    <br><?= t1('gpt8') ?><br>
    <input name="filetto" type="file"><br>

    <button type="submit"><?= t1('gpt3') ?></button>
  </form>

<?php  include('../templates/footer.php'); ?>



</body>
</html>

