@extends('errors::minimal')

@section('title', __('Lo sentimos acceso denegado'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Lo sentimos acceso denegado'))
