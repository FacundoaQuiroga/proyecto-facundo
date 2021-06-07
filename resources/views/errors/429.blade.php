@extends('errors::minimal')

@section('title', __('Ha superado el limite de peticiones'))
@section('code', '429')
@section('message', __('Ha superado el limite de peticiones'))
