<md-card class="mat-card">
  <div class="row">
   <div class="col s12 m12">
     {{$status}}
       @foreach ($searchresults as $search)
       <div class="row">
           <div class="col s12 m2">
               <md-card class="mat-card">
                  <img class="search-img" src="{{resource_url($search->fileImg)}}" alt="{{$search->filename}}">
               </md-card>
           </div>
           <div class="col s12 m10">
              <div class="search-results">
               <h1><a href="video/{{Str::slug("$search->filename")}}-{{$search->fileID}}"> {{$search->filename}}</a></h1>
               <p>{{$search->fileDesc}}</p>
                <div class="card-action innertube">
                    <a href="video/{{Str::slug("$search->filename")}}-{{$search->fileID}}"><i class="material-icons left">face</i> <span class="left">{{$search->fileViews}}</span></a>
                </div>
            </div>
           </div>
       </div>
          @endforeach
          {{ $searchresults-> links() }}
     </div>
  </div>
</md-card>