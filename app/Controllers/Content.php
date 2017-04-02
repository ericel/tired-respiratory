<?php
namespace App\Controllers;
use App\Core\Controller;
use App\Models\Videos;
use Redirect;
use Response;
use View;
use Auth;


class Content extends Controller
{
   public function index()
    {
        $message = __('Hello, welcome from the welcome controller! <br/>
this content can be changed in <code>/app/Views/Welcome/Welcome.php</code>');
        return View::make('Content/Index')
            ->shares('title', __('Share videos, music and blogs!'))
            ->shares('description', __('Social videos and music online for free.'))
            ->with('welcomeMessage', $message);
    }
    
    

    public function addVideo()
    {  $message = '';
        $videos = array();
        return View::make('Content/Add/Video')
            ->shares('title', __('Share Social videos'))
            ->shares('description', __('Share Social videos and music online for free.'))
            ->with('welcomeMessage', $videos);
    }

    public function addAudio()
    {
        $message = __('Hello, welcome from the welcome controller! <br/>
this content can be changed in <code>/app/Views/Welcome/Welcome.php</code>');
        return View::make('Content/Add/Audio')
            ->shares('title', __('Upload music'))
            ->shares('description', __('Share Afro music online for free.'))
            ->with('welcomeMessage', $message);
    }

  public function video($vid_title)
    {   
        $vidID =  substr($vid_title, strrpos($vid_title, '-') + 1);
        $video = Videos::find($vidID);
        

        if($video === null) {
            // There is no User with this ID.
            $status = __d('Video', 'video not found: #{0}', $vidID);

            return Redirect::to('admin/users')->withStatus($status, 'danger');
        }
        //Update Views
        $videoupdate = Videos::find($vidID);
        $videoupdate->fileViews = $video->fileViews + 1;
        $videoupdate->save();
        
        //content like
        $VideosPopular = Videos::where('fileViews', '>', 100)->take(6)->orderBy('created_at')->get();
        //video rated
        $videosrated = Videos::where('fileViews', '>', 100)->take(1)->orderBy('rating')->get();
      
        return View::make('Content/Content/Video')
            ->shares('title', __('Watch  '.$video->filename.''))
            ->shares('description', __(''.$video->fileDesc.''))
            ->shares('type', __('movie'))
            ->shares('url', __('https://weytindey.com'))
            ->shares('video', __('https://weytindey.com/assets/'.$video->file.''))
            ->shares('image', __('https://weytindey.com/assets/'.$video->fileImg.''))
            ->with('video', $video)
            ->with('videospopular', $VideosPopular)
            ->with('videosrated', $videosrated);
    }

  public function audio($aud_title)
    {
        $message = __('Hello, welcome from the welcome controller! <br/>
this content can be changed in <code>/app/Views/Welcome/Welcome.php</code>');
        return View::make('Content/Content/Audio')
            ->shares('title', __('Upload music'))
            ->shares('description', __('Share Afro music online for free.'))
            ->shares('image', __('Share Afro music online for free.'))
            ->with('welcomeMessage', $message);
    }

    public function store(){
        $upload_result = '';  
        $valid_file_formats = array("avi", "flv", "wmv", "mp4", "mov", "mp3", "ogg", "acc", "m4a", "wma", "flac", "wav");
        $valid_file_formats_audio = array("mp3", "ogg", "acc", "m4a", "wma", "flac", "wav");
        $valid_file_formats_video = array("avi", "flv", "wmv", "mp4", "mov");
        if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
        {
                $name = $_FILES['file-b']['name'];
                $size = $_FILES['file-b']['size'];
                $filename = pathinfo($name, PATHINFO_FILENAME);

       if(strlen($name)) {
                list($txt, $ext) = explode(".", $name);
       if(in_array($ext,$valid_file_formats)) {
        if($size<(100000*100000)) {
                $vidID = substr(md5(time()+$filename), 0, 11);
                $video_name = $vidID.".".$ext;
                $tmp = $_FILES['file-b']['tmp_name'];
           if(in_array($ext,$valid_file_formats_video)){
                  $path = ROOTDIR ."assets/uploads/videos/";
           }
            if(in_array($ext,$valid_file_formats_audio)){
                  $path = ROOTDIR ."assets/uploads/audios/";
           }
         if($filename !== '' || $vidID !== ''){
           if(move_uploaded_file($tmp, $path.$video_name)){
                //Add to database
                $postTitle = $filename;
                $postDesc = $filename;
                $postID = $vidID;
                if($postTitle == '' || $postDesc == '' || $postID == ''){
                       $error = 'All fields  are  required';
                } else {
                $video = new Videos;
                $video->filename = $postTitle;
                $video->fileID = $postID;
                $video->fileDesc = $postDesc;
                $video->username = Auth::user()->username;
                $video->fileImg = 'uploads/videos/thumbnails/'.$vidID.'.jpg';
                $video->file = 'uploads/videos/'.$video_name.'';
                $video->fileExt = $ext;
                $video->rating = 1;
                $video->save();
                }
                // End Database adding
                $upload_result .= '<div class="row"><div class="cyan lighten-5">File Successfully Uploaded</div>';
                $upload_result .= '<div class="cyan lighten-5">Click Here to Watch Video : <a href="">http://weytindey.dev/video/'.$filename.'-'.$vidID.'</a></div></div>';
                if(in_array($ext,$valid_file_formats_video)){
                  $video = $path . escapeshellcmd($video_name);
                  $cmd = "ffmpeg -i $video 2>&1";
                  $second = 1;
                  if (preg_match('/Duration: ((\d+):(\d+):(\d+))/s', `$cmd`, $time)) {
                       $total = ($time[2] * 3600) + ($time[3] * 60) + $time[4];
                       $second = rand(5, ($total - 1));
                       //rand(1, ($total - 1))
                       //screenshot size
                       $size = '320x240';
                  }
                  $image  = ROOTDIR .'assets/uploads/videos/thumbnails/'.$vidID.'.jpg';
                  $cmd = "ffmpeg -i $video -deinterlace -an -ss $second -f mjpeg -t 1 -r 1 -y -s $size $image 2>&1";    
                  //$cmd = "ffmpeg -i $video -deinterlace -an -ss $second -t 00:00:01 -r 1 -y -vcodec mjpeg -f mjpeg $size $image 2>&1";
                  $do = `$cmd`;
               }
                if(in_array($ext,$valid_file_formats_audio)){
                     $upload_result .= '<audio controls><source src="http://weytindey.dev/assets/uploads/audios/'.$video_name.'" type="audio/'.$ext.'">
                     Your browser does not support the audio element.</audio>';
                }
                if(in_array($ext,$valid_file_formats_video)){
                     $upload_result .= '<video width="320" height="240" controls>
                        <source src="http://weytindey.dev/assets/uploads/videos/'.$video_name.'" type="video/'.$ext.'">
                        Your browser does not support the video tag.
                        </video>';
                }
                $upload_result .= '
                <div  class="mar-15 row">
                <div class="cyan lighten-5">
                        <div id="previewContent" class="color-primary"></div>
                        Edit Uploaded file Information
                <form class="col s12" id="contentForm" method="POST"
                action="'.site_url('add/update').'"
                >
                   <div class="input-field col s12">
                   <label for="filename">Filename</label><br>
                     <input  id="filename" name="filename" type="text" class="validate" value="'.$filename.'">
                   </div>
                   <div class="input-field col s12">
                   <label for="vid-desc">Describe Video</label><br>
                     <textarea id="vid-desc" name="vid-desc" class="materialize-textarea">'.$filename.'</textarea>
                     
                   </div>
                        <input type="hidden" name="video-ID" id="video-ID" value="'.$vidID.'"> 
                        <button type="submit" class="btn btn-primary" name="submit">Click Here to Update Uploaded Content</button>
                </form>
                <div class="clearfix"></div>
                </div>
                </div>
                ';
                echo $upload_result;
        } else
          echo "Video Upload failed";
        } else
          echo '<div class="red lighten-1">Video Upload failed, Try again or use another file!</div>';
        } else
          echo "Video file size maximum 1 MB";
        } else
        echo "Invalid file format";
        } else
        echo "Please select image";
        exit;
        }
        
    }

  public function UpdateFileContent()
    {
        if(isset($_POST) and isset($_POST['submit']))
         {
         $postTitle = $_POST['filename'];
	       $postDesc = $_POST['vid-desc'];
         $postID = $_POST['video-ID'];

        if($postTitle == '' || $postDesc == '' || $postID == ''){
			    $error = 'All fields  are  required';
        } else {
                            $video =  Videos::find($postID);
                            $video->filename = $postTitle;
                            $video->fileDesc = $postDesc;
                            $video->save();
                            $status = __('Product does not exist.');
                            return Redirect::to('add/video')->withStatus($status, 'danger');
                    }
              }
  
    }

  public function file(){
    
  }
}
?>