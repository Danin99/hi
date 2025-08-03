@section('meta')
<meta property="og:image" content="{{ asset('assets/images/favicon.jpg') }}" />
<meta property="og:site_name" content="{{config('dummy.website.title')}}" />
<meta property="og:title" content="{{config('dummy.website.title')}}" />
<meta name="description" content="{{config('dummy.website.title')}}">
<meta name="keywords" content="{{config('dummy.website.title')}}">

@yield('shared')
<title>{{ $title }} {{config('dummy.website.title')}}</title>

@endsection
