@extends('layouts.layout')
@section('content')

<section class="container">
    <div class="row">
        @foreach ($attendance as $att)
        <div class="text-center">
                <h2>Mark Attendance : {{$att->created_at}}</h2>
        </div>
        <table>
            <tr>
                <th>S.No.</th>
                <th>Name</th>
                <th>RollNumber</th>
                <th>Faculty</th>
                <th>Semester</th>
                <th>Section</th>
                <th>Attendance</th>
            </tr>
            <tr>
                <td>{{$att->id}}</td>
                <td>{{$att->studentname}}</td>
                <td>{{$att->rollnumber}}</td>
                <td>{{$att->faculty}}</td>
                <td>{{$att->semester}}</td>
                <td>{{$att->section}}</td>
                <td>
                    <div class="form-control">
                        <div class="btn-1">
                            <button type="submit" name="present">P</button>
                        </div>
                        <div class="btn-2">
                            <button type="submit" name="absent">A</button>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </table>
        <div class="btn">
            <a type="submit" value="" name="btn" href="{{route('student.index')}}">Back to Attendance</a>
        </div>
    </div>
</section>
@endsection