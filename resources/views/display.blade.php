@extends('app')

@section('display')
    <div>
        <h2>display</h2>
        @if($civilizations->count())
        <table>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Expansion</th>
                <th>Army Type</th>
                <th>Team Bonus</th>
                <th>Civilization Bonus</th>
            </tr>
            @foreach ($civilizations as $civilization)
                <tr>
                    <th>{{$civilization->id}}</th>
                    <th>{{$civilization->name}}</th>
                    <th>{{$civilization->expansion}}</th>
                    <th>{{$civilization->army_type}}</th>
                    <th>{{$civilization->team_bonus}}</th>
                    <th>
                        <th>{{$civilization->civilization_bonus_0}}</th>
                        <th>{{$civilization->civilization_bonus_1}}</th>
                        <th>{{$civilization->civilization_bonus_2}}</th>
                        <th>{{$civilization->civilization_bonus_3}}</th>
                        <th>{{$civilization->civilization_bonus_4}}</th>
                        <th>{{$civilization->civilization_bonus_5}}</th>
                    </th>    
                </tr>
            @endforeach
        </table>
        @else
            <p>There are no civilizations :(</p>
        @endif
    </div>
@endSection