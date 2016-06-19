@extends('layouts/master')

@section('content')

    @javascript(compact('pusherKey', 'pusherCluster'))

    <google-calendar grid="a1:a2"></google-calendar>

    <last-fm grid="b1:c1"></last-fm>

    <current-time grid="d1" dateformat="ddd DD/MM"></current-time>

    <packagist-statistics grid="b2"></packagist-statistics>

    <rain-forecast grid="c2"></rain-forecast>

    <internet-connection grid="d2"></internet-connection>

    <new-relic-application-hosts grid="a3"></new-relic-application-hosts>

@endsection
