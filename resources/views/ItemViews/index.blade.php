@php
    if(\Illuminate\Support\Facades\Auth::user()->role->name !="user")
        $ext = 'layouts.adm';
    else
        $ext = 'layouts.app';
@endphp

@extends($ext)

{{--@extendsfirst(['layouts.adm','layouts.user']);--}}

@section('content')

    @if($categories != null)
    @foreach($categories as $cat)
    <div class="fashion_section">
        <div id="main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <h1 class="fashion_taital">{{$cat->{"name_".app()->getLocale()} }}</h1>
                        <div class="fashion_section_2">
                            <div class="row">

                                @foreach($cat->items as $item)
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="box_main">
                                            <h4 class="shirt_text">{{$item->title}}</h4>
                                            <p class="price_text">{{__('myTexts.price') }}<span
                                                    style="color: #262626;"> $ {{$item->price}}</span></p>
                                            <div class="tshirt_img"><img src="{{asset($item->img)}}"></div>
                                            <div class="btn_main">
                                                @can('delete', $item)
                                                <div class="buy_bt">
                                                    <form action="{{route('items.destroy', $item->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" type="submit">{{__('myTexts.del') }}</button>
                                                    </form>
                                                </div>


                                                <div class="buy_bt"><a href="{{route('items.edit', $item->id)}}">{{__('myTexts.edit') }}</a>

                                                </div>
                                                @endcan
                                                <div class="seemore_bt"><a href="{{route('items.show', $item->id)}}">{{__('myTexts.show') }}</a></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>

    </div>

    @endforeach
    @endif

@endsection

