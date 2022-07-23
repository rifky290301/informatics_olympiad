
    @foreach ($data as $item)
            @if ($loop->iteration == 1)
            <div class="col-12 col-lg-8 mb-16">
                <div class="mb-10">
                  <img class="img-fluid w-100 rounded" style="height:400px; object-fit: cover;" src="{{asset('uploads/'.$item->thumbnail)}}" alt="">
                </div>
                <span class="d-inline-block px-2 py-1 small bg-info rounded uppercase text-white">{{$item->category->nama_bidang}}</span>
                
                <h2 class="h3 mb-4">{{$item->judul}}</h2>
                <span class="d-inline-block mb-4 small text-muted">{{\Carbon\Carbon::parse($item->created_at)->format('d M Y')}}</span>
                <p class="mb-4 lead text-muted">{{Str::limit(str_replace("&nbsp;", ' ', strip_tags($item->content)), 100, ' [....]')}}</p>
                <a class="h6" href="{{route('detail_post', [$item->category->slug,$item->slug])}}">Read more</a>
            </div>
            @else
            <div class="col-12 col-lg-4 mb-16">
                <div class="mb-10">
                  <img class="img-fluid w-100 rounded" style="height:400px; object-fit: cover;" src="{{asset('uploads/'.$item->thumbnail)}}" alt="">
                </div>
                <span class="d-inline-block px-2 py-1 small bg-info rounded uppercase text-white">{{$item->category->nama_bidang}}</span>
                <h2 class="h3 mb-4">{{$item->judul}}</h2>
                <span class="d-inline-block mb-4 small text-muted">{{\Carbon\Carbon::parse($item->created_at)->format('d M Y')}}</span>
                <p class="mb-4 lead text-muted">{{Str::limit(str_replace("&nbsp;", ' ', strip_tags($item->content)), 100, ' [....]')}}</p>
                <a class="h6" href="{{route('detail_post', [$item->category->slug,$item->slug])}}">Read more</a>
            </div>
            @endif
          @endforeach
    <div>
        {!! $data->links('paginasi') !!}
    </div>
