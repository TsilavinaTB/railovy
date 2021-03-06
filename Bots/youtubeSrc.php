<?php
/*
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
*/

    define("MAX_RESULTS", 10);

require '../vendor/autoload.php';

use App\RepChatfuel;
    
     if (isset($_POST['submit']) )
     {
        $keyword = $_POST['keyword'];
               
        if (empty($keyword))
        {
            $response = array(
                  "type" => "error",
                  "message" => "Please enter the keyword."
                );
        } 
    }
         
?>


        
        <?php if(!empty($response)) { ?>
                <div class="response <?php echo $response["type"]; ?>"> <?php echo $response["message"]; ?> </div>
        <?php }?>
        <?php
  
            if (isset($_POST['submit']) )
            {
                                         
              if (!empty($keyword))
              {
                $apikey = 'AIzaSyDjhgRuytpzwY7qYpEfplax6dUATRQ_B_s'; 
                $googleApiUrl = 'https://www.googleapis.com/youtube/v3/search?part=snippet&q=' . $keyword . '&maxResults=' . MAX_RESULTS . '&key=' . $apikey;

                $ch = curl_init();

                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($ch, CURLOPT_VERBOSE, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $response = curl_exec($ch);

                curl_close($ch);
                $data = json_decode($response);
                $value = json_decode(json_encode($data), true);
            ?>
{
 "messages": [
    {
      "attachment":{
        "type":"template",
        "payload":{
          "template_type":"generic",
          "image_aspect_ratio": "square",
          "elements":[

            <?php
                $json = new RepChatfuel();
                  $sr = [];
                for ($i = 0; $i < MAX_RESULTS; $i++) {
                    $img = $value['items'][$i]['snippet']['thumbnails']['default']['url'];
                    $videoId = $value['items'][$i]['id']['videoId'];
                    $title = $value['items'][$i]['snippet']['title'];
                    $description = $value['items'][$i]['snippet']['description'];
                    $videoUrl= " https://www.youtube.com/watch?v=".$videoId;
                    
                    if($i>0){echo ' ,';}
               
?>
            {
              "title":"<?=$title?>",
              "image_url":"<?=$img?>",
              "subtitle":"<?=$description?>",
              "default_action": {
                "type": "web_url",
                "url": "https://rockets.chatfuel.com/store"
              },
              "buttons":[
                {
                  "type": "show_block",
                  "block_names": ["get Resolution"],
                  "title": "Telecharger",
                   "set_attributes": {"url": "<?=$videoUrl?>"}
                }
              ]
            }

<?php
                    }
?>
          ]
        }
      }
    }
  ]
}
<?php
                } 
           
            } else {
                          ?> 
        
              <h2>Search Videos by keyword using YouTube Data API V3</h2>
               <

class="search-form-container">
            <form id="keywordForm" method="POST" action="">
                <div class="input-row">
                    Search Keyword : <input class="input-field" type="search" id="keyword" name="keyword"  placeholder="Enter Search Keyword">
                </div>

                <input class="btn-submit"  type="submit" name="submit" value="Search">
            </form>
            </div>
        
            <?php
            }
            ?> 
            
      
