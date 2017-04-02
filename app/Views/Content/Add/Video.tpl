<div class="addcontent">

 <md-card class="mat-card">
 <div class="icon-header color-primary"><i class="fa fa-video-camera fa-5x" aria-hidden="true"></i></div>
  <h1>Click Below to Upload Video File!</h1>
  <div id='preview'></div>
  <form id="image_upload_form" method="post" enctype="multipart/form-data"  
       autocomplete="off"
       action='{{site_url('add/store') }}'
    >
  <input type="file" name="file-b" id="file-b"   style="display:none;" >
   <div class="color-gray upload"><label for="file-b"><i class="material-icons">file_upload</i></label></div>
 </form>
  <!--If File selected video/**-->

  <ul class="collection">
    <li class="collection-item avatar">
      <a href="{{site_url('add/audio')}}"><i class="material-icons circle">folder</i>
      <span class="title color-primary">Share Mp3 Music</span>
      <p>Share your music online fast and easy. Only you can grant download right to your shared files.
      </p>
      
      </a>
    </li>
    <li class="collection-item avatar">
    <a href="{{site_url('add/blog')}}">
    <i class="material-icons circle green">insert_chart</i>
      <span class="title">Write a Blog (coming soon...)</span>
      <p>Still working on it! Will be Avaible soon!
      </p>
     </a>
    </li>
  </ul>
  
   </md-card>
  </div>
</div>
