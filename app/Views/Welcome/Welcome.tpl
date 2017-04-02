<div class="row content">
    <div class="col s12 m8">
       
       <div class="row home">
       @foreach ($videos as $video)
        <div class="col s12 m4">
            <div class="card">
                <div class="card-image ">
                <img class="activator" src="{{resource_url($video->fileImg)}}">
                <span class="card-title activator">{{substr($video->filename, 0, 50)}}</span>
                <a class="btn-floating halfway-fab waves-effect waves-light red" href="video/{{Str::slug("$video->filename")}}-{{$video->fileID}}"><i class="material-icons">play_arrow</i></a>
                </div>
                <div class="card-content">
                <p>{{substr($video->fileDesc, 0, 50)}}..</p>
                </div>
                <div class="card-action">
                <a href="video/{{Str::slug("$video->filename")}}-{{$video->fileID}}"><i class="material-icons left">link</i> <span class="left"><!--{{$video->rating}}--></span></a>
                <a href="video/{{Str::slug("$video->filename")}}-{{$video->fileID}}"><i class="material-icons right">face</i> <span class="right">{{$video->fileViews}}</span></a>
                </div>
            </div>
        </div>
        @endforeach
        {{ $videos-> links() }}
        

       </div>



    </div>
    <div class="col s12 m4">
     
      <md-card class="mat-card">
          <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- responUnit -->
            <ins class="adsbygoogle"
                style="display:block"
                data-ad-client="ca-pub-2243338195594977"
                data-ad-slot="7979162777"
                data-ad-format="auto"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
      </md-card>
        @foreach ($videosrated as $videorated)
            <div class="card">
                    <div class="card-image ">
                    <img class="activator" src="{{resource_url($videorated->fileImg)}}">
                    <span class="card-title activator">{{substr($videorated->filename, 0, 50)}}</span>
                    <a class="btn-floating halfway-fab waves-effect waves-light red" href="{{Str::slug("$videorated->filename")}}-{{$videorated->fileID}}"><i class="material-icons">play_arrow</i></a>
                    </div>
                    <div class="card-content">
                    <p>{{substr($videorated->fileDesc, 0, 50)}}..</p>
                    </div>
                    <div class="card-action">
                    <a href="{{Str::slug("$videorated->filename")}}-{{$videorated->fileID}}"><i class="material-icons left">link</i> <span class="left"><!--{{$videorated->rating}}--></span></a>
                    <a href="{{Str::slug("$videorated->filename")}}-{{$videorated->fileID}}"><i class="material-icons right">face</i> <span class="right">{{$videorated->fileViews}}</span></a>
                    </div>
              </div>
         
            @endforeach
       <md-card class="mat-card">
          <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- blogle -->
            <ins class="adsbygoogle"
                style="display:block"
                data-ad-client="ca-pub-2243338195594977"
                data-ad-slot="7581452770"
                data-ad-format="auto"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
      </md-card>
      <md-card class="mat-card">
          <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- anotherAds -->
            <ins class="adsbygoogle"
                style="display:block"
                data-ad-client="ca-pub-2243338195594977"
                data-ad-slot="8059130774"
                data-ad-format="auto"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
      </md-card>
    </div>
</div>
