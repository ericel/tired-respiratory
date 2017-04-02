<div class="addcontent">
 <md-card class="mat-card">
 <div class="icon-header color-primary"><i class="fa fa-headphones fa-5x" aria-hidden="true"></i></div>
  <h1>Click Below to Upload Audio File!</h1>
   <input type="file" id="file-b" accept="audio/*"  style="display:none;" (change)="upload()">
   <div class="color-gray upload"><label for="file-b"><i class="fa fa-upload fa-5x" aria-hidden="true"></i></label></div>
   <div class="martop-30 list-group">
    <a href="{{site_url('add/video')}}" class="list-group-item ">
      <h4 class="list-group-item-heading color-primary">Upload a Short Social Video</h4>
      <p class="list-group-item-text">Social videos can be of any form, from comedy, drama. Anything attention grapping.</p>
    </a>
    <a href="{{site_url('add/blog')}}" class="list-group-item  disabled">
      <h4 class="list-group-item-heading color-primary">Write a Blog (coming soon...)</h4>
      <p class="list-group-item-text">Still working on it! Will be Avaible soon!</p>
    </a>
  </div>
   </md-card>
  </div>
</div>