<?php
namespace App;
/**
 * 
 */
class RepChatfuel
{

	private $json = [];

	
	function __construct()
	{

	}

	public function Message($add)
	{
		$this->json['messages'][] = $add;
	}

	public function addMessage($arrayMsg)
	{
		$retMessage = null;

		if(is_array($arrayMsg)) {
			foreach ($arrayMsg as $ms) {
				$retMessage['text'] = $ms;
			}
		} else {
			$retMessage = ["text" => $arrayMsg];
		}

		$this->Message($retMessage);
		return $this;
	}

	public function addVideo($directorys)
	{
		$retMessage = null;

		if(is_array($directorys)) {
			foreach ($directorys as $directory) {
				$retMessage["attachment"] = ['type' => 'video', 'payload' => ['url' => $directory]];
			}
		} else {
			$retMessage["attachment"] = ['type' => 'video', 'payload' => ['url' => $directorys]];
		}

		$this->Message($retMessage);
		return $this;
	}

	public function addImage($directorys)
	{
		$retMessage = [];
		if(is_array($directorys)) {
			foreach ($directorys as $directory) {
				$retMessage["attachment"] = ['type' => 'image', 'payload' => ['url' => $directory]];
			}
		} else {
			$retMessage["attachment"] = ['type' => 'image', 'payload' => ['url' => $directorys]];
		}

		$this->Message($retMessage);
		return $this;
	}

	public function addAudio($directorys)
	{
		$retMessage = [];
		if(is_array($directorys)) {
			foreach ($directorys as $directory) {
				$retMessage["attachment"] = ['type' => 'video', 'payload' => ['url' => $directory]];
			}
		} else {
			$retMessage["attachment"] = ['type' => 'video', 'payload' => ['url' => $directorys]];
		}

		$this->Message($retMessage);
		return $this;
	}

		public function addQuickReplies($Msg , $arrayQuality)
	{
		$retMessage = [];

		$retMessage['text'] = $Msg;

		if(is_array($arrayQuality)) {

			$arrayBtn = [];

			foreach ($arrayQuality as $ms) {
				$arrayBtn[] = [
							'title' => $ms,
							'block_names' => ["get$ms"]
						];
			}

			$retMessage['quick_replies'] = $arrayBtn;

		} else {
			$retMessage = ["text" => $arrayMsg];
		}

		$this->Message($retMessage);
		return $this;
	}

	public function addGalery($arrays)
	{



		$elements = [];

		foreach ($arrays as $array) {   
     

			$set_attr = [
				 $array['attributes_name'] => $array['attributes_value']
			];

			$btn[] = [
					'type' => "show_block",
                	"block_names" => [$array['block_names']],
	                "title" => $array['block_title'],
	                "set_attributes" => $set_attr
	        ];

			$elements[] = [
				'title' => $array['title']  ,
                'image_url' => $array['image_url'],
                "subtitle" => $array['subtitle'],
                'buttons' => $btn
			];
		}

		$payload = [
			"template_type"=>"generic",
            "image_aspect_ratio" => "square",
            "elements" => $elements
		];

		$return = [
			"type" => "template",
			"payload" => $payload
		];

		$send['attachment'] = $return;

		$this->json['messages'][] = $send;
	}


	public function reponse()
	{
		return json_encode($this->json);
	}
}
