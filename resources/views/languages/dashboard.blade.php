@extends('layouts.master')

@section('title')
    Languages
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Already set language pairs -->
            <div class="col-md-6
                @if($errors->any() OR !$languagePairs)
                    opacity--half opacity__hover--full
                @endif
                    ">
                <div class="panel panel-default">
                    <div class="panel-heading">Select languages</div>
                    <div class="panel-body">

                        @if(session()->has('success'))
                            @if(session('success'))
                            <div class="alert alert-hide alert-success">
                                {{ session('success') }}
                            </div>
                            @endif
                        @endif
                        <small>Select one of your already set language pairs</small>
                    </div>

                    <ul class="list-group">
                        @foreach($languagePairs as $languagePair)
                            <li class="list-group-item">
                                <a href="{{ url('/languages', $languagePair['id']) }}">
                                    <div class="row">
                                        <div class="col-xs-5 text-center">
                                            <strong>{{ $languagePair[0]['term'] }}</strong></div>
                                        <div class="col-xs-1 text-center"><i class="fa fa-exchange"></i></div>
                                        <div class="col-xs-5 text-center">
                                            <strong>{{ $languagePair[1]['term'] }}</strong></div>
                                        <div class="col-xs-1 text-center"><span class="badge">4</span></div>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>

                </div>
            </div>
            <!-- Set new language pairs -->
            <div class="col-md-6
                @if(!$errors->any() AND $languagePairs)
                    opacity--half opacity__hover--full
                @endif
                    ">
                <div class="panel panel-default">
                    <div class="panel-heading">Set new languages</div>
                    <div class="panel-body">
                        @if($errors->any())
                            <ul class="alert alert-hide alert-danger">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <small><p>It has got boring? Time for a change? Then just type in the language pair you would
                                like to start learning next.</p></small>

                        {!! Form::open(['url' => 'languages', 'class' => 'form-horizontal', 'role' => 'form']) !!}
                        {{--<form class="form-horizontal" role="form" method="POST" action="{{ url('/languages/') }}">--}}
                        {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}

                        <div class="form-group">
                            <div class="col-xs-5 text-center">
                                <select class="form-control" name="language_id">
                                    <option value="">Choose language</option>
                                    @foreach($languages as $language)
                                        <option value="{{ $language->id }}"
                                        @if(old('language_id') == $language->id)
                                                selected="selected"
                                                @endif
                                                >{{ $language->term }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xs-2 text-center">
                                <i class="fa fa-exchange fa-2x"></i>
                            </div>
                            <div class="col-xs-5 text-center">
                                <select class="form-control" name="related_id">
                                    <option value="">Choose language</option>
                                    @foreach($languages as $language)
                                        <option value="{{ $language->id }}"
                                        @if(old('related_id') == $language->id)
                                                selected="selected"
                                                @endif
                                                >{{ $language->term }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12 text-center">
                                {!! Form::submit('Add new language pair', ['class' => 'btn btn-primary btn-block']) !!}
                            </div>
                            <div class="col-xs-12 text-center">
                                <a href="#" class="btn btn-link btn-block">Request new languages</a>
                            </div>
                        </div>
                        {{--</form>--}}


                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('footer')
    <script>
        $(function () {
            $('.alert-hide').delay(4000).fadeOut('slow');
        });
    </script>
@stop