<?php

include('../templates/header.php');


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


error_reporting(E_ALL);
ini_set('display_errors', 1);

$prompt = $_POST['prompt'] ?? 'Say Hello World';

$data = [
    "model" => "gpt-4",
    "messages" => [
        ["role" => "user", "content" => $prompt]
    ]
];

$ch = curl_init('https://api.openai.com/v1/chat/completions');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer sk-proj-....'
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
$response = curl_exec($ch);
curl_close($ch);

$json = json_decode($response, true);
echo $json["choices"][0]["message"]["content"] ?? "Error parsing response";

include('../templates/footer.php');
?>
</body>
</html>