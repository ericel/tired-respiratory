 <script src="//platform-api.sharethis.com/js/sharethis.js#property=58df35b083b6f0001198d8cf&product=sticky-share-buttons"></script>
 <div class="row ">
            <div class="col s12 m8">
                <md-card class="mat-card video">
            <div id="mediaplayer"></div>
            <div class="video-details row">
            <div class="col s12 m8">
                <hi class="title video-title"><i class="material-icons left orange-text">title</i> {{$video->filename}} <span class="views new badge" data-badge-caption="Views">{{$video->fileViews}}</span></hi>
                <p class="details video-description"><i class="material-icons left orange-text">description</i> {{$video->fileDesc}}</p>
            </div>
                <div class="col s12 m4">
                    <i class="material-icons left orange-text">schedule</i> {{$video->created_at}}
                </div>
            </div>
            </md-card>
        <div class="row home">
            @foreach ($videospopular as $videop)
            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image ">
                    <img class="activator" src="{{resource_url($videop->fileImg)}}">
                    <span class="card-title activator">{{substr($videop->filename, 0, 50)}}</span>
                    <a class="btn-floating halfway-fab waves-effect waves-light red" href="{{Str::slug("$videop->filename")}}-{{$videop->fileID}}"><i class="material-icons">play_arrow</i></a>
                    </div>
                    <div class="card-content">
                    <p>{{substr($videop->fileDesc, 0, 50)}}..</p>
                    </div>
                    <div class="card-action">
                    <a href="{{Str::slug("$videop->filename")}}-{{$videop->fileID}}"><i class="material-icons left">link</i> <span class="left"><!--{{$videop->rating}}--></span></a>
                    <a href="{{Str::slug("$videop->filename")}}-{{$videop->fileID}}"><i class="material-icons right">face</i> <span class="right">{{$videop->fileViews}}</span></a>
                    </div>
                </div>
            </div>
            @endforeach
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
            </div>
        </div>
  <script type="text/javascript">
     jwplayer('mediaplayer').setup({
         'image': '{{resource_url($video->fileImg)}}',
          'file': 'http://weytindey.dev/assets/{{$video->file}}',
          'id': 'mediaplayer'
      });
</script>       
