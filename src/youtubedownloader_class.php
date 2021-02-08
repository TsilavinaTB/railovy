<?php

/* 
  Class: YoutubeDownloader v1.1 (woooow :P)
  Author: evolution (evolution@darkedition.com)
  Date: 13.12.08
  License: http://www.opensource.org/licenses/gpl-license.html
*/ 

class YouTubeDownloader {
	
	public  $dir ="./"; //kendinize göre değiştirin. 

	private $info = array();
	private $content; 
	private $urL; 
	private $file_name;

	/*-------------------------------------------------------------------*/
	public function __construct()
	{
		if(!extension_loaded("cURL")){
		echo "cURL : extension not found.";
		exit();
		}
	}
	/*-------------------------------------------------------------------*/
	private function content($url)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		$this->content = curl_exec($ch);
		curl_close($ch);
	}
	/*-------------------------------------------------------------------*/
	private function _url($url)
	{
		$this->content($url);
		
		preg_match('/"video_id": "(.*?)"/',$this->content,$video_id);
		preg_match('/"t": "(.*?)"/', $this->content,$t);
		
		$this->urL  = "http://www.youtube.com/get_video?video_id=";
		$this->urL .= $video_id[1];
		$this->urL .= "&t=";
		$this->urL .= $t[1];

		preg_match('/<h1 >(.*?)<\/h1>/', $this->content,$head);
		$this->file_name = strtr($head[1]," ","_");
	}
	/*-------------------------------------------------------------------*/

	public function download($url)
	{
		// http://www.youtube.com/get_video?video_id=xxxxxx&t=xxxxxxxxxx
		$ch = curl_init();
		//coklu lınk ıcın donguye sokuluyor..
		for($j=0;$j<= count($url)-1;$j++)
		{ //dizi olarak gelen url listesi download ediliyor..
		    if(is_array($url)) $this->_url($url[$j]); //çoklu 
		    else $this->_url($url); //tekli

		    if(!$fp = @ fopen($this->dir.DIRECTORY_SEPARATOR.$this->file_name.".flv","w")){
		    echo "Permission denied";
		    exit();
		    }

		    curl_setopt($ch, CURLOPT_URL, $this->urL);
		    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);	
		    curl_setopt($ch, CURLOPT_FILE, $fp);
		    curl_exec ($ch);
		    //bilgi kullanılmak istenirse =)
		    $this->info[$j] = curl_getinfo($ch);
		}
		curl_close($ch);
		fclose($fp);
	}
	/*-------------------------------------------------------------------*/	
	public function getinfo(){ return $this->info; }
	/*-------------------------------------------------------------------*/
}


