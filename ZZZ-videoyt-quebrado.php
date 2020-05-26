<?php
$urls   = array();
$videos = array();
// vimeo test
$urls[] = 'http://vimeo.com/6271487';
$urls[] = 'http://vimeo.com/68546202';
// youtube test
$urls[] = 'https://www.youtube.com/watch?v=xHRkHFxD-xY&list=RD022g5PnydsOrY';
$urls[] = 'https://www.youtube.com/watch?v=Mtn6KqO3RcA&list=RD022g5PnydsOrY';
foreach ($urls as $url) {
    $videos[] = getVideoDetails($url);
}
	function getVideoDetails($url)
	{
	    $host = explode('.', str_replace('www.', '', strtolower(parse_url($url, PHP_URL_HOST))));
	    $host = isset($host[0]) ? $host[0] : $host;
            //Get Vimeo API Key https://developer.vimeo.com/apps
            $vimeo_api_key="";
            $youtube_api_key = "";
            //Get Youtube API Key https://developers.google.com/youtube/v3/getting-started
           

	    switch ($host) {
	        case 'vimeo':
//	            $video_id = substr(parse_url($url, PHP_URL_PATH), 1);
//                   
//				$options = array('http' => array(
//					'method'  => 'GET',
//					'header' => 'Authorization: Bearer '.$vimeo_api_key
//				));
//				$context  = stream_context_create($options);
//
//	            $hash = json_decode(file_get_contents("https://api.vimeo.com/videos/{$video_id}",false, $context));
//	            header("Content-Type: text/plain");
//				//echo $hash->description;
//	            //var_dump($hash);
//	            //exit;
//	            return array(
//	                    'provider'          => 'Vimeo',
//	                    'title'             => $hash->name,
//	                    'description'       => str_replace(array("<br>", "<br/>", "<br />"), NULL, $hash->description),
//	                    'description_nl2br' => str_replace(array("\n", "\r", "\r\n", "\n\r"), NULL, $hash->description),
//	                    'thumbnail'         => $hash->pictures->sizes[0]->link,
//	                    'video'             => $hash->link,
//	                    'embed_video'       => "https://player.vimeo.com/video/" . $video_id,
//	                );
	            break;
	        case 'youtube':

	            preg_match("/v=([^&#]*)/", parse_url($url, PHP_URL_QUERY), $video_id);
	            $video_id = $video_id[1];
							$url_yt = "https://www.googleapis.com/youtube/v3/videos?part=snippet,contentDetails&id=".$video_id."&key=".$youtube_api_key."";
					echo $url_yt;
	            $hash = json_decode(file_get_contents($url_yt));
	            header("Content-Type: text/plain");

				echo $hash->items[0]->snippet->description;
	            // print_r($hash);
	            //exit;
	            return array(
	                    'provider'          => 'YouTube',
	                    'title'             => $hash->items[0]->snippet->title,
	                    'description'       => str_replace(array("", "<br/>", "<br />"), NULL, $hash->items[0]->snippet->description),
	                    'description_nl2br' => str_replace(array("\n", "\r", "\r\n", "\n\r"), NULL, nl2br($hash->items[0]->snippet->description)),
	                    'thumbnail'         => 'https://i.ytimg.com/vi/'.$hash->items[0]->id.'/default.jpg',
	                    'video'             => "http://www.youtube.com/watch?v=" . $hash->items[0]->id,
	                    'embed_video'       => "http://www.youtube.com/embed/" . $hash->items[0]->id,
	                );
	            break;
	    }
	}
header("Content-Type: text/plain");
print_r($videos);