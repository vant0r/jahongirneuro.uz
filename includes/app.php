<?php
declare(strict_types=1);

const APP_ROOT = __DIR__ . '/..';

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_set_cookie_params(['httponly'=>true,'secure'=>!empty($_SERVER['HTTPS'])&&$_SERVER['HTTPS']!=='off','samesite'=>'Lax']);
    session_start();
}
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: SAMEORIGIN');
header('Referrer-Policy: strict-origin-when-cross-origin');
header('Permissions-Policy: camera=(), microphone=(), geolocation=()');

function json_data(string $file,array $fallback=[]):array{$path=APP_ROOT.'/data/'.$file;if(!is_file($path))return $fallback;$data=json_decode((string)file_get_contents($path),true);return is_array($data)?$data:$fallback;}
function h(mixed $value):string{return htmlspecialchars((string)$value,ENT_QUOTES,'UTF-8');}
function csrf_token():string{if(empty($_SESSION['public_csrf']))$_SESSION['public_csrf']=bin2hex(random_bytes(32));return(string)$_SESSION['public_csrf'];}
function csrf_valid(string $token):bool{return $token!==''&&!empty($_SESSION['public_csrf'])&&hash_equals((string)$_SESSION['public_csrf'],$token);}
function media_items():array{$data=json_data('media.json',['items'=>[]]);return is_array($data['items']??null)?$data['items']:[];}
function media_by_category(string $category='',int $limit=99):array{$items=media_items();if($category!=='')$items=array_values(array_filter($items,static fn(array $item):bool=>($item['category']??'')===$category));return array_slice($items,0,$limit);}
function media_src(array $item):string{return '/'.ltrim((string)($item['path']??''),'/');}
function page_title(string $title=''):string{$doctor=json_data('doctor.json');$base=(string)($doctor['name']??'Jahongir Neuro');return h($title!==''?$title.' — '.$base:$base);}
function current_year():string{return date('Y');}
function asset_version(string $path):string{$file=APP_ROOT.'/'.ltrim($path,'/');return is_file($file)?(string)filemtime($file):'1';}
function asset_url(string $path):string{return '/'.ltrim($path,'/').'?v='.asset_version($path);}

$doctor=json_data('doctor.json');
$about=json_data('about.json');
$expertise=json_data('expertise.json',['items'=>[]]);
$research=json_data('research.json',['items'=>[]]);
$contact=json_data('contact.json');
