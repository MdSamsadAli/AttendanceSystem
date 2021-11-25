@extends('layouts.layout')
@section('content')

    <form action="{{route('student.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="form-control">
                <div class="col-1">
                    <input type="text" placeholder="Student Name" name="studentname">
                </div>
                <div class="col-1">
                    <input type="text" placeholder="Student Roll No." name="rollnumber">
                </div>
            </div>
            <div class="form-control">
                <div class="col-2">
                    <input type="text" placeholder="Faculty" name="faculty">
                </div>
                <div class="col-2">
                    <input type="text" placeholder="Semester" name="semester">
                </div>
                <div class="col-2">
                    <input type="text" placeholder="Section" name="section">
                </div>

            </div>
            <div class="btn">
                <input type="submit" value="Add Student" name="btn">
            </div>
        </div>
    </form>
    </section>
    <section class="container">
        <div class="row">
            <div class="text-center">
                <h2>Mark Attendance : {{date('Y/m/d')}}</h2>
            </div>
            <form action="{{route('student-attendance-save')}}" method="post">
                @csrf
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
                    @foreach ($attendance as $att)
                        <tr>
                            <td>{{$att->id}}</td>
                            <td>{{$att->studentname}}</td>
                            <td>{{$att->rollnumber}}</td>
                            <td>{{$att->faculty}}</td>
                            <td>{{$att->semester}}</td>
                            <td>{{$att->section}}</td>
                            <td>
                                <input type="text" name="student_id[]" value="{{$att->id}}">
                                <input type="text" name="attendance[]">
                                <div class="form-control">
                                    <div class="btn-1">
                                        <button onclick="markAsPresent(this)" type="button" name="present">P</button>
                                    </div>
                                    <div class="btn-2">
                                        <button onclick="markAsAbsent(this)" type="button" name="absent">A</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="btn">
                    <button type="submit" name="btn">Save Attendance</button>
                </div>
            </form>
        </div>

        @endsection
        @section('page-specific-script')
            <script>
                $(document).ready(function () {

                })

                function markAsPresent(event) {
                    $(event).closest('div').siblings().toggle()
                    let value = $(event).parent().parent().parent().find('input').next().val();
                    if (!value) {
                        $(event).parent().parent().parent().find('input').next().val("p")
                    } else {
                        $(event).parent().parent().parent().find('input').next().val("");
                    }
                }

                function markAsAbsent(event) {
                    $(event).closest('div').siblings().toggle()
                    let value = $(event).parent().parent().parent().find('input').next().val();
                    if (!value) {
                        $(event).parent().parent().parent().find('input').next().val("a")
                    } else {
                        $(event).parent().parent().parent().find('input').next().val("");
                    }
                }
            </script>
@endsection
