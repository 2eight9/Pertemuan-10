<?php 

class GetPost {
    public function curl($url, array $headers, $method = 'POST', $postfield = false, $useragent = false) 
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        if($method == 'POST' AND $postfield !== false) {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postfield);
        }
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        // curl_setopt($ch, CURLOPT_VERBOSE, TRUE);
        // curl_setopt($ch, CURLOPT_PROXY, "36.94.126.50:1080");
        // curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
        if($useragent !== false) {
            curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
        }
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
        // <span class="highlight" id="network-name">Running Text</span>
        if(preg_match('<p id="problem-description">(.*?)</p>', $result, $undangan)) {
            return $undangan[1];
        }else{
            preg_match('<span class="highlight" id="network-name">(.*?)</span>', $result, $undanganLive);
            return $undanganLive[1];
        }
        
        // print_r($result);
    }

    public function generateRandomString($length = 6) 
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function userAgent() 
    {
        $read = file("user-agent.txt");
        $rand = array_rand($read, 3);
        return $read[$rand[0]];
    }
    
}

$get = new GetPost;
// echo $random . ' - ' . $getUndangan . PHP_EOL;
$i = 0;
while(true) {
    $agent = $get->userAgent();
    $i++;
    $random = $get->generateRandomString(6);
    // echo $random;
    $getUndangan = $get->curl("https://market.tapp.fi/app/networks/invitation/" . $random, 
    [
        'Connection: keep-alive',
        // 'Accept-Language: q=0.9,en-US;q=0.8,en;q=0.7',
        // 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,/;q=0.8,application/signed-exchange;v=b3;q=0.9',
        // 'Cookie: NRgYn0P9FeHbcZcemsf8nk9O=1b8268dd38ff42d39c93dc51ce2d61aa; rNAlEenVA0fu90AumX=wOOMKdZYUeks1sYW9U8OGHGYLk7mfYMQA6Oul%2B7Irm8U176SU0l2O1I1HOHk8h2d3RQTAPlpN1scGuCuqp0eXKV0mWWe3RQM609tsuY6sO%2FoErUtm7lsuaVHFROQS%2Bu4dgHtmTj8abNn5431WIOi828GLtvExFf4C5vlQZtpodRsYKE%2Bd2I8zM3XRXeGDHTbuv5IOq9FJ0u2fPhso%2B5U8A%3D%3D--0TJqk6YEVybBbS5t7%2BYKPvYjZz%2BfUqqdouk44yNx1Gs%3D; _ga=GA1.2.1716486154.1628148412; _gid=GA1.2.356566380.1628148412'
    ], 'GET', 0, $agent);
    
    if (!function_exists('str_contains')) {
    function str_contains(string $haystack, string $needle): bool {
        return '' === $needle || false !== strpos($haystack, $needle);
    }
}
     if(str_contains($getUndangan, "Undangan yang valid tidak")) {
        echo $i . '. ' . $random . ' ' . $getUndangan . PHP_EOL;
     }else{
         echo $random . ' - ' . $getUndangan . PHP_EOL;
         file_put_contents('res.txt',"https://market.tapp.fi/app/networks/invitation/$random - $getUndangan"  .PHP_EOL,FILE_APPEND);
     }

}
