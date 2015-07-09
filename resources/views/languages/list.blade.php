@extends('layouts.master')

@section('title')
    {{--{{ $languagePair }}--}}
    Language pair
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Already set language pairs -->
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Select a grade</div>
                    <div class="panel-body">
                        <small>Select one of the five different grades. Zero stars mean the card was not answered even one time correctly. Five stars indicate, the card was five times in a row correctly answered.</small>
                    </div>

                    <ul class="list-group">
                        {{--@foreach($languagePairs as $languagePair)--}}
                            {{--<li class="list-group-item">--}}
                                {{--<a href="#">--}}
                                    {{--<div class="row">--}}
                                        {{--<div class="col-xs-5 text-center"><strong>{{ $languagePair[0]['term'] }}</strong></div>--}}
                                        {{--<div class="col-xs-1 text-center"><i class="fa fa-exchange fa-2x"></i></div>--}}
                                        {{--<div class="col-xs-5 text-center"><strong>{{ $languagePair[1]['term'] }}</strong></div>--}}
                                        {{--<div class="col-xs-1 text-center"><span class="badge">4</span></div>--}}
                                    {{--</div>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                        {{--@endforeach--}}
                    </ul>

                </div>
            </div>
            <!-- Set new language pairs -->
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Set new languages</div>
                    <div class="panel-body">
                        {{--<form class="form-horizontal" role="form" method="POST" action="{{ url('/languages/') }}">--}}
                            {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}

                            {{--<div class="form-group">--}}
                                {{--<div class="col-md-4 col-md-offset-1 col-xs-5 text-center">--}}
                                    {{--<select class="form-control" name="language_id">--}}
                                        {{--<option value="">Choose language</option>--}}
                                        {{--@foreach($languages as $language)--}}
                                            {{--<option value="{{ $language->id }}">{{ $language->term }}</option>--}}
                                        {{--@endforeach--}}
                                    {{--</select>--}}
                                {{--</div>--}}
                                {{--<div class="col-xs-2 text-center">--}}
                                    {{--<i class="fa fa-exchange fa-2x"></i>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-4 col-xs-5 text-center">--}}
                                    {{--<select class="form-control" name="related_id">--}}
                                        {{--<option value="">Choose language</option>--}}
                                        {{--@foreach($languages as $language)--}}
                                            {{--<option value="{{ $language->id }}">{{ $language->term }}</option>--}}
                                        {{--@endforeach--}}
                                    {{--</select>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group">--}}
                                {{--<div class="col-md-10 col-md-offset-1 col-xs-12 text-center">--}}
                                    {{--<input type="submit" class="btn btn-primary btn-block" value="Add new language pair" />--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</form>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop